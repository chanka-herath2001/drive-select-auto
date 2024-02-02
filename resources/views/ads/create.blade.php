@extends('layouts.app')

@section('content')

    <body>
        <div class="container">
            <div class="used-car">
                <h1>Sell Your Vehicles</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-post-ad">

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
                <label for="capacity" class="form-label">Engine capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div> --}}

                    <div class="mb-3">
                        {{-- <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required> --}}
                        <label for="location" class="form-label">Location</label>
                        <select class="form-select" id="location" name="location" required>

                            <option value="ampara">Ampara</option>
                            <option value="anuradhapura">Anuradhapura</option>
                            <option value="badulla">Badulla</option>
                            <option value="batticaloa">Batticaloa</option>
                            <option value="colombo">Colombo</option>
                            <option value="galle">Galle</option>
                            <option value="gampaha">Gampaha </option>
                            <option value="hambantota">Hambantota</option>
                            <option value="jaffna">Jaffna</option>
                            <option value="kalutara">Kalutara</option>
                            <option value="kandy">Kandy</option>
                            <option value="kegalle">Kegalle</option>
                            <option value="kilinochchi">Kilinochchi</option>
                            <option value="kurunegala">Kurunegala</option>
                            <option value="mannar">Mannar</option>
                            <option value="matale">Matale</option>
                            <option value="matara">Matara</option>
                            <option value="monaragla">Monaragala</option>
                            <option value="mullaitivu">Mullaitivu</option>
                            <option value="nuwaraeliya">Nuwara Eliya</option>
                            <option value="polonnaruwa">Polonnaruwa</option>
                            <option value="puttalam">Puttalam</option>
                            <option value="ratnapura">Ratnapura</option>
                            <option value="trincomalee">Trincomalee</option>
                            <option value="vavuniya">Vavuniya</option>
                        </select>
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
                        {{-- <input type="text" class="form-control" id="condition" name="condition" required> --}}
                        <select class="form-select" id="condition" name="condition" required>
                            <option value="new">New</option>
                            <option value="used">Used</option>
                        </select>
                    </div>
                    <div class="submit-button">
                        <button type="submit" class="btn btn-primary">Submit Ad</button>
                    </div>
                </form>
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
