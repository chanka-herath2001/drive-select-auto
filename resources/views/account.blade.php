@extends('layouts.app')

@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>DriveSelect Auto</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css">
        <!-- Your Custom CSS -->

        <link rel="stylesheet" href="{{ asset('css/_variables.scss') }}">
    </head>

    <body>
        <div class="container">


            @auth
                <h2 class="account-header">Welcome, {{ auth()->user()->name }}!</h2>
                <p class="account-details">Email: {{ auth()->user()->email }}</p>
                <p class="account-details">Phone: {{ auth()->user()->mobile }}</p>
                <!-- Add other user information as needed -->
            @else
                <p>You are not logged in.</p>
            @endauth


            <h1 class="account-subscription-plans">Subscription Plans</h1>

            <div class="subscription-plans-container">
                @foreach ($plans as $plan)
                    <div class="subscription-plan-card">
                        <h3 class="subscription-plan-name">{{ $plan->name }}</h3>
                        <p class="subscription-plan-details">{{ $plan->features }}</p>
                        <p class="subscription-plan-price">Rs{{ $plan->price }}</p>

                        @if (auth()->check())
                            <form method="POST">
                                @csrf
                                <button type="submit" class="subscription-plan-button">Subscribe</button>
                            </form>
                        @else
                            <p>Login to subscribe</p>
                        @endif

                        <hr>
                    </div>
                @endforeach
            </div>

            <h2 class="account-your-ads">Your Ads</h2>

            @if (count($ads) > 0)
                @foreach ($ads as $ad)
                    <div class="account-ad-container">
                        <img src="{{ asset('' . $ad->image) }}" alt="Image" width="250px" height="auto">
                        <p class="account-ad-title">{{ $ad->title }}</p>
                        <p class="account-ad-price">Rs {{ number_format($ad->price) }}</p>
                        <a href="{{ route('ads.showDetails', ['id' => $ad->id]) }}" target="_blank"
                            class="account-ad-view-ad">View Ad</a>
                    </div>
                    <hr>
                @endforeach
            @else
                <p>You haven't posted any ads yet.</p>
            @endif
        </div>
    </body>
    <footer class="footer  py-2 footer-extra">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Quick Links</h5>
                    <!-- Links to Nav Bar Items -->

                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-light">Used Cars</a></li>
                        <li><a href="#" class="text-light">New Cars</a></li>
                        <li><a href="#" class="text-light">Sell Your Cars</a></li>
                        <li><a href="#" class="text-light">About</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Connect with Us</h5>
                    <!-- Social Media Links -->
                    <div class="social-icons-wrapper">
                        <ul class="list-unstyled social-icons d-flex ">
                            <li><a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="text-light"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="text-light"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2023 DriveSelect Auto</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>Designed by Chanka Herath</p>
                </div>
            </div>
        </div>
    </footer>
@endsection
