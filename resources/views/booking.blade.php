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
            <!-- Left side -->
            <div class="col-lg-7">
                <h2 class="mb-4">Confirm and Pay</h2>

                <!-- Dates Section -->                 
                <div class="section-box">
                    <h5>Dates</h5>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="check-in" class="form-label">Check-in</label>
                            <input type="date" class="form-control" id="check-in" name="check-in" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="check-out" class="form-label">Check-out</label>
                            <input type="date" class="form-control" id="check-out" name="check-out" required>
                        </div>
                    </div>
                </div>


                <!-- Guests Section with separate inputs for Adults and Children side by side -->
                <div class="section-box">
                    <h5>Guests</h5>

                    <div class="row">
                        <!-- Adults Guest Count -->
                        <div class="col-6 mb-3">
                            <label for="adult-count" class="form-label">Adults</label>
                            <div class="input-group" style="max-width: 200px;">
                                <button class="btn btn-outline-secondary input-group-btn" type="button"
                                    id="decrement-adults">-</button>
                                <input type="number" class="form-control text-center" id="adult-count" value="2" min="1"
                                    required>
                                <button class="btn btn-outline-secondary input-group-btn" type="button"
                                    id="increment-adults">+</button>
                            </div>
                        </div>

                        <!-- Children Guest Count -->
                        <div class="col-6 mb-3">
                            <label for="child-count" class="form-label">Children</label>
                            <div class="input-group" style="max-width: 200px;">
                                <button class="btn btn-outline-secondary input-group-btn" type="button"
                                    id="decrement-children">-</button>
                                <input type="number" class="form-control text-center" id="child-count" value="1" min="0"
                                    required>
                                <button class="btn btn-outline-secondary input-group-btn" type="button"
                                    id="increment-children">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Authentication Section -->
                <div class="auth-box rounded p-4 mb-5" style="max-width: 500px; margin: 0 auto;">
                    <h4 class="mb-3 text-center">Sign in or create account</h4>

                    <form method="POST" action="/verify-phone">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" required>
                        </div>

                        <!-- Phone Number with Country Code -->
                        <div class="mb-3">
                            <label for="country_code" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <select class="form-select" name="country_code" id="country_code"
                                    style="max-width: 120px;" required>
                                    <option value="+254">🇰🇪 +254</option>
                                    <option value="+1">🇺🇸 +1</option>
                                    <option value="+44">🇬🇧 +44</option>
                                    <option value="+91">🇮🇳 +91</option>
                                </select>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="712345678"
                                    required pattern="[0-9]{9}">
                            </div>
                            <small class="form-text text-muted">
                                We’ll call or text you to confirm your number. Standard rates apply.
                            </small>
                        </div>

                        <!-- Social Icons -->
                        <div class="d-flex justify-content-center gap-3 my-4">
                            <a href="#" class="btn btn-outline-secondary rounded-circle">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="btn btn-outline-secondary rounded-circle">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-secondary rounded-circle">
                                <i class="fab fa-apple"></i>
                            </a>
                        </div>

                        <!-- Continue Button -->
                        <button type="submit" class="btn btn-primary w-100">Continue</button>
                    </form>
                </div>

            </div>

            <!-- Right side (Summary Card) -->
            <div class="col-lg-5">
                <div class="summary-card">
                    <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="img-fluid rounded mb-3">

                    <div class="price-details">
                        <h4>{{ urldecode($title) }}</h4>
                        <h5 class="mb-3">Price Summary</h5>
                        <p>5 nights x Kshs/=: <strong>Kshs/=</strong></p>
                        <p>Service Fee: <strong>Kshs/=</strong></p>
                        <hr>
                        <p class="fs-5"><strong>Total: Kshs/=</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Guest count functionality for Adults
            const incrementAdults = document.getElementById("increment-adults");
            const decrementAdults = document.getElementById("decrement-adults");
            const adultCountInput = document.getElementById("adult-count");

            incrementAdults.addEventListener("click", function () {
                let currentValue = parseInt(adultCountInput.value);
                adultCountInput.value = currentValue + 1;
            });

            decrementAdults.addEventListener("click", function () {
                let currentValue = parseInt(adultCountInput.value);
                if (currentValue > 1) {
                    adultCountInput.value = currentValue - 1;
                }
            });

            // Guest count functionality for Children
            const incrementChildren = document.getElementById("increment-children");
            const decrementChildren = document.getElementById("decrement-children");
            const childCountInput = document.getElementById("child-count");

            incrementChildren.addEventListener("click", function () {
                let currentValue = parseInt(childCountInput.value);
                childCountInput.value = currentValue + 1;
            });

            decrementChildren.addEventListener("click", function () {
                let currentValue = parseInt(childCountInput.value);
                if (currentValue > 0) {
                    childCountInput.value = currentValue - 1;
                }
            });
        </script>

</body>

</html>