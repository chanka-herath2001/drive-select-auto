@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="ad-header">Search Results</h1>

        @foreach ($ads as $ad)
            <a href="{{ route('ads.showDetails', ['id' => $ad->id]) }}" target="_blank" class="ad-link">
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
            </a>
            <hr>
        @endforeach
    </div>
@endsection
