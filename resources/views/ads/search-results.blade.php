@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Results for "{{ $query }}"</h1>

        @forelse ($ads as $ad)
            <a href="{{ route('ads.showDetails', ['id' => $ad->id]) }}" target="_blank" class="ad-link">
                <div class="ad-container">
                    <img src="{{ asset('' . $ad->image) }}" alt="Image" width="250px" height="auto">
                    <div>
                        <h2 class="ad-title">{{ $ad->title }} ({{ $ad->condition }})</h2>
                        <p class="ad-price">Rs {{ number_format($ad->price) }}</p>
                        <p class="ad-location">{{ $ad->location }} </p>
                    </div>
                </div>
            </a>
            <hr>
        @empty
            <p>No ads found for the search query.</p>
        @endforelse
    </div>
@endsection
