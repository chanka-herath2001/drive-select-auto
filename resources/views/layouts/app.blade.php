<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DriveSelect Auto</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('\css\app.css') }}">


    <style>
        body {}



        .card-header {
            background-color: #0E8388;
        }

        .card-header h1 {

            color: #CBE4DE;

            text-align: center;

            padding: 10px;

            border-radius: 5px 5px 0 0;
        }

        .navbar-nav .nav-link {
            margin-right: 50px;
            font-weight: bold;
            color: #0E8388;
            font-size: 15px;

        }

        .nav-link a:hover {
            color: #CBE4DE;
        }

        .main-nav-bar {
            background-color: #2C3333;

        }


        #app {
            background-color: #fff;
        }

        .form-card {
            background-color: #2C3333;



            border-radius: 10px;

            padding: 30px;

            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

            width: 70%;



            margin-top: 10px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .form-card label {
            color: #CBE4DE;
        }

        .form-card button {
            background-color: #0E8388;
            color: #CBE4DE;
            align-items: center;
        }

        .form-container {
            background-image: url('images/905980.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 500px;
            width: 100%;

            position: relative;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-left: 0;
            margin-right: auto;

        }

        .brand-card {


            border: 2px solid #000000;

            border-radius: 10px;

            padding: 30px;

            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.1);

            width: 80%;



            margin-top: 30px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;


        }

        .brand-container {
            margin-right: 5%;
            margin-left: 35px;
            margin-bottom: 20px;
        }

        .brand-card-header {

            color: #2C3333;

            text-align: center;

            padding: 10px;

            border-radius: 5px 5px 0 0;

        }

        .brand-card h1 {
            font-size: 24px;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }

        .brand-card .row {
            margin-top: 20px;

        }

        .brand-card img {
            max-width: 100%;

        }

        .brand-card .btn {
            width: 30%;
            background-color: #0E8388;
            color: #CBE4DE;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div id="app ">
        <div class="main-nav-bar">
            <nav class="navbar navbar-expand-md navbar-light  shadow-sm main-nav-bar">
                <div class="container ">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="images/logo-no-background.png" alt="DriveSelect Auto" width="160px" height="40px">

                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Centered Navbar Items -->
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Used Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">New Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sell Your Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">

                            @auth
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Administration
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.index') }}">
                                            Users
                                        </a>
                                    </div>
                                </li>
                            @endauth


                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
