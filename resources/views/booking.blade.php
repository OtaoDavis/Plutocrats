<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">


    <style>

    </style>
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
                    <p>Check-in: <strong></strong></p>
                    <p>Check-out: <strong></strong></p>
                </div>

                <!-- Guests Section -->
                <div class="section-box">
                    <h5>Guests</h5>
                    <p>2 Adults, 1 Child</p>
                </div>

                <div class="auth-box rounded p-4 mb-5" style="max-width: 500px; margin: 0 auto;">
                    <h4 class="mb-3 text-center">Sign in or create account</h4>

                    <form>
                        {{-- Country Code + Phone Input --}}
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <select class="form-select" style="max-width: 120px;">
                                    <option value="+254">🇰🇪 +254</option>
                                    <option value="+1">🇺🇸 +1</option>
                                    <option value="+44">🇬🇧 +44</option>
                                    <option value="+91">🇮🇳 +91</option>
                                    {{-- Add more countries as needed --}}
                                </select>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter phone number">
                            </div>
                            <span class="priv_policy">We’ll call or text you to confirm your number. Standard message
                                and data rates apply. Privacy Policy</span>
                        </div>

                        {{-- Social Icons --}}
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


                        {{-- Continue Button --}}
                        <button type="submit" class="btn btn-primary w-100">Continue</button>
                    </form>
                    <button class="btn btn-primary w-100 mt-4">Sign In With Email</button>
                </div>




            </div>

            <!-- Right side -->
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


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>