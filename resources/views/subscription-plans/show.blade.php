@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subscription Plan Details</h1>
        <p><strong>Name:</strong> {{ $plan->name }}</p>
        <p><strong>Price:</strong> {{ $plan->price }}</p>
        <p><strong>Features:</strong></p>
        <p>{{ $plan->features }}</p>

        <a href="{{ route('subscription-plans.edit', $plan->id) }}" class="btn btn-primary">Edit Plan</a>
    </div>
@endsection
