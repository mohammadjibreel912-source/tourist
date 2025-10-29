<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Explore360&deg; Jordan')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Explore360&deg;<span>Jordan</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav">
                <span class="oi oi-menu"></span> Menu
            </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
        <li class="nav-item"><a href="{{ route('destination') }}" class="nav-link">Destination</a></li>
        <li class="nav-item"><a href="{{ route('hotel') }}" class="nav-link">Hotel</a></li>
        <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>

        @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
        @endauth
    </ul>
</div>

        </div>
    </nav>
    <!-- END nav -->
