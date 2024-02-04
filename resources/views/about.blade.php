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

        <link rel="stylesheet" href="{{ asset('css/_variables.scss') }}">
    </head>

    <body>
        <div class="container">
            <h2 class="faq-title">Frequently Asked Questions</h2>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed accordion-header" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            What is Driveselect Auto's mission?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse "
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Driveselect Auto is committed to providing a seamless and convenient
                            platform for users to browse, select, and purchase both new and used vehicles. Our mission is to
                            simplify the car-buying process and connect buyers with trusted dealers.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed accordion-header" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            How does Driveselect Auto work?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Driveselect Auto allows users to browse a wide range of new and used
                            vehicles. Users can contact dealers directly to inquire about a vehicle, make a purchase, or
                            even
                            bid on select vehicles through our bidding feature.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed accordion-header" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            What types of vehicles are available on Driveselect Auto?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Driveselect Auto offers a diverse inventory, including new and used
                            cars,
                            trucks, SUVs, and more. Our platform provides a comprehensive selection to cater to various
                            preferences and needs.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed accordion-header" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseThree">
                            Can I trust the dealers on Driveselect Auto?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, we carefully vet and partner with reputable dealerships to ensure a trustworthy and
                            reliable
                            buying experience. Customer reviews and ratings are also available to help users make informed
                            decisions.
                        </div>
                    </div>
                </div>
            </div>

            <section class="contact-us-section">
                <h2 class="contact-us-title">Contact Us</h2>
                <p class="contact-us-paragraph">If you have any questions or need assistance, feel free to reach out to our
                    team.</p>

                <!-- Include a simple contact form or contact information -->
                <div class="contact-form">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="contact-us-button">Submit</button>
                    </form>
                </div>
            </section>

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
