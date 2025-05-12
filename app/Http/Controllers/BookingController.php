<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule; 

class BookingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // Store a new booking
    public function store(Request $request)
{
    // Apply validation rules for the booking form
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'check_in_date' => 'required|date|after_or_equal:today',
        'check_out_date' => 'required|date|after:check_in_date',
        'adults' => 'required|integer|min:1',
        'children' => 'nullable|integer|min:0', 
        'price' => 'required|numeric|min:1', 
        'currency' => ['required', 'string', Rule::in(['KES', 'USD', 'EUR'])], 
        'image' => 'nullable|string|max:255',
    ]);

    // 1. Create the booking with 'pending' status
    try {
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'image' => $request->image ?? null,
            'location' => 'Kenya', 
            'price' => $validated['price'], 
            'currency' => $validated['currency'],
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'adults' => $validated['adults'],
            'children' => $validated['children'] ?? 0, 
            'status' => 'pending',
        ]);

        return redirect()->route('user_dash')->with('success', 'Booking created successfully.');
    } catch (\Exception $e) {
        // Handle exception if the booking creation fails
        return back()->withErrors(['error' => 'There was an issue creating your booking. Please try again.']);
    }
}

    public function index(){
        // Fetch bookings for the authenticated user
        $bookings = auth()->user()->bookings;
        return view('user_dash', compact('bookings'));
    }

    public function show(Request $request){
        $title = $request->query('title');
        $image = $request->query('image');
        $price = $request->query('price');
    
        // Store the price in session
        session()->put('price', $price);
    
        return view('booking', [
            'title' => $title,
            'image' => $image,
            'price' => $price
        ]);
    }
    

    public function submit(Request $request){
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|string',
            'price' => 'required|numeric',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone' => 'required|digits:9'
        ]);

        // Use Nairobi timezone
        $checkIn = Carbon::parse($request->check_in, 'Africa/Nairobi');
        $checkOut = Carbon::parse($request->check_out, 'Africa/Nairobi');
        $nights = $checkIn->diffInDays($checkOut);

        // Retrieve the price from the session
        $price = session('price');

        // Total cost calculation: adults and half-price for children
        $total = ($request->adults + ($request->children * 0.5)) * $price * $nights;

        return view('booking.confirmation', [
            'data' => $request->all(),
            'total' => $total,
            'nights' => $nights
        ]);
    }


    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'email' => 'required|email',
            'country_code' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
        ]);
    
        // ✅ Inside the function now
        $checkIn = Carbon::parse($validated['check_in'], 'Africa/Nairobi');
        $checkOut = Carbon::parse($validated['check_out'], 'Africa/Nairobi');
        $nights = $checkOut->diffInDays($checkIn);
    
        $price = session('price');
        $total = $nights * $price;
    
        return view('booking.summary', [
            'title' => $validated['title'],
            'image' => $validated['image'],
            'checkIn' => $checkIn->toDateString(),
            'checkOut' => $checkOut->toDateString(),
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'email' => $validated['email'],
            'phone' => $validated['country_code'] . $validated['phone'],
            'pricePerNight' => $price,
            'nights' => $nights,
            'total' => $total,
        ]);
    }
    

public function setPackagePrice(Request $request)
{
    // Store the price in the session
    session()->put('price', $request->price);

    return response()->json(['message' => 'Price saved in session']);
}

public function destroy($id)
{
    $booking = Booking::find($id);

    if (!$booking) {
        return redirect()->back()->with('error', 'Booking not found.');
    }

    // Optional: Check if the user owns the booking
    if ($booking->user_id !== Auth::id()) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    try {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete booking.');
    }
}

public function showPackageBookingForm(Request $request)
    {
        // Validate incoming query parameters (optional but recommended)
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string',
            'image' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'currency' => 'sometimes|required|string|size:3',
            'desc' => 'nullable|string',
            'details' => 'nullable|string', 
        ]);

        // Use validated data or default values if validation passes/is skipped
        $title = $validatedData['title'] ?? $request->query('title', 'Default Title');
        $image = $validatedData['image'] ?? $request->query('image', 'mara.webp');
        $price = $validatedData['price'] ?? $request->query('price', 0);
        $currency = $validatedData['currency'] ?? $request->query('currency', 'KES'); 
        $desc = $validatedData['desc'] ?? $request->query('desc', '');
        $details = $validatedData['details'] ?? $request->query('details', '');


        return view('booking', [
            'title' => urldecode($title),
            'image' => urldecode($image), 
            'price' => $price,
            'currency' => strtoupper(urldecode($currency)), 
            'desc' => urldecode($desc),
            'details' => urldecode($details)
        ]);
    }


    public function showBookings()
    {
        $bookings = Booking::with('user')->latest()->paginate(10);

        return view('admin_dash', compact('bookings'));
    }

    public function showBookingsOnDashboard()
    {
        $bookings = Booking::with('user')->latest()->paginate(10);
        return view('admin_dash', compact('bookings'));
    }

    public function destinationBookingForm(Request $request)
    {
        // Retrieve details from query string
        $location = $request->input('location', 'Amboseli');
        $title = $request->input('title');
        $image = $request->input('image');
        $price = $request->input('price');
        $desc = $request->input('desc');
        $currency = $request->input('currency');     

        return view('booking', compact('location', 'title', 'image', 'price', 'desc', 'currency'));
    }
    


}
