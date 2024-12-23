@extends('layouts.navbar')
    
@section('content')
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Welcome to Our Company</h1>
            <p class="lead text-muted">Description</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Call to Action</a>
                <a href="#" class="btn btn-secondary my-2">Another Action</a>
            </p>
        </div>
    </section>

    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2>basic</h2>
                            <p class="card-text">Level1 sign up form preview</p>
                            <a href="/1" class="btn btn-primary">Click</a> <!-- Add route for button 1 -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2>Email with otp</h2>
                            <p class="card-text">Level2 sign up form preview</p>
                            <a href="/2" class="btn btn-primary">Click</a> <!-- Add route for button 2 -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h2>Captcha</h2>
                            <p class="card-text">Level3 sign up form preview</p>
                            <a href="/3" class="btn btn-primary">Click</a> <!-- Add route for button 3 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
