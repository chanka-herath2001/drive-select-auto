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
        {{-- <div class="search-container">
            <form action="{{ route('ads.search') }}" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Search for a car...">
                <button type="submit">Search</button>
            </form>
        </div> --}}

        <div class="car-ads-pages">
            <div class="col-md-12 d-flex align-items-center pl-3 flex-container">
                <div class="used-car">
                    <h1>Top Selling used cars</h1>
                </div>
                <a href="{{ route('ads.create') }}" class=" btn-primary ad-button">Post Ad</a>
            </div>

            <div class="carousel-container">

                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-inner">
                        @foreach ($ads as $index => $ad)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="10000">
                                <img src="{{ asset('' . $ad->image) }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="top-ad-title">{{ $ad->title }}</h5>
                                    <p class="top-ad-para">Rs {{ number_format($ad->price) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>


            <div class="container">
                <h1 class="ad-header">Browse vehicles</h1>

                @foreach ($ads as $ad)
                    <a href="{{ route('ads.showDetails', ['id' => $ad->id]) }}" target="_blank" class="ad-link">
                        <div class="ad-container">
                            <img src="{{ asset('' . $ad->image) }}" alt="Image" width="250px" height="auto">
                            <div>
                                <h2 class="ad-title">{{ $ad->title }} ({{ $ad->condition }})</h2>
                                {{-- <p> {{ $ad->mileage }} km</p> --}}
                                <p class="ad-price">Rs {{ number_format($ad->price) }}</p>
                                {{-- <p>{{ $ad->year }}</p>
                            <p> {{ $ad->description }}</p>
                            <p>{{ $ad->brand }}</p>
                            <p>{{ $ad->model }}</p>
                            <p>{{ $ad->transmission }}</p>
                            <p>{{ $ad->fuel_type }}</p> --}}
                                <p class="ad-location">{{ $ad->location }} </p>
                            </div>
                        </div>
                    </a>
                    <hr>
                @endforeach
            </div>
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
