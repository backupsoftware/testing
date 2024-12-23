<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/Errors/template.css') }}">
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <div class="error-message">
            Oops! The page you're looking for could not be found.
        </div>
        <a href="{{ url('/') }}" class="btn-home">Go to Homepage</a>
        <div class="animation-box"></div>
    </div>
</body>
</html>
