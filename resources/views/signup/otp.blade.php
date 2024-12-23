@extends('layouts.form')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Basic Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Signup form to create a new account.">
        <meta name="keywords" content="signup, form, registration, create account">
        <meta name="author" content="Your Website Name">

        <title>Signup Form</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Custom Styles for OTP Form -->
        <link rel="stylesheet" href="{{ asset('asset/css/Signup-Form/otp.css') }}">

        <!-- Additional Meta Tags for SEO and Social Media Sharing -->
        <meta property="og:title" content="Signup Form">
        <meta property="og:description" content="Create a new account using our simple signup form.">
        <meta property="og:image" content="{{ asset('asset/images/signup-banner.jpg') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Signup Form">
        <meta name="twitter:description" content="Signup and create your account.">

    </head>

    <body>
        <div class="container mt-5">
            <form id="signupForm" action="#" method="POST" class="form-card shadow p-4 rounded bg-light">
                @csrf
                <h1 class="mb-4 text-center">Email WIth OTP Signup Form</h1>

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Email Field with Send OTP Inside -->
                <label for="email" class="form-label">Email:</label>
                <div class="mb-3 email-field">
                    <input type="email" id="email" name="email" class="form-control email-input"  required>
                    <button type="button" class="send-otp-btn" id="sendOtpBtn">Send OTP</button>
                </div>

                <!-- OTP Input Field -->
                <div class="mb-3" id="otpField" style="display: none;">
                    <label for="otp" class="form-label">Enter OTP:</label>
                    <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" maxlength="6" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i id="passwordIcon" class="bi bi-eye-slash"></i>
                        </button>
                    </div>
                    <div id="passwordFeedback" class="feedback form-text mt-2" aria-live="polite">
                        <div class="progress mt-2">
                            <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div>
                            <small id="uppercase" class="text-danger">• At least 1 uppercase letter</small>
                            <small id="lowercase" class="text-danger">• At least 1 lowercase letter</small>
                        </div>
                        <div>
                            <small id="number" class="text-danger">• At least 1 number</small>
                            <small id="special" class="text-danger">• At least 1 special character</small>
                        </div>
                        <div>
                            <small id="length" class="text-danger">• Minimum 8 characters</small>
                            <small id="unique" class="text-danger">• Avoid common passwords</small>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            </form>
        </div>

        <!-- Custom JavaScript for OTP functionality -->
        <script src="{{ asset('asset/js/Signup-Form/otp.js') }}"></script>
    </body>

    </html>
@endsection
