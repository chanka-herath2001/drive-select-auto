@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Subscription Plan</h1>

        <form method="POST" action="{{ route('subscription-plans.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="features">Features</label>
                <textarea class="form-control" id="features" name="features" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Plan</button>
        </form>
    </div>
@endsection
