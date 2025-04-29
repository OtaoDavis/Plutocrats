<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VerificationController;

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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin_dash', [BookingController::class, 'showBookingsOnDashboard'])->name('admin_dash');
    Route::get('/admin/bookings', [BookingController::class, 'showBookings'])->name('admin_bookings');
});

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

Route::get('/locations/olpejeta', function () {
    return view('locations.olpejeta');
})->name('olpejeta');

Route::get('/booking', [BookingController::class, 'show'])->name('booking.show');
Route::get('/user_dash', [BookingController::class, 'index'])->name('user_dash');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('booking.details');
Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');
Route::post('/book/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::post('/set-package-price', [BookingController::class, 'setPackagePrice']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('booking.delete');
Route::get('/book-package', [BookingController::class, 'showPackageBookingForm'])->name('booking.package.form');
Route::get('/book-destination', [BookingController::class, 'destinationBookingForm'])->name('booking.destination.form');

Route::post('/initiate-payment', [PaymentController::class, 'initiatePayment'])
->middleware('auth') // Ensure user is logged in
->name('payment.initiate');

//reinitiate payment
Route::post('/payment/reinitiate/{booking_id}', [PaymentController::class, 'reinitiatePayment'])->name('payment.reinitiate');
// Route IntaSend will POST callback notifications to (NO CSRF protection)
Route::post('/callback/{booking_id}', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/success/{booking_id}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/redirect/{booking_id}', [PaymentController::class, 'paymentRedirect'])->name('payment.redirect')->middleware('auth');

    
