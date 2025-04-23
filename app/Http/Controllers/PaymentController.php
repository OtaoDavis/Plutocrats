<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking; // Import Booking model
use Carbon\Carbon; // Import Carbon if needed for validation/calculation
use Illuminate\Support\Facades\Log; // Optional: for logging

class PaymentController extends Controller
{
    public function initialize(Request $request)
    {
        // Validate all incoming data needed for Booking AND Payment
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // User name
            'email' => 'required|email',        // User email (for paystack)
            'amount' => 'required|numeric|min:0', // Final calculated amount
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'title' => 'required|string',
            'location' => 'sometimes|string', // Optional based on your needs
            'user_id' => 'required|exists:users,id',
        ]);

        // --- Create the Booking First ---
        try {
            $booking = Booking::create([
                'user_id' => $validatedData['user_id'],
                'check_in_date' => $validatedData['check_in_date'],
                'check_out_date' => $validatedData['check_out_date'],
                'adults' => $validatedData['adults'],
                'children' => $validatedData['children'],
                'price' => $validatedData['amount'], // Use the validated final amount
                'title' => $validatedData['title'],
                'location' => $validatedData['location'] ?? null, // Handle optional location
                'status' => 'pending', // Initial status before payment attempt
            ]);
        } catch (\Exception $e) {
             Log::error('Booking creation failed during payment init: ' . $e->getMessage());
            return back()->with('error', 'Failed to create booking record. Please try again.');
        }


        // --- Prepare and Create Payment Record ---
        // Convert amount to kobo (ensure amount is correct)
        $amountInKobo = $validatedData['amount'] * 100;
        $reference = Str::uuid()->toString(); // Generate unique reference

        try {
             // Save the payment record, now linked to the booking
            $payment = Payment::create([
                'user_id' => $validatedData['user_id'],
                'booking_id' => $booking->id, // Link to the booking created above
                'amount' => $validatedData['amount'], // Store the original amount in KES
                'reference' => $reference,
                'status' => 'pending', // Payment is pending until verified
                'currency' => 'KES',   // Assuming KES
                // 'payment_channel' => null, // Can be updated later if needed
            ]);
        } catch (\Exception $e) {
            Log::error('Payment record creation failed: ' . $e->getMessage());
            // Optional: You might want to delete the created booking here or mark it as failed
            // $booking->delete(); // Or $booking->update(['status' => 'failed']);
            return back()->with('error', 'Failed to initiate payment record. Please try again.');
        }


        // --- Initialize Paystack Transaction ---
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => $validatedData['email'],
                'amount' => $amountInKobo,
                'reference' => $reference, // Use the same reference stored in payment record
                'currency' => 'KES',
                'callback_url' => route('paystack.callback'),
                 'metadata' => [ // Optional: Send extra info to Paystack
                     'booking_id' => $booking->id,
                     'user_id' => $validatedData['user_id'],
                     'customer_name' => $validatedData['name'],
                     'description' => 'Payment for booking: ' . $validatedData['title']
                 ],
            ]);

        if ($response->successful() && isset($response['data']['authorization_url'])) {
            // Redirect user to Paystack's payment page
            return redirect($response['data']['authorization_url']);
        }

        // If Paystack initialization fails
        Log::error('Paystack initialization failed: ', $response->json() ?? []);
        // Update payment and booking status to failed?
         $payment->update(['status' => 'failed']);
         $booking->update(['status' => 'payment_failed']); // Or keep pending
        return back()->with('error', 'Payment initialization failed. Please try again.');
    }

    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
             return redirect()->route('user_dash')->with('error', 'Invalid payment callback.');
        }

        // Verify the transaction with Paystack
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

         if (!$response->successful()) {
             Log::error('Paystack verification API call failed for reference: ' . $reference, $response->json() ?? []);
              // Find payment to potentially update status? Or just show error.
             $payment = Payment::where('reference', $reference)->first();
             if ($payment) {
                 $payment->update(['status' => 'verification_failed']);
             }
              return redirect()->route('user_dash')->with('error', 'Payment verification failed.');
         }

        $data = $response->json()['data']; // Get the data part of the response

        // Find the payment record
        $payment = Payment::where('reference', $reference)->with('booking')->first(); // Eager load booking

         if (!$payment) {
            Log::error('Payment record not found for reference: ' . $reference);
            return redirect()->route('user_dash')->with('error', 'Payment record not found.');
         }

        // Check transaction status
        if ($data['status'] === 'success') {
            // Update payment status
            $payment->update([
                'status' => 'paid',
                 // Optionally store channel, gateway response etc.
                 // 'payment_channel' => $data['channel'],
                 // 'gateway_response' => $data['gateway_response'],
            ]);

            // Update the associated booking status
            if ($payment->booking) {
                 $payment->booking->update(['status' => 'paid']); // Or 'confirmed'
                Log::info('Booking ID ' . $payment->booking->id . ' updated to paid for reference ' . $reference);
             } else {
                Log::warning('Booking not found for successful payment reference: ' . $reference);
             }

             // Redirect user with success message
            return redirect()->route('user_dash')->with('success', 'Payment successful and booking confirmed!');

        } else {
            // Handle failed or abandoned payment
            $payment->update(['status' => $data['status']]); // Update with Paystack's status (failed, abandoned)

             // Keep booking status as 'pending' or set to 'payment_failed'?
             if ($payment->booking) {
                  // $payment->booking->update(['status' => 'payment_failed']); // Decide if you want this
                 Log::info('Booking ID ' . $payment->booking->id . ' remains pending for unsuccessful payment reference ' . $reference . ' with status ' . $data['status']);
             }

            Log::warning('Paystack verification returned unsuccessful status: ' . $data['status'] . ' for reference: ' . $reference);
            return redirect()->route('user_dash')->with('error', 'Payment was not successful (' . $data['status'] . ').');
        }
    }
}