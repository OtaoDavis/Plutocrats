<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // Store a new booking
    public function store(Request $request){
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'location' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'adults' => $request->adults,
            'children' => $request->children ?? 0,
            'status' => 'pending',
            'location' => $request->location,
            'price' => $request->price,
            'title' => $request->title,
        ]);

        return redirect()->route('user_dash')->with('success', 'Booking created successfully.');
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

}
