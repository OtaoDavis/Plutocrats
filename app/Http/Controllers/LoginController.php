<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login attempt
    public function login(Request $request)
    {
        // Validate the login input
        $validated = $request->validate([
            'login' => 'required', // 'login' is the input field for email/phone
            'password' => 'required|min:8',
        ]);

        // Check if the input is email or phone number
        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

        // Attempt login with email/phone and password
        if (Auth::attempt([$loginField => $request->login, 'password' => $request->password], $request->remember)) {
            return redirect()->route('user_dash');;
        } else {
            // Return back with error messages
            return back()->withErrors([
                'login' => 'These credentials do not match our records.',
                'password' => 'These credentials do not match our records.', 
            ]);
        }
    }
}
