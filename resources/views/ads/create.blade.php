@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Post an Ad</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="mileage" class="form-label">Mileage</label>
                <input type="number" class="form-control" id="mileage" name="mileage" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>

            <div class="mb-3">
                <label for="transmission" class="form-label">Transmission</label>
                <input type="text" class="form-control" id="transmission" name="transmission" required>
            </div>

            <div class="mb-3">
                <label for="fuel_type" class="form-label">Fuel type</label>
                <input type="text" class="form-control" id="fuel_type" name="fuel_type" required>
            </div>

            {{-- <div class="mb-3">
                <label for="engine_capacity" class="form-label">Engine capacity</label>
                <input type="number" class="form-control" id="engine_capacity" name="engine_capacity" required>
            </div> --}}

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>



            <div class="mb-3">
                <label for="condition" class="form-label">Condition</label>
                <input type="text" class="form-control" id="condition" name="condition" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Ad</button>
        </form>
    </div>
@endsection
