<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="GainsSchool">
    <meta name="author" content="GainsSchool">
    <title>@yield('title') </title>
    <link rel="icon" type="image/png" href="images/fav.png">
    <link href="../../../fonts.googleapis.com/cssccc8.css?family=Roboto:400,700,500" rel='stylesheet'>
    <link href="{{ asset('assets/frontend/vendor/unicons-2.0.1/css/unicons.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/frontend/css/vertical-responsive-menu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/night-mode.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/semantic/semantic.min.css') }}">
</head>
<body>
    @yield('content')
<script src="{{ asset('assets/frontendjs/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontendvendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontendvendor/OwlCarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/frontendvendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('assets/frontendjs/custom.js') }}"></script>
    <script src="{{ asset('assets/frontendjs/night-mode.js') }}"></script>
</body>
</html>
