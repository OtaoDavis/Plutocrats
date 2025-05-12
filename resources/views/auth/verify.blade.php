<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Your Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/ico_head.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            background-color: #f2f2f2;
        }

        .verification-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .auth-box { /* Renamed to auth-box to match login page */
            width: 100%;
            max-width: 500px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25), 0 0 10px rgba(180, 143, 32, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-box:hover { /* Added hover effect to match login page */
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3), 0 0 15px rgba(180, 143, 32, 0.6);
        }

        .verification-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .verification-logo img {
            width: 180px;
        }

        .verification-text {
            margin-bottom: 20px;
            color: #555;
        }

        .resend-button {
            margin-top: 20px;
        }

        .resend-button { /* Styled to match login button */
            background-color: #b48f20;
            border-color: #b48f20;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .resend-button:hover {  /* Added hover effect */
            background-color: #1A374D;
            border-color: #1A374D;
        }
        .text-center a{
            color: #b48f20;
        }
    </style>
</head>
<body>
    <div class="container verification-container">
        <div class="auth-box rounded p-3"> {{-- Changed to auth-box class --}}
            <div class="verification-logo">
                <img src="{{ asset('images/ico_full.svg') }}" alt="Plutocrats Travel">
            </div>
            <h2 class="text-center mb-4">Verify Your Email Address</h2>

            <div class="alert alert-warning text-center">
                <p class="verification-text">
                    A verification link has been sent to your email address.  Please click the link in that email to verify your address and activate your account.
                </p>
                <p class="verification-text">
                    If you did not receive the email, click the button below to request another.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-center">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary resend-button w-100">Resend Verification Email</button> {{-- Styled button --}}
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>