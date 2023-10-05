@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Subscription Plan</h1>

        <form method="POST" action="{{ route('subscription-plans.update', $plan->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $plan->name }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $plan->price }}"
                    required>
            </div>

            <div class="form-group">
                <label for="features">Features</label>
                <textarea class="form-control" id="features" name="features" rows="4" required>{{ $plan->features }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Plan</button>
        </form>
    </div>
@endsection
