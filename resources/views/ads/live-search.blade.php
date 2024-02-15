@foreach ($ads as $ad)
    <a href="{{ route('ads.showDetails', ['id' => $ad->id]) }}" target="_blank" class="ad-link">
        <img src="{{ asset('' . $ad->image) }}" alt="Image" width="250px" height="auto">
        <div>
            <h2 class="ad-title">{{ $ad->title }} ({{ $ad->condition }})</h2>
            <p class="ad-price">Rs {{ number_format($ad->price) }}</p>
            <p class="ad-location">{{ $ad->location }} </p>
        </div>
    </a>
    <hr>
@endforeach
