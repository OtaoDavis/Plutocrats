<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show(Request $request){
    $title = $request->query('title');
    $image = $request->query('image');

    return view('booking', compact('title', 'image'));
}

}
