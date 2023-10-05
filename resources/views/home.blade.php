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

    </head>

    <body>
        <div class="col-md-12 d-flex justify-content-center align-items-center">
            <div class="form-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-card">
                            <div class="card-header">
                                <h1> Find Your Perfect Car</h1>
                            </div>

                            <div class="card-body">
                                <form>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="area" class="form-label">Area</label>
                                        <select class="form-select" id="area" name="area">
                                            <option value="district2">Any</option>
                                            <option value="district1">Ampara</option>
                                            <option value="district2">Anuradhapura</option>
                                            <option value="district1">Badulla</option>
                                            <option value="district2">Batticaloa</option>
                                            <option value="district1">Colombo</option>
                                            <option value="district2">Galle</option>
                                            <option value="district1">Gampaha </option>
                                            <option value="district2">Hambantota</option>
                                            <option value="district1">Jaffna</option>
                                            <option value="district2">Kalutara</option>
                                            <option value="district1">Kandy</option>
                                            <option value="district2">Kegalle</option>
                                            <option value="district1">Kilinochchi</option>
                                            <option value="district2">Kurunegala</option>
                                            <option value="district1">Mannar</option>
                                            <option value="district2">Matale</option>
                                            <option value="district1">Matara</option>
                                            <option value="district2">Monaragala</option>
                                            <option value="district1">Mullaitivu</option>
                                            <option value="district2">Nuwara Eliya</option>
                                            <option value="district1">Polonnaruwa</option>
                                            <option value="district2">Puttalam</option>
                                            <option value="district1">Ratnapura</option>
                                            <option value="district2">Trincomalee</option>
                                            <option value="district1">Vavuniya</option>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="distance" class="form-label">Distance</label>
                                        <select class="form-select" id="distance" name="distance">
                                            <option value="national" selected>National</option>
                                            <option value="local">Within 1km</option>
                                            <option value="local">Within 5km</option>
                                            <option value="local">Within 10km</option>
                                            <option value="local">Within 20km</option>
                                            <option value="local">Within 50km</option>
                                            <option value="local">Within 100km</option>
                                            <option value="local">Within 200km</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="make" class="form-label">Make</label>
                                        <select class="form-select" id="make" name="make">
                                            <option value="make1">All</option>
                                            <option value="brand1">Toyota</option>
                                            <option value="brand2">Nissan</option>
                                            <option value="brand3">Honda</option>
                                            <option value="brand4">Mazda</option>
                                            <option value="brand5">Mitsubishi</option>
                                            <option value="brand6">Suzuki</option>
                                            <option value="brand7">Isuzu</option>
                                            <option value="brand8">Daihatsu</option>
                                            <option value="brand9">Subaru</option>
                                            <option value="brand10">BMW</option>
                                            <option value="brand11">Mercedes-Benz</option>
                                            <option value="brand12">Audi</option>
                                            <option value="brand13">Volkswagen</option>
                                            <option value="brand14">Peugeot</option>
                                            <option value="brand15">Mini</option>
                                            <option value="brand16">Lexus</option>
                                            <option value="brand17">Land Rover</option>
                                            <option value="brand18">Renault</option>
                                            <option value="brand19">Jeep</option>
                                            <option value="brand20">Ford</option>
                                            <option value="brand21">Jaguar</option>
                                            <option value="brand22">Volvo</option>
                                            <option value="brand23">Porsche</option>
                                            <option value="brand24">Chevrolet</option>
                                            <option value="brand25">Kia</option>
                                            <option value="brand26">Hyundai</option>
                                            <option value="brand27">Tata</option>
                                            <option value="brand28">Mahindra</option>
                                            <option value="brand29">Ssangyong</option>
                                            <option value="brand30">Chery</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="min_price" class="form-label">Min Price(LKR)</label>
                                        <input type="number" class="form-control" id="min_price" name="min_price">
                                    </div>

                                    <div class="mb-3">
                                        <label for="max_price" class="form-label">Max Price(LKR)</label>
                                        <input type="number" class="form-control" id="max_price" name="max_price">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center align-items-center">
            <div class="brand-card">
                <div class="brand-card-header">
                    <h1>Browse by Brand</h1>
                </div>
                <div class="card-body">
                    <!-- Brand Images -->
                    <div class="row">
                        <div class="col-md-3 brand-container">
                            <a href="#">
                                <img src="images/toyota-logos-brands-logotypes-0.png" alt="Brand 3"
                                    class="img-fluid mb-2"></a>
                        </div>
                        <div class="col-md-3 brand-container">
                            <a href="#">
                                <img src="images/nissan-6-logo-png-transparent.png" alt="Brand 1"
                                    class="img-fluid mb-2"></a>
                        </div>
                        <div class="col-md-3 brand-container">
                            <a href="#"><img src="images/1280px-Suzuki_logo_2.svg.png" alt="Brand 2"
                                    class="img-fluid mb-2"></a>
                        </div>
                    </div>


                    <!-- Show All Brands Button -->
                    <div class="text-center">
                        <button class="btn btn-primary mt-3"> + Show All Brands</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center align-items-center">
            <div class="advert-container">
                <div class="advert-content">
                    <h1>Place Your Advert Here</h1>
                    <p>Get the price you deserve</p>

                    <!-- Input Boxes for Registration and Mileage -->
                    <div class="mb-3">
                        <label for="registration" class="form-label">Registration</label>
                        <input type="text" class="form-control" id="registration" name="registration">
                    </div>
                    <div class="mb-3">
                        <label for="mileage" class="form-label">Mileage</label>
                        <input type="number" class="form-control" id="mileage" name="mileage">
                    </div>

                    <!-- Create Advert Button -->
                    <button type="submit" class="btn btn-primary">Create Your Advert</button>
                </div>

                <!-- Image on the Right -->
                <div class="advert-image">
                    <img src="images/photo-1622151834677-70f982c9adef.jpeg" alt="Advert Image">

                </div>
            </div>
        </div>
        </div>
        </div>


    </body>
    <footer class="footer  py-4 footer-extra">
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
