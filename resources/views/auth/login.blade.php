<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        body {
            background-color: #f2f2f2;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .auth-box {
            width: 100%;
            max-width: 500px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25), 0 0 10px rgba(180, 143, 32, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .auth-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3), 0 0 15px rgba(180, 143, 32, 0.6);
        }

        .auth-box .btn-primary {
            background-color: #b48f20;
            border-color: #b48f20;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .auth-box .btn-primary:hover {
            background-color: #1A374D;
            border-color: #1A374D;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-logo img {
            width: 180px;
        }

        .form-check-label {
            cursor: pointer;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="container login-container">
        <div class="auth-box rounded p-3">
            <div class="login-logo">
                <img src="{{ asset('images/ico_full.svg') }}" alt="Plutocrats Travel">
            </div>
            <h2 class="text-center mb-4">Sign In</h2>

            @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
            
                <!-- Email or Phone Number -->
                <div class="mb-3">
                    <label for="login" class="form-label">Email Address or Phone Number</label>
                    <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" placeholder="Email or Phone" required>
                    @error('login')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <!-- Remember Me Checkbox -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
            
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>
            
            

            <div class="text-center mt-3">
                <a href="">Forgot Your Password?</a>
            </div>
            <div class="text-center mt-2">
                <span>Don't have an account?</span>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>