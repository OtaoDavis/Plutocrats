<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.6.4/dist/email.min.js"></script>
        <style>
            body {
                background-color: #f2f2f2;
                overflow-y: hidden;
            }

            .section-box {
                background: #ffffff;
                border-radius: 8px;
                margin-bottom: 20px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .summary-card {
                background: #ffffff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                position: sticky;
                top: 20px;
            }

            .summary-card img {
                max-height: 200px;
                object-fit: cover;
            }

            .price-details p {
                margin-bottom: 10px;
            }

            .price-details hr {
                margin: 10px 0;
            }

            /* Social Icons */
            .auth-box .btn-outline-secondary {
                background-color: #b48f20;
                color: white;
                border: none;
                width: 45px;
                height: 45px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                transition: background-color 0.3s ease;
            }

            .auth-box .btn-outline-secondary:hover {
                background-color: #1A374D;
                color: white;
            }

            /* Common box shadow and hover effect for all boxes */
            .section-box,
            .summary-card,
            .auth-box {
                background: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                padding: 20px;
                max-height: 90vh;
                overflow-y: auto;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3), 0 0 15px rgba(180, 143, 32, 0.6);
                margin-top: -100px;
            }

            .section-box:hover,
            .summary-card:hover,
            .auth-box:hover {
                transform: translateY(-5px);
            }

            /* Continue Button */
            .auth-box .btn-primary {
                background-color: #b48f20;
                border-color: #b48f20;
                transition: background-color 0.3s ease, border-color 0.3s ease;
            }

            .auth-box .btn-primary:hover {
                background-color: #1A374D;
                border-color: #1A374D;
            }

            .priv_policy {
                font-size: small;
                color: #1A374D;
            }

            .input-group-btn {
                display: flex;
            }

            .input-group-btn button {
                border: 1px solid #ddd;
                width: 30px;
                height: 30px;
            }

            .input-group-btn button:focus {
                outline: none;
            }

            /* Logo Styles */
            .login-logo {
                text-align: center;
            }

            .login-logo img {
                margin-top: -80px;
                width: 300px;
            }

            .small-input {
                padding: 8px 10px;
                font-size: 0.9rem;
            }

            .row .col-md-6 {
                padding-right: 10px;
            }

            .row .col-md-6:last-child {
                padding-left: 10px;
            }

            @media (max-width: 767px) {
                .row .col-md-6 {
                    padding-left: 0;
                    padding-right: 0;
                }
            }
        </style>
    </head>

    <body>
        @include('layouts.navbar')

        <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
            <div class="row w-100 justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="auth-box rounded p-3">
                        <div class="login-logo">
                            <img src="{{ asset('images/ico_full.svg') }}" alt="Plutocrats Travel">
                        </div>

                        <h4 class="text-center mb-3">Create Account</h4>

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <!-- First Row: Name and Phone Number Side-by-Side -->
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text"
                                        class="form-control small-input @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text"
                                        class="form-control small-input @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Second Row: Email and Password Side-by-Side -->
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email Address<label>
                                    <input type="email"
                                        class="form-control small-input @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control small-input @error('password') is-invalid @enderror"
                                        id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Confirmation -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control small-input" id="password_confirmation"
                                    name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Create Account</button>
                        </form>

                        <div class="text-center mt-2">
                            <a href="{{ route('login') }}">Already have an account? Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>
            (function() {
            emailjs.init("0O7jeF3__Al1T_a5s");
        })();
        </script>
    </body>

</html>
