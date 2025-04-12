<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashController extends Controller
{
    public function showDashboard()
{
    $user = auth()->user();

    // Fetch bookings
    $bookings = Booking::where('user_id', $user->id)->get();

    // Count summary
    $bookingSummary = [
        'paid' => $bookings->where('status', 'paid')->count(),
        'pending' => $bookings->where('status', 'pending')->count(),
    ];

    return view('user_dash', compact('bookings', 'bookingSummary'));
}

}
