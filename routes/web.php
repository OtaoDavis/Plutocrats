<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('/locations/mara', function () {
    return view('locations.mara');
})->name('mara');

Route::get('/locations/tsavo', function () {
    return view('locations.tsavo');
})->name('tsavo');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('/booking', [BookingController::class, 'show'])->name('booking.page');

