<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'location' => 'required|string|max:255',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'adults' => $request->adults,
            'children' => $request->children ?? 0,
            'status' => 'pending', 
            'location' => $request->location,
        ]);

        return redirect()->route('user_dash')->with('success', 'Booking created successfully.');
    }

    public function index()
    {
        // Fetch bookings for the authenticated user
        $bookings = Booking::where('user_id', auth()->id())->get();

        $bookings = auth()->user()->bookings;
        // Pass the bookings to the view
        return view('user_dash', compact('bookings'));
    }

}
