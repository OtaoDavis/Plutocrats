<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking: {{ $title ?? 'Confirm Your Stay' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
    <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">
</head>

<body>
    @include('layouts.navbar') <div class="container my-5">
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

        @php
        $currencySymbols = [
        'KES' => 'Kshs',
        'USD' => '$',
        'EUR' => '€',
        'GBP' => '£',
        ];
        $currentCurrencyCode = isset($currency) && array_key_exists(strtoupper($currency), $currencySymbols)
        ? strtoupper($currency)
        : 'KES'; // Set your preferred default currency
        $currencySymbol = $currencySymbols[$currentCurrencyCode];

        $basePrice = is_numeric($price ?? null) ? (float)$price : 0;
        @endphp

        <div class="row g-5">
            <div class="col-lg-7">
                <h2 class="mb-4">Confirm and Pay</h2>

                <form id="booking-form" method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <div class="section-box mb-4"> 
                        <h5>Dates</h5>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="check_in_date_input" class="form-label">Check-in</label>
                                <input type="date" class="form-control" id="check_in_date_input" name="check_in_date"
                                    required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="check_out_date_input" class="form-label">Check-out</label>
                                <input type="date" class="form-control" id="check_out_date_input" name="check_out_date"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="section-box mb-4"> 
                        <h5>Guests</h5>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Adults</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('adults', -1)"> <i class="fas fa-minus"></i> </button>
                                    <input type="number" class="form-control text-center" name="adults" id="adults"
                                        value="1" min="1" required>
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('adults', 1)"> <i class="fas fa-plus"></i> </button>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Children (half-price)</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('children', -1)"> <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="form-control text-center" name="children" id="children"
                                        value="0" min="0" required>
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="adjustGuestCount('children', 1)"> <i class="fas fa-plus"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="location" value="Kenya">
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" id="base-price" value="{{ $basePrice }}">
                    <input type="hidden" name="price" id="final_price" value="{{ $basePrice }}">
                    <input type="hidden" name="title" value="{{ $title }}">
                    <input type="hidden" name="currency" value="{{ $currentCurrencyCode }}">
                    <input type="hidden" name="image" value="{{ $image }}">
                </form>

                <!--Form 2: For "Pay Now" (submits to payment initiation) -->
                <form id="prepare-session-form" method="POST" action="{{ route('payment.initiate') }}">
                    @csrf
                    <input type="hidden" name="check_in_date" id="paynow_check_in_date">
                    <input type="hidden" name="check_out_date" id="paynow_check_out_date">
                    <input type="hidden" name="adults" id="paynow_adults">
                    <input type="hidden" name="children" id="paynow_children">
                    <input type="hidden" name="amount" id="paynow_final_amount">
                    <input type="hidden" name="title" value="{{ $title }}">
                    <input type="hidden" name="currency" value="{{ $currentCurrencyCode }}">
                    <input type="hidden" name="image" id="image" value="{{ $image }}">

                    @auth
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    <input type="hidden" name="phone_number" value="{{ Auth::user()->phone ?? '' }}">
                    @else
                    <div class="alert alert-warning mt-3">Please <a href="{{ route('login') }}">log in</a> or <a
                            href="{{ route('register') }}">register</a> to complete your booking.</div>
                    @endauth
                </form>
            </div>

            <div class="col-lg-5">
                <div class="summary-card p-4 border rounded shadow-sm">
                    @if(!empty($image))
                    <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="img-fluid rounded mb-3">
                    @else
                    <img src="{{ asset('images/mara.webp') }}" alt="Default Image" class="img-fluid rounded mb-3">
                    @endif

                    <div class="price-details">
                        <h4>{{ $title ?? 'Selected Package' }}</h4>
                        <h5 class="mb-3">Price: {{ $currencySymbol }} {{ number_format($basePrice) }} per night</h5>

                        <p><strong>Dates:</strong> <span id="display-check-in-date">-</span> to <span
                                id="display-check-out-date">-</span></p>
                        <p><strong>Guests:</strong> <span id="display-adults-count">1</span> adults, <span
                                id="display-children-count">0</span> children</p>
                        <p><strong>Number of Nights:</strong> <span id="display-nights-count">0</span></p>
                        <hr>
                        <p><strong>Contact Email:</strong>
                            <span id="display-email-address">
                                @auth {{ Auth::user()->email }} @else Please log in @endauth
                            </span>
                        </p>
                        @auth
                        @if(Auth::user()->phone)
                        <p><strong>Contact Phone:</strong> <span id="display-phone-number">{{ Auth::user()->phone
                                }}</span></p>
                        @endif
                        @endauth
                        <hr>
                        <h5 class="fw-bold">Total Price: <span id="display-total-price-currency">{{ $currencySymbol
                                }}</span> <span id="display-total-price">{{ number_format($basePrice) }}</span></h5>

                        <div class="row mt-4 gx-2">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-100" form="booking-form"
                                    title="Reserve now, pay later/on arrival (if applicable)">Reserve</button>
                            </div>
                            <div class="col">
                                @auth
                                <button type="button" class="btn btn-success btn-lg w-100 pay-now-button"
                                    title="Confirm dates and proceed to payment">
                                    Pay Now
                                </button>
                                @else
                                <button type="button" class="btn btn-success btn-lg w-100 disabled"
                                    title="Please log in to pay">
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
            if (!input) return;
            let current = parseInt(input.value) || 0;
            const min = parseInt(input.getAttribute('min')) || 0;

            current += delta;
            if (current < min) current = min;

            input.value = current;
            input.dispatchEvent(new Event('input', { bubbles: true }));
        }

        document.addEventListener("DOMContentLoaded", function () {
            const checkInInput = document.getElementById("check_in_date_input");
            const checkOutInput = document.getElementById("check_out_date_input");
            const adultsInput = document.getElementById("adults");
            const childrenInput = document.getElementById("children");
            const checkInDateDisplay = document.getElementById("display-check-in-date");
            const checkOutDateDisplay = document.getElementById("display-check-out-date");
            const adultsCountDisplay = document.getElementById("display-adults-count");
            const childrenCountDisplay = document.getElementById("display-children-count");
            const nightsCountDisplay = document.getElementById("display-nights-count");
            const totalPriceCurrencyDisplay = document.getElementById("display-total-price-currency");
            const totalPriceValueDisplay = document.getElementById("display-total-price");
            const finalPriceInput_BookNow = document.getElementById("final_price");
            const payNowCheckInInput = document.getElementById("paynow_check_in_date");
            const payNowCheckOutInput = document.getElementById("paynow_check_out_date");
            const payNowAdultsInput = document.getElementById("paynow_adults");
            const payNowChildrenInput = document.getElementById("paynow_children");
            const payNowFinalAmountInput = document.getElementById("paynow_final_amount");

            function updateSummary() {
                if (!checkInInput || !checkOutInput || !adultsInput || !childrenInput || !checkInDateDisplay || !checkOutDateDisplay || !adultsCountDisplay || !childrenCountDisplay || !nightsCountDisplay || !totalPriceCurrencyDisplay || !totalPriceValueDisplay) {
                    console.error("One or more required elements not found in the DOM.");
                    return;
                }
                const checkInDate = checkInInput.value;
                const checkOutDate = checkOutInput.value;
                const adults = parseInt(adultsInput.value) || 1;
                const children = parseInt(childrenInput.value) || 0;
                const pricePerAdult = BASE_PRICE;
                const pricePerChild = pricePerAdult / 2;
                let nights = 0;
                let totalPrice = 0;

                if (checkInDate && checkOutDate) {
                    try {
                        const checkIn = new Date(checkInDate);
                        const checkOut = new Date(checkOutDate);
                        if (!isNaN(checkIn.getTime()) && !isNaN(checkOut.getTime()) && checkOut > checkIn) {
                            nights = Math.ceil((checkOut.getTime() - checkIn.getTime()) / (1000 * 3600 * 24));
                            totalPrice = (adults * pricePerAdult + children * pricePerChild) * nights;
                        } else {
                            nights = 0;
                            totalPrice = 0;
                            if (checkOut <= checkIn && checkInDate && checkOutDate) { 
                                console.warn("Check-out date must be after check-in date.");
                            }
                        }
                    } catch (e) {
                        console.error("Error calculating dates:", e);
                        nights = 0;
                        totalPrice = 0;
                    }
                }
                checkInDateDisplay.textContent = checkInDate || '-';
                checkOutDateDisplay.textContent = checkOutDate || '-';
                adultsCountDisplay.textContent = adults;
                childrenCountDisplay.textContent = children;
                nightsCountDisplay.textContent = nights > 0 ? nights : (checkInDate && checkOutDate ? 0 : '-'); 
                const symbol = CURRENCY_SYMBOLS[CURRENCY_CODE] || CURRENCY_CODE;
                totalPriceCurrencyDisplay.textContent = symbol;
                totalPriceValueDisplay.textContent = totalPrice.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                if (finalPriceInput_BookNow) finalPriceInput_BookNow.value = totalPrice.toFixed(2);
                if (payNowFinalAmountInput) payNowFinalAmountInput.value = totalPrice.toFixed(2);
                if (payNowCheckInInput) payNowCheckInInput.value = checkInDate;
                if (payNowCheckOutInput) payNowCheckOutInput.value = checkOutDate;
                if (payNowAdultsInput) payNowAdultsInput.value = adults;
                if (payNowChildrenInput) payNowChildrenInput.value = children;
            }

            [checkInInput, checkOutInput, adultsInput, childrenInput].forEach(input => {
                if (input) {
                    input.addEventListener("input", updateSummary);
                    input.addEventListener("change", updateSummary);
                }
            });

            const payNowButton = document.querySelector('.pay-now-button');
            const payNowForm = document.getElementById('prepare-session-form');
            if (payNowButton && payNowForm) {
                payNowButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    updateSummary(); // Ensure hidden fields are up-to-date

                    const checkIn = payNowCheckInInput.value;
                    const checkOut = payNowCheckOutInput.value;
                    if (!checkIn || !checkOut) {
                        alert('Please select check-in and check-out dates.');
                        checkInInput.focus();
                        return;
                    }
                    if (new Date(checkOut) <= new Date(checkIn)) {
                        alert('Check-out date must be after check-in date.');
                        checkOutInput.focus();
                        return;
                    }
                    const amount = parseFloat(payNowFinalAmountInput.value);
                    if (isNaN(amount) || amount <= 0) {
                        alert('Please ensure valid dates and guest numbers are selected, resulting in a price greater than 0.');
                        return;
                    }
                    payNowForm.submit();
                });
            }
            updateSummary();
        });
    </script>

    @include('layouts.whatsapp')
    @include('layouts.footer')

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>