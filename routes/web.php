<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashController;

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

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('packages', function () {
    return view('packages');
})->name('packages');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/locations/mara', function () {
    return view('locations.mara');
})->name('mara');

Route::get('/locations/tsavo', function () {
    return view('locations.tsavo');
})->name('tsavo');

Route::get('/locations/amboseli', function () {
    return view('locations.amboseli');
})->name('amboseli');

Route::get('/booking', [BookingController::class, 'show'])->name('booking.show');
Route::get('/user_dash', [BookingController::class, 'index'])->name('user_dash');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('booking.details');
Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');
Route::post('/book/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::post('/set-package-price', [BookingController::class, 'setPackagePrice']);



