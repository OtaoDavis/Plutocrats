<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
</head>

<body>
    @include('layouts.navbar')

    <div class="container my-5">
        <div class="row g-5">
            <!-- Left Side (Booking Form) -->
            <div class="col-lg-7">
                <h2 class="mb-4">Confirm and Pay</h2>
                <!-- Booking Form Start -->
                <form id="booking-form" method="POST" action="{{ route('booking.store') }}">
                    @csrf

                    <!-- Dates -->
                    <div class="section-box">
                        <h5>Dates</h5>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="check-in" class="form-label">Check-in</label>
                                <input type="date" class="form-control" name="check_in_date" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="check-out" class="form-label">Check-out</label>
                                <input type="date" class="form-control" name="check_out_date" required>
                            </div>
                        </div>
                    </div>

                    <!-- Guests -->
                    <div class="section-box">
                        <h5>Guests</h5>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Adults</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('adults', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="form-control text-center" name="adults" id="adults"
                                        value="2" min="1" required>
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('adults', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Children</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('children', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="form-control text-center" name="children" id="children"
                                        value="1" min="0" required>
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('children', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Inputs for Additional Data -->
                    <input type="hidden" name="location" value="Mara">
                    <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" id="base-price" value="{{ $price }}">
                    <input type="hidden" name="price" id="final_price" value="{{ $price }}">

                </form>
                <!-- Booking Form End -->
            </div>

            <!-- Right Side (Summary Card) -->
            <div class="col-lg-5">
                <div class="summary-card">
                    <!-- Image -->
                    <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="img-fluid rounded mb-3">

                    <!-- Summary Details -->
                    <div class="price-details">
                        <h4>{{ urldecode($title) }}</h4>
                        <h5 class="mb-3">Price: Kshs {{ number_format($price) }}/= per night</h5>

                        <!-- Summary Info -->
                        <p><strong>Dates:</strong> <span id="check-in-date">-</span> to <span
                                id="check-out-date">-</span></p>
                        <p><strong>Guests:</strong> <span id="adults-count">0</span> adults, <span
                                id="children-count">0</span> children</p>
                        <p><strong>Number of Nights:</strong> <span id="nights-count">0</span></p>

                        <p><strong>Email:</strong>
                            <span id="email-address">
                                @auth
                                {{ Auth::user()->email }}
                                @else
                                -
                                @endauth
                            </span>
                        </p>

                        <p><strong>Phone:</strong>
                            <span id="phone-number">
                                @auth
                                {{ Auth::user()->phone ?? 'N/A' }}
                                @else
                                -
                                @endauth
                            </span>
                        </p>

                        <!-- Final Price -->
                        <p><strong>Total Price:</strong> Kshs <span id="total-price">{{ number_format($price)
                                }}</span>/=</p>

                        <!-- Book Now Button -->
                        <button type="submit" form="booking-form" class="btn btn-success w-100 mt-4">Book Now</button>
                    </div>
                </div>
            </div>



            <!-- Login or Payment Card -->
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-md-12">
                        @if(Auth::check())
                        <!-- Logged-in User (Payment Form) -->
                        <div class="auth-box rounded p-4 mb-4">
                            <h4 class="mb-3 text-center">Proceed to Payment</h4>

                            <!-- Pre-fill phone and email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                    required>
                            </div>

                            <!-- Payment details -->
                            <div class="mb-3">
                                <label for="card-number" class="form-label">Card Number</label>
                                <input type="text" class="form-control" name="card_number" required>
                            </div>

                            <!-- Submit Payment -->
                            <button type="submit" class="btn btn-primary w-100">Pay Now</button>
                        </div>
                        @else
                        <!-- Not Logged-in (Login Form) -->
                        <div class="auth-box rounded p-4 mb-4">
                            <h4 class="mb-3 text-center">Login to Continue</h4>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function adjustGuestCount(id, delta) {
                const input = document.getElementById(id);
                let current = parseInt(input.value) || 0;
                const min = parseInt(input.getAttribute('min')) || 0;

                current += delta;
                if (current < min) current = min;

                input.value = current;
                input.dispatchEvent(new Event('input')); // trigger summary update
            }

            document.addEventListener("DOMContentLoaded", function () {
                const checkInInput = document.querySelector("[name='check_in_date']");
                const checkOutInput = document.querySelector("[name='check_out_date']");
                const adultsInput = document.querySelector("[name='adults']");
                const childrenInput = document.querySelector("[name='children']");
                const emailInput = document.querySelector("[name='email']");
                const phoneInput = document.querySelector("[name='phone']");
                const countryCodeInput = document.querySelector("[name='country_code']");

                function updateSummary() {
                    const checkInDate = checkInInput.value;
                    const checkOutDate = checkOutInput.value;
                    const adults = adultsInput.value || 0;
                    const children = childrenInput.value || 0;
                    const email = emailInput ? emailInput.value : '';
                    const phone = (countryCodeInput ? countryCodeInput.value : '') + (phoneInput ? phoneInput.value : '');

                    const pricePerNight = parseFloat(document.getElementById("base-price").value);

                    document.getElementById("check-in-date").textContent = checkInDate || '-';
                    document.getElementById("check-out-date").textContent = checkOutDate || '-';
                    document.getElementById("adults-count").textContent = adults;
                    document.getElementById("children-count").textContent = children;

                    @if (!Auth:: check())
            document.getElementById("email-address").textContent = email || '-';
            document.getElementById("phone-number").textContent = phone || '-';
            @endif

            const checkIn = new Date(checkInDate);
            const checkOut = new Date(checkOutDate);
            const nights = (checkOut - checkIn) / (1000 * 3600 * 24);

            if (!isNaN(nights) && nights > 0) {
                document.getElementById("nights-count").textContent = nights;
                const totalPrice = nights * pricePerNight;
                document.getElementById("total-price").textContent = totalPrice.toLocaleString();
                document.getElementById("final_price").value = totalPrice;
            } else {
                document.getElementById("total-price").textContent = pricePerNight.toLocaleString();
            }
                }

            // Trigger update on all relevant inputs
            [checkInInput, checkOutInput, adultsInput, childrenInput].forEach(input => {
                input.addEventListener("input", updateSummary);
            });

            if (emailInput) emailInput.addEventListener("input", updateSummary);
            if (phoneInput) phoneInput.addEventListener("input", updateSummary);
            if (countryCodeInput) countryCodeInput.addEventListener("input", updateSummary);

            // Trigger initial update
            updateSummary();
            });
        </script>



</body>

</html>