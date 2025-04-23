<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Booking Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/book.css') }}">
        <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">
    </head>

    <body>
        @include('layouts.navbar')

        <div class="container my-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <h2 class="mb-4">Confirm and Pay</h2>
                    {{-- This form is only used by the 'Book Now' button --}}
                    <form id="booking-form" method="POST" action="{{ route('booking.store') }}">
                        @csrf

                        <div class="section-box">
                            <h5>Dates</h5>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="check-in" class="form-label">Check-in</label>
                                    <input type="date" class="form-control" id="check_in_date_input"
                                        name="check_in_date" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="check-out" class="form-label">Check-out</label>
                                    <input type="date" class="form-control" id="check_out_date_input"
                                        name="check_out_date" required>
                                </div>
                            </div>
                        </div>

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
                                        <input type="number" class="form-control text-center" name="adults"
                                            id="adults" value="1" min="1" required>
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="adjustGuestCount('adults', 1)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label">Children(half-price)</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="adjustGuestCount('children', -1)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" class="form-control text-center" name="children"
                                            id="children" value="0" min="0" required> {{-- Changed default to 0 --}}
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="adjustGuestCount('children', 1)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="location" value="Mara"> {{-- Make dynamic if needed --}}
                        <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" id="base-price" value="{{ $price }}">
                        {{-- final_price is updated by JS, used by 'Book Now' form --}}
                        <input type="hidden" name="price" id="final_price" value="{{ $price }}">
                        <input type="hidden" name="title" value="{{ $title }}">

                    </form>
                </div>

                <div class="col-lg-5">
                    <div class="summary-card">
                        <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}"
                            class="img-fluid rounded mb-3">

                        <div class="price-details">
                            <h4 id="title">{{ urldecode($title) }}</h4>
                            <h5 class="mb-3">Price: Kshs {{ number_format($price) }}/= per night</h5>

                            <p><strong>Dates:</strong> <span id="check-in-date">-</span> to <span
                                    id="check-out-date">-</span></p>
                            <p><strong>Guests:</strong> <span id="adults-count">1</span> adults, <span
                                    {{-- Updated default --}} id="children-count">0</span> children</p>
                            {{-- Updated default --}}
                            <p><strong>Number of Nights:</strong> <span id="nights-count">0</span></p>

                            <p><strong>Email:</strong>
                                <span id="email-address">
                                    @auth
                                        {{ Auth::user()->email }}
                                    @else
                                        - {{-- Consider adding email field for guests --}}
                                    @endauth
                                </span>
                            </p>

                            <p><strong>Phone:</strong>
                                <span id="phone-number">
                                    @auth
                                        {{ Auth::user()->phone ?? 'N/A' }}
                                    @else
                                        - {{-- Consider adding phone field for guests --}}
                                    @endauth
                                </span>
                            </p>

                            <p><strong>Total Price:</strong> Kshs <span
                                    id="total-price">{{ number_format($price) }}</span>/=</p>

                            <div class="d-flex justify-content-between">
                                <button type="submit" form="booking-form" class="btn btn-primary w-48">Book
                                    Now</button>

                                {{-- This form is only used by the 'Pay Now' button --}}
                                <form id="pay-now-form" action="{{ route('paystack.initialize') }}" method="POST">
                                    @csrf
                                    {{-- Hidden fields mirror the booking form and get updated by JS --}}
                                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                                    {{-- Fields needed to CREATE a booking first --}}
                                    <input type="hidden" id="paynow_check_in_date" name="check_in_date"
                                        value="">
                                    <input type="hidden" id="paynow_check_out_date" name="check_out_date"
                                        value="">
                                    <input type="hidden" id="paynow_adults" name="adults" value="1">
                                    <input type="hidden" id="paynow_children" name="children" value="0">
                                    <input type="hidden" name="location" value="Mara"> {{-- Make dynamic if needed --}}
                                    <input type="hidden" name="title" value="{{ $title }}">
                                    <input type="hidden" name="user_id"
                                        value="{{ auth()->check() ? auth()->user()->id : '' }}">

                                    {{-- This amount MUST be updated by JS to the final calculated price --}}
                                    <input type="hidden" name="amount" id="paynow_final_amount"
                                        value="{{ $price }}">

                                    <button type="submit" class="btn btn-success w-48">Pay Now</button>
                                    {{-- Adjusted width --}}
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function adjustGuestCount(id, delta) {
                const input = document.getElementById(id);
                let current = parseInt(input.value) || 0;
                const min = parseInt(input.getAttribute('min')) || 0;

                current += delta;
                if (current < min) current = min;

                input.value = current;
                input.dispatchEvent(new Event('input')); // Trigger input event for summary update
            }

            // No need for payNow() function as the form submission handles it

            document.addEventListener("DOMContentLoaded", function() {
                // Get references to form inputs
                const checkInInput = document.getElementById("check_in_date_input");
                const checkOutInput = document.getElementById("check_out_date_input");
                const adultsInput = document.getElementById("adults");
                const childrenInput = document.getElementById("children");
                // No need for email/phone inputs here if using authenticated user data

                // Get references to summary display elements
                const checkInDateDisplay = document.getElementById("check-in-date");
                const checkOutDateDisplay = document.getElementById("check-out-date");
                const adultsCountDisplay = document.getElementById("adults-count");
                const childrenCountDisplay = document.getElementById("children-count");
                const nightsCountDisplay = document.getElementById("nights-count");
                const totalPriceDisplay = document.getElementById("total-price");
                const finalPriceInput = document.getElementById("final_price"); // For 'Book Now' form
                const basePrice = parseFloat(document.getElementById("base-price").value);

                // Get references to hidden inputs in the 'Pay Now' form
                const payNowCheckInInput = document.getElementById("paynow_check_in_date");
                const payNowCheckOutInput = document.getElementById("paynow_check_out_date");
                const payNowAdultsInput = document.getElementById("paynow_adults");
                const payNowChildrenInput = document.getElementById("paynow_children");
                const payNowFinalAmountInput = document.getElementById("paynow_final_amount");


                function updateSummary() {
                    const checkInDate = checkInInput.value;
                    const checkOutDate = checkOutInput.value;
                    const adults = parseInt(adultsInput.value) || 1; // Default to 1 if invalid
                    const children = parseInt(childrenInput.value) || 0; // Default to 0 if invalid

                    const pricePerAdult = basePrice;
                    const pricePerChild = pricePerAdult / 2;

                    // Update Summary Display
                    checkInDateDisplay.textContent = checkInDate || '-';
                    checkOutDateDisplay.textContent = checkOutDate || '-';
                    adultsCountDisplay.textContent = adults;
                    childrenCountDisplay.textContent = children;

                    let nights = 0;
                    let totalPrice = pricePerAdult; // Default to base price if dates invalid

                    if (checkInDate && checkOutDate) {
                        const checkIn = new Date(checkInDate);
                        const checkOut = new Date(checkOutDate);

                        if (checkOut > checkIn) {
                            nights = Math.ceil((checkOut - checkIn) / (1000 * 3600 * 24)); // Use Math.ceil for nights
                            totalPrice = (adults * pricePerAdult + children * pricePerChild) * nights;
                        } else {
                            // Handle invalid date range (e.g., checkout before checkin)
                            nights = 0;
                            totalPrice = pricePerAdult; // Or set to 0, or show error
                        }
                    }

                    nightsCountDisplay.textContent = nights > 0 ? nights : '-'; // Show '-' if 0 nights
                    totalPriceDisplay.textContent = totalPrice.toLocaleString();

                    // Update hidden inputs for BOTH forms
                    finalPriceInput.value = totalPrice; // For 'Book Now' form
                    payNowFinalAmountInput.value = totalPrice; // For 'Pay Now' form

                    // Update hidden inputs in 'Pay Now' form specifically
                    payNowCheckInInput.value = checkInDate;
                    payNowCheckOutInput.value = checkOutDate;
                    payNowAdultsInput.value = adults;
                    payNowChildrenInput.value = children;
                }

                // Add event listeners to update summary on input change
                [checkInInput, checkOutInput, adultsInput, childrenInput].forEach(input => {
                    if (input) { // Check if element exists
                        input.addEventListener("input", updateSummary);
                        input.addEventListener("change",
                        updateSummary); // Also listen for change (e.g., date picker close)
                    }
                });

                // Initial calculation on page load
                updateSummary();
            });
        </script>

    </body>

</html>
