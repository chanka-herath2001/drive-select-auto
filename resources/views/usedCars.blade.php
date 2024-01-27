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
                                <h5>{{ $ad->title }}</h5>
                                <p>{{ $ad->description }}</p>
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
                            <h2>{{ $ad->title }} ({{ $ad->condition }})</h2>
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

    </body>
@endsection
