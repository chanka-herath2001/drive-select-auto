@extends('layouts.app')

@section('content')
    <div class="ad-details-container">
        <h2 class="ad-details-title">{{ $ad->title }}</h2>

        <img class="ad-details-image" src="{{ asset($ad->image) }}" alt="Ad Image" width="500px" height="auto">
        <p class="ad-details-price">Price: {{ number_format($ad->price) }}</p>
        <div class="ad-details">
            <div class="ad-minor-details">
                <div class="column">
                    <p class="ad-details-mileage">Mileage: {{ $ad->mileage }}</p>
                    <p class="ad-details-year">Year: {{ $ad->year }}</p>
                    <p class="ad-details-brand">Brand: {{ $ad->brand }}</p>
                    <p class="ad-details-phone-number">Phone Number: {{ $ad->phone }}</p>
                    <p class="ad-details-email">Email: {{ $ad->email }}</p>
                </div>
                <div class="column">
                    <p class="ad-details-location">Location: {{ $ad->location }}</p>
                    <p class="ad-details-model">Model: {{ $ad->model }}</p>
                    <p class="ad-details-transmission">Transmission: {{ $ad->transmission }}</p>
                    <p class="ad-fuel-type">Fuel Type: {{ $ad->fuel_type }}</p>
                </div>
            </div>
            <div class="ad-details-description">
                <p>{{ $ad->description }}</p>
                <!-- Add description here -->
            </div>
        </div>
    </div>
@endsection
