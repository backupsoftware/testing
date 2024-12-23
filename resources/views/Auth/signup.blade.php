@extends('layouts.form')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('asset/css/Signup-Form/basic.css') }}">
    </head>

    <body>
        <div class="container">
            <form id="signupForm" action="{{ route('signup.post') }}" method="POST" class="form-card shadow p-4 rounded bg-light">
                @csrf
                <h1 class="mb-4 text-center">Signup Form</h1>

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
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
                            <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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

                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            </form>
        </div>

        <script src="{{ asset('asset/js/Signup-Form/basic.js') }}"></script>

    </body>

    </html>
@endsection
