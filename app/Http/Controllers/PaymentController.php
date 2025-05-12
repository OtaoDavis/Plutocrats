<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use IntaSend\IntaSendPHP\Checkout;
use IntaSend\IntaSendPHP\Customer;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    /**
     * Creates a pending booking and initiates the IntaSend hosted checkout.
     */
    public function initiatePayment(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'amount' => 'required|numeric|min:1',
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'currency' => ['required', 'string', Rule::in(['KES', 'USD', 'EUR'])],
            'image' => 'nullable|string|max:255',
        ]);

        try {
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'title' => $validated['title'],
                'image' => $request->image ?? null,
                'location' => 'Kenya',
                'price' => $validated['amount'],
                'currency' => $validated['currency'],
                'check_in_date' => $validated['check_in_date'],
                'check_out_date' => $validated['check_out_date'],
                'adults' => $validated['adults'],
                'children' => $validated['children'],
                'status' => 'pending',
            ]);
        } catch (\Exception $e) {
            Log::error('Booking creation failed: ' . $e->getMessage(), [
                'exception' => $e,
                'request_data' => $request->all()
            ]);
            return back()->with('error', 'Could not save booking details. Please try again.');
        }

        $fullName = $validated['name'];
        $nameParts = explode(' ', trim($fullName), 2);
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) && !empty($nameParts[1]) ? $nameParts[1] : $firstName;

        try {
            $checkout = new Checkout();
            $checkout->init([
                'publishable_key' => config('services.intasend.public_key'),
                'secret_key' => config('services.intasend.secret_key'),
                'env' => config('services.intasend.env'),
            ]);

            $customer = new Customer([
                'email' => $validated['email'],
                'first_name' => $firstName,
                'last_name' => $lastName,
                'country' => $this->getCountryCodeForCurrency($validated['currency']),
                'phone_number' => '',
                'address' => '',
                'city' => '',
                'state' => '',
                'zipcode' => '',
            ]);
            $hostUrl = URL::to('/');
            // IMPORTANT:  Use a properly constructed URL.  For local testing with a tool like Ngrok,
            //  you would replace this with your Ngrok URL.  Do NOT hardcode localhost in a production environment.
            $callbackUrl =  config('app.env') === 'local'
                ? env('NGROK_URL') . '/callback/' . $booking->id   // For local testing ONLY if you're sure your server is listening on port 8000
                : route('payment.callback', ['booking_id' => $booking->id]); // Use route() for production and non-local environments


            $response = $checkout->create(
                $validated['amount'],
                $validated['currency'],
                $customer,
                $hostUrl,
                $callbackUrl,
                'booking_' . $booking->id,
                'Payment for booking ID: ' . $booking->id,
                null
            );

            if (isset($response['url'])) {
                Log::info('Redirecting user to IntaSend checkout for booking ID: ' . $booking->id);
                return redirect()->away($response['url']);
            } else {
                Log::error('IntaSend checkout creation failed. Response: ' . json_encode($response));
                $booking->update(['status' => 'failed_initiation']);
                return back()->with('error', 'Failed to initiate payment gateway. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('IntaSend SDK Error: ' . $e->getMessage(), ['exception' => $e]);
            if (isset($booking) && $booking instanceof Booking) {
                $booking->update(['status' => 'failed_initiation']);
            }
            return back()->with('error', 'An error occurred while contacting the payment gateway.');
        }
    }

    public function reinitiatePayment($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);

        if (!in_array($booking->status, ['pending', 'failed', 'failed_initiation'])) {
            return back()->with('error', 'This booking cannot be re-paid.');
        }

        try {
            $user = $booking->user ?? Auth::user();
            if (!$user) {
                Log::error("Cannot reinitiate payment for booking ID {$booking_id}: User not found.");
                return back()->with('error', 'User associated with booking not found.');
            }

            $nameParts = explode(' ', $user->name, 2);
            $firstName = $nameParts[0];
            $lastName = $nameParts[1] ?? $firstName;

            $checkout = new Checkout();
            $checkout->init([
                'publishable_key' => config('services.intasend.public_key'),
                'secret_key' => config('services.intasend.secret_key'),
                'env' => config('services.intasend.env'),
            ]);

            $customer = new Customer([
                'email' => $user->email,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'country' => $this->getCountryCodeForCurrency($booking->currency),
                'phone_number' => '',
                'address' => '',
                'city' => '',
                'state' => '',
                'zipcode' => '',
            ]);

            $hostUrl = URL::to('/');
            // IMPORTANT:  Use a properly constructed URL.  For local testing with a tool like Ngrok,
            //  you would replace this with your Ngrok URL.  Do NOT hardcode localhost in a production environment.
            $callbackUrl =  config('app.env') === 'local'
                ? env('NGROK_URL') . '/callback/' . $booking->id  
                : route('payment.callback', ['booking_id' => $booking->id]);

            if (empty($booking->price) || empty($booking->currency)) {
                Log::error("Cannot reinitiate payment for booking ID {$booking_id}: Missing price or currency.");
                return back()->with('error', 'Booking details are incomplete (price/currency).');
            }


            $response = $checkout->create(
                $booking->price,
                $booking->currency,
                $customer,
                $hostUrl,
                $callbackUrl, // Use the defined $callbackUrl here
                'booking_' . $booking->id . '_reinit',
                'Reinitiated payment for booking ID: ' . $booking->id,
                null
            );

            if (isset($response['url'])) {
                $booking->update(['status' => 'pending']);
                Log::info("Reinitiating payment for booking ID {$booking_id}. Redirecting to IntaSend.");
                return redirect()->away($response['url']);
            } else {
                Log::error('IntaSend checkout reinitiation failed.', ['response' => $response, 'booking_id' => $booking->id]);
                if ($booking->status === 'pending') {
                    $booking->update(['status' => 'failed_initiation']);
                }
                return back()->with('error', 'Payment could not be reinitiated. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('Payment reinitiation error: ' . $e->getMessage(), ['exception' => $e, 'booking_id' => $booking->id]);
            if ($booking->status === 'pending') {
                $booking->update(['status' => 'failed_initiation']);
            }
            return back()->with('error', 'An error occurred while reinitiating payment.');
        }
    }

    // Add this method to your PaymentController
    public function handleWebhook(Request $request)
    {
        Log::info('Webhook received from IntaSend.', ['payload' => $request->all()]);
    
        // Validate webhook signature if IntaSend provides one (security best practice)
    
        $trackingId = $request->input('tracking_id');
        $invoiceId = $request->input('invoice_id');
        $state = $request->input('state');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $reference = $request->input('reference'); // If available
    
        if (!$invoiceId || !$state || !$amount || !$currency) {
            Log::warning('Webhook missing required parameters.', $request->all());
            return response()->json(['message' => 'Invalid payload'], 400);
        }
    
        // Find the booking based on invoice ID or reference (you can modify depending on your system)
        $booking = Booking::where('transaction_ref', $invoiceId)->first();
    
        if (!$booking) {
            // Optionally: if you stored the booking id in metadata (e.g. in 'reference' field)
            if (strpos($reference, 'booking_') !== false) {
                $bookingId = str_replace('booking_', '', $reference);
                $booking = Booking::find($bookingId);
            }
        }
    
        if (!$booking) {
            Log::error('Webhook: Booking not found.', ['invoice_id' => $invoiceId, 'reference' => $reference]);
            return response()->json(['message' => 'Booking not found'], 404);
        }
    
        // Update based on payment state
        if (strtoupper($state) === 'COMPLETE') {
            $booking->update([
                'status' => 'paid',
                'transaction_ref' => $invoiceId,
            ]);
        
            Payment::firstOrCreate([
                'booking_id' => $booking->id,
                'reference' => $invoiceId,
            ], [
                'user_id' => $booking->user_id,
                'amount' => $amount,
                'currency' => $currency,
                'status' => 'paid',
            ]);
        
            Log::info('Payment completed via webhook for booking ID: ' . $booking->id);
        } elseif (in_array(strtoupper($state), ['FAILED', 'CANCELLED'])) {
            $booking->update([
                'status' => 'failed',
            ]);
            Log::warning('Payment failed or cancelled for booking ID: ' . $booking->id);
        }
    
        return response()->json(['message' => 'Webhook handled'], 200);
    }


    /**
     * Handles the callback from IntaSend after a payment attempt.
     */
    public function callback(Request $request, $booking_id)
    {
        Log::info('Callback received', ['all' => $request->all(), 'query' => $request->query()]);
        Log::info('IntaSend Callback received for booking ID: ' . $booking_id, $request->all());

        $trackingId = $request->input('tracking_id', $request->query('tracking_id'));
        $invoiceId = $request->input('invoice_id', $request->query('invoice_id'));
        $signature = $request->input('signature', $request->query('signature'));
        $state = $request->input('state', $request->query('state'));
        $amount = $request->input('amount', $request->query('amount'));
        $currency = $request->input('currency', $request->query('currency'));


        if (!$trackingId ||  !$state || !$invoiceId || !$amount || !$currency) {
            Log::warning('IntaSend Callback missing required parameters.', $request->all());
            return redirect()->route('user_dash')->with('error', 'Invalid payment confirmation received.');
        }

        $booking = Booking::find($booking_id);

        if (!$booking) {
            Log::error("IntaSend Callback: Booking not found with ID: {$booking_id}");
            return redirect()->route('user_dash')->with('error', 'Booking record not found.');
        }

        if (strtoupper($state) === 'COMPLETE') {
            if (in_array($booking->status, ['pending', 'failed', 'failed_initiation', 'failed_verification'])) {
                $booking->update([
                    'status' => 'paid',
                    'transaction_ref' => $invoiceId,
                ]);
                Log::info("Booking ID {$booking_id} successfully marked as paid. Ref: {$invoiceId}");

                try {
                    Payment::create([
                        'user_id' => $booking->user_id,
                        'booking_id' => $booking->id,
                        'reference' => $invoiceId,
                        'amount' => $amount,
                        'currency' => $currency,
                        'status' => 'paid',
                    ]);
                    Log::info("Payment details saved for booking ID: {$booking->id}, Invoice ID: {$invoiceId}");
                } catch (\Exception $e) {
                    Log::error("Failed to save payment details for booking ID {$booking_id}: " . $e->getMessage());
                    throw $e;
                }

                return redirect()->route('user_dash')->with('success', 'Payment successful and booking confirmed!');
            } else {
                Log::warning("Booking ID {$booking_id} already processed or paid. Current status: {$booking->status}. Received COMPLETE callback.");
                return redirect()->route('user_dash')->with('info', 'Your booking was already confirmed.');
            }
        } else {
            Log::warning("IntaSend Callback: Payment failed or incomplete for booking ID {$booking_id}. State: {$state}. Ref: {$invoiceId}");
            if ($booking->status === 'pending') {
                $booking->update([
                    'status' => 'failed',
                    'transaction_ref' => $invoiceId,
                ]);
            }
            return redirect()->route('user_dash')->with('error', "Payment was not completed successfully ({$state}). Please try again.");
        }
    }

    private function getCountryCodeForCurrency(string $currency): string
    {
        return match (strtoupper($currency)) {
            'USD' => 'US',
            'EUR' => 'DE',
            'GBP' => 'GB',
            default => 'KE',
        };
    }

    public function handleRedirect(Request $request, $booking_id)
    {
        // Log the redirect
        Log::info('User redirected from IntaSend for booking ID: ' . $booking_id, $request->all());
        
        // Find the booking
        $booking = Booking::find($booking_id);
        
        if (!$booking) {
            return redirect()->route('user_dash')->with('error', 'Booking not found.');
        }
        
        // Check if the booking is already paid
        if ($booking->status === 'paid') {
            return redirect()->route('user_dash')->with('success', 'Your booking has been confirmed!');
        }
        
        // If payment is still pending or failed
        return redirect()->route('user_dash')->with('info', 'Your payment is being processed. You will receive confirmation shortly.');
    }


    private function calculateNights($checkIn, $checkOut)
    {
        //
    }

    private function verifyIntaSendSignature(array $data, ?string $receivedSignature): bool
    {
        //
    }

    private function getIntaSendTransactionStatus(string $invoiceId): ?string
    {
        //
    }
}

