<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Use the title passed from controller --}}
    <title>Booking: {{ $title ?? 'Confirm Your Stay' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
    <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">
</head>

<body>
    @include('layouts.navbar')

    <div class="container my-5">
        {{-- Session Messages and Errors (keep as is) --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Setup Currency Symbol Logic --}}
        @php
            // Define currency symbols (add more as needed for your application)
            $currencySymbols = [
                'KES' => 'Kshs',
                'USD' => '$',
                'EUR' => '€',
                'GBP' => '£',
                // Add other currencies you support...
            ];
            // Determine the current currency code passed from the controller
            // Default to 'KES' if not set or not in our symbol map
            $currentCurrencyCode = isset($currency) && array_key_exists(strtoupper($currency), $currencySymbols)
                                   ? strtoupper($currency)
                                   : 'KES'; // Set your preferred default currency
            // Get the symbol for the current currency
            $currencySymbol = $currencySymbols[$currentCurrencyCode];

            // Ensure price is numeric, default to 0 if not
            $basePrice = is_numeric($price ?? null) ? (float)$price : 0;
        @endphp

        <div class="row g-5">
            <div class="col-lg-7">
                <h2 class="mb-4">Confirm and Pay</h2>

                {{-- Form 1: For "Book Now" (if it reserves without immediate payment) --}}
                {{-- Make sure the action route 'booking.store' matches your BookingController's store method --}}
                <form id="booking-form" method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <div class="section-box">
                        <h5>Dates</h5>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="check_in_date_input" class="form-label">Check-in</label>
                                <input type="date" class="form-control" id="check_in_date_input" name="check_in_date" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="check_out_date_input" class="form-label">Check-out</label>
                                <input type="date" class="form-control" id="check_out_date_input" name="check_out_date" required>
                            </div>
                        </div>
                    </div>

                    <div class="section-box">
                        <h5>Guests</h5>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Adults</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" onclick="adjustGuestCount('adults', -1)"> <i class="fas fa-minus"></i> </button>
                                    <input type="number" class="form-control text-center" name="adults" id="adults" value="1" min="1" required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="adjustGuestCount('adults', 1)"> <i class="fas fa-plus"></i> </button>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Children (half-price)</label> {{-- Adjust label if pricing logic differs --}}
                                <div class="input-group">
                                     <button type="button" class="btn btn-outline-secondary" onclick="adjustGuestCount('children', -1)"> <i class="fas fa-minus"></i> </button>
                                     <input type="number" class="form-control text-center" name="children" id="children" value="0" min="0" required>
                                     <button type="button" class="btn btn-outline-secondary" onclick="adjustGuestCount('children', 1)"> <i class="fas fa-plus"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Hidden fields for the 'booking.store' route --}}
                    <input type="hidden" name="location" value="Kenya"> {{-- Consider making this dynamic if needed --}}
                    {{-- user_id is added in controller if needed --}}
                    <input type="hidden" name="status" value="pending"> {{-- Default status for this form submission --}}
                    <input type="hidden" id="base-price" value="{{ $basePrice }}"> {{-- Store base price for JS --}}
                    <input type="hidden" name="price" id="final_price" value="{{ $basePrice }}"> {{-- Initial total price --}}
                    <input type="hidden" name="title" value="{{ $title }}">
                    <input type="hidden" name="currency" value="{{ $currentCurrencyCode }}"> {{-- Pass the determined currency code --}}
                    <input type="hidden" name="image" value="{{ $image }}">
                </form>

                {{-- Form 2: For "Pay Now" (submits to payment initiation) --}}
                <form id="prepare-session-form" method="POST" action="{{ route('payment.initiate') }}">
                    @csrf
                    {{-- Hidden fields populated by JS before submitting --}}
                    <input type="hidden" name="check_in_date" id="paynow_check_in_date">
                    <input type="hidden" name="check_out_date" id="paynow_check_out_date">
                    <input type="hidden" name="adults" id="paynow_adults">
                    <input type="hidden" name="children" id="paynow_children">
                    <input type="hidden" name="amount" id="paynow_final_amount"> {{-- 'amount' field for PaymentController --}}
                    <input type="hidden" name="title" value="{{ $title }}">
                    <input type="hidden" name="currency" value="{{ $currentCurrencyCode }}"> {{-- Pass the determined currency code --}}
                    <input type="hidden" name="image" id="image" value="{{ $image }}">

                    {{-- User details needed by PaymentController --}}
                    @auth
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    {{-- Add phone if available and needed: <input type="hidden" name="phone_number" value="{{ Auth::user()->phone ?? '' }}"> --}}
                    @else
                    {{-- If guest checkout is allowed, add name/email fields here --}}
                     <div class="alert alert-warning mt-3">Please <a href="{{ route('login') }}">log in</a> or <a href="{{ route('register') }}">register</a> to complete your booking.</div>
                    @endauth
                </form>
            </div>

            {{-- Right Side Summary Card --}}
            <div class="col-lg-5">
                <div class="summary-card">
                    {{-- Check if image exists before trying to display --}}
                    @if(!empty($image))
                        <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="img-fluid rounded mb-3">
                    @else
                         <img src="{{ asset('images/mara.webp') }}" alt="Default Image" class="img-fluid rounded mb-3"> {{-- Fallback Image --}}
                    @endif

                    <div class="price-details">
                        <h4>{{ $title ?? 'Selected Package' }}</h4>
                        {{-- Use the dynamic currency symbol and formatted price --}}
                        <h5 class="mb-3">Price: {{ $currencySymbol }} {{ number_format($basePrice) }} per night</h5>

                        <p><strong>Dates:</strong> <span id="display-check-in-date">-</span> to <span id="display-check-out-date">-</span></p>
                        <p><strong>Guests:</strong> <span id="display-adults-count">1</span> adults, <span id="display-children-count">0</span> children</p>
                        <p><strong>Number of Nights:</strong> <span id="display-nights-count">0</span></p>
                        <hr>
                        <p><strong>Contact Email:</strong>
                            <span id="display-email-address">
                                @auth {{ Auth::user()->email }} @else Please log in @endauth
                            </span>
                        </p>
                         {{-- Display phone if available --}}
                         @auth
                            @if(Auth::user()->phone)
                            <p><strong>Contact Phone:</strong> <span id="display-phone-number">{{ Auth::user()->phone }}</span></p>
                            @endif
                         @endauth
                        <hr>
                        {{-- MODIFIED: Total Price display uses spans for dynamic updates --}}
                        <h5 class="fw-bold">Total Price: <span id="display-total-price-currency">{{ $currencySymbol }}</span> <span id="display-total-price">{{ number_format($basePrice) }}</span></h5>

                        <div class="row mt-4 gx-2">
                            <div class="col">
                                {{-- "Book Now" button submits the first form --}}
                                <button type="submit" class="btn btn-outline-primary btn-lg w-100" form="booking-form" title="Reserve now, pay later/on arrival (if applicable)">Reserve</button>
                            </div>
                            <div class="col">
                                {{-- "Pay Now" button triggers JS to submit the second form --}}
                                @auth
                                <button type="button" class="btn btn-success btn-lg w-100 pay-now-button" title="Confirm dates and proceed to payment">
                                    Pay Now
                                </button>
                                @else
                                <button type="button" class="btn btn-success btn-lg w-100 disabled" title="Please log in to pay">
                                    Pay Now
                                </button>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const BASE_PRICE = parseFloat("{{ $basePrice }}");
        const CURRENCY_CODE = "{{ $currentCurrencyCode }}";
        const CURRENCY_SYMBOLS = @json($currencySymbols); // Pass the PHP array as a JSON object

        function adjustGuestCount(id, delta) {
            const input = document.getElementById(id);
            if (!input) return; // Exit if element not found
            let current = parseInt(input.value) || 0;
            const min = parseInt(input.getAttribute('min')) || 0;

            current += delta;
            if (current < min) current = min;

            input.value = current;
            // Trigger the 'input' event manually so updateSummary runs
            input.dispatchEvent(new Event('input', { bubbles: true }));
        }

        document.addEventListener("DOMContentLoaded", function () {
            // --- Get Form Input Elements ---
            const checkInInput = document.getElementById("check_in_date_input");
            const checkOutInput = document.getElementById("check_out_date_input");
            const adultsInput = document.getElementById("adults");
            const childrenInput = document.getElementById("children");

            // --- Get Summary Display Elements ---
            const checkInDateDisplay = document.getElementById("display-check-in-date");
            const checkOutDateDisplay = document.getElementById("display-check-out-date");
            const adultsCountDisplay = document.getElementById("display-adults-count");
            const childrenCountDisplay = document.getElementById("display-children-count");
            const nightsCountDisplay = document.getElementById("display-nights-count");
            const totalPriceCurrencyDisplay = document.getElementById("display-total-price-currency");
            const totalPriceValueDisplay = document.getElementById("display-total-price");

            // --- Get Hidden Inputs for Form Submission ---
            // 'Book Now' form (#booking-form)
            const finalPriceInput_BookNow = document.getElementById("final_price");
            // 'Pay Now' form (#prepare-session-form)
            const payNowCheckInInput = document.getElementById("paynow_check_in_date");
            const payNowCheckOutInput = document.getElementById("paynow_check_out_date");
            const payNowAdultsInput = document.getElementById("paynow_adults");
            const payNowChildrenInput = document.getElementById("paynow_children");
            const payNowFinalAmountInput = document.getElementById("paynow_final_amount");

            // --- Update Summary Function ---
            function updateSummary() {
                 // Ensure elements exist before proceeding
                 if (!checkInInput || !checkOutInput || !adultsInput || !childrenInput || !checkInDateDisplay || !checkOutDateDisplay || !adultsCountDisplay || !childrenCountDisplay || !nightsCountDisplay || !totalPriceCurrencyDisplay || !totalPriceValueDisplay) {
                    console.error("One or more required elements not found in the DOM.");
                    return;
                 }

                const checkInDate = checkInInput.value;
                const checkOutDate = checkOutInput.value;
                const adults = parseInt(adultsInput.value) || 1; // Default to 1 adult if invalid
                const children = parseInt(childrenInput.value) || 0; // Default to 0 children if invalid

                // Use base price passed from PHP
                const pricePerAdult = BASE_PRICE;
                const pricePerChild = pricePerAdult / 2; // Adjust if child pricing logic is different

                // --- Calculation ---
                let nights = 0;
                let totalPrice = 0;

                if (checkInDate && checkOutDate) {
                    try {
                        const checkIn = new Date(checkInDate);
                        const checkOut = new Date(checkOutDate);

                        // Validate dates: must be valid dates and check-out must be after check-in
                        if (!isNaN(checkIn.getTime()) && !isNaN(checkOut.getTime()) && checkOut > checkIn) {
                            // Calculate difference in milliseconds and convert to days
                            nights = Math.ceil((checkOut.getTime() - checkIn.getTime()) / (1000 * 3600 * 24));
                            // Calculate total price based on guests and nights
                            totalPrice = (adults * pricePerAdult + children * pricePerChild) * nights;
                        } else {
                            nights = 0;
                            totalPrice = 0; // Reset if dates are invalid or out of order
                            if (checkOut <= checkIn) {
                                console.warn("Check-out date must be after check-in date.");
                                // Optional: Add visual feedback near date inputs
                            }
                        }
                    } catch (e) {
                        console.error("Error calculating dates:", e);
                        nights = 0;
                        totalPrice = 0;
                    }
                }

                // --- Update Summary Display ---
                checkInDateDisplay.textContent = checkInDate || '-';
                checkOutDateDisplay.textContent = checkOutDate || '-';
                adultsCountDisplay.textContent = adults;
                childrenCountDisplay.textContent = children;
                nightsCountDisplay.textContent = nights > 0 ? nights : '-';

                // Update Total Price Display (Symbol + Value)
                const symbol = CURRENCY_SYMBOLS[CURRENCY_CODE] || CURRENCY_CODE; // Get symbol or fallback to code
                totalPriceCurrencyDisplay.textContent = symbol;
                 // Format the number (e.g., with commas)
                totalPriceValueDisplay.textContent = totalPrice.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                // --- Update Hidden Inputs for Forms ---
                // Use toFixed(2) for consistency in form submission values
                if (finalPriceInput_BookNow) finalPriceInput_BookNow.value = totalPrice.toFixed(2);
                if (payNowFinalAmountInput) payNowFinalAmountInput.value = totalPrice.toFixed(2);

                // Update dates/guests in the 'Pay Now' form
                if (payNowCheckInInput) payNowCheckInInput.value = checkInDate;
                if (payNowCheckOutInput) payNowCheckOutInput.value = checkOutDate;
                if (payNowAdultsInput) payNowAdultsInput.value = adults;
                if (payNowChildrenInput) payNowChildrenInput.value = children;
            }

            // --- Event Listeners ---
            [checkInInput, checkOutInput, adultsInput, childrenInput].forEach(input => {
                if (input) {
                    // Update on 'input' (real-time) and 'change' (when focus is lost/selection made)
                    input.addEventListener("input", updateSummary);
                    input.addEventListener("change", updateSummary);
                }
            });

            // --- Pay Now Button Logic ---
            const payNowButton = document.querySelector('.pay-now-button');
            const payNowForm = document.getElementById('prepare-session-form');
            if (payNowButton && payNowForm) {
                payNowButton.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent default button action
                    updateSummary(); // Ensure hidden fields are up-to-date

                    // Simple validation before submitting payment form
                    const checkIn = payNowCheckInInput.value;
                    const checkOut = payNowCheckOutInput.value;
                    if (!checkIn || !checkOut) {
                        alert('Please select check-in and check-out dates.');
                        checkInInput.focus(); // Focus on the first date input
                        return;
                    }
                    if (new Date(checkOut) <= new Date(checkIn)) {
                        alert('Check-out date must be after check-in date.');
                        checkOutInput.focus();
                        return;
                    }
                    // Check if total amount is valid (greater than 0)
                     const amount = parseFloat(payNowFinalAmountInput.value);
                     if (isNaN(amount) || amount <= 0) {
                        alert('Please ensure valid dates and guest numbers are selected.');
                        return;
                     }

                    // Submit the form that goes to the payment initiation route
                    payNowForm.submit();
                });
            }
            updateSummary();
        });
    </script>

    @include('layouts.whatsapp')
    @include('layouts.footer')

</body>
</html>