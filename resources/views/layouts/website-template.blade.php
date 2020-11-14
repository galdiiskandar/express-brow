<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('addressTitle')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <link href="{{ asset('website-assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom Style -->
    @yield('customStyle')
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">@yield('navTitle')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item {{ Request::routeIs('fontPage') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ Request::routeIs('produk') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('produk') }}">Product</a>
                </li>
                <li class="nav-item {{ Request::routeIs('promoPage') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('promoPage') }}">Promo</a>
                </li>
                <li class="nav-item {{ Request::routeIs('contactPage') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contactPage') }}">Contact</a>
                </li>
            </ul>

            @if (Auth::user())
                <a class="btn btn-success btn-sm ml-3" href="{{ route('barang.index') }}">
                    <i class="fa fa-sign-in"></i> Beranda
                </a>
            @else
                <a class="btn btn-success btn-sm ml-3" href="{{ route('login') }}">
                    <i class="fa fa-sign-in"></i> Login
                </a>
            @endif


        </div>
    </div>
</nav>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">@yield('siteHeading')</h1>
        <p class="lead text-muted mb-0">@yield('subTitle')</p>
    </div>
</section>
<div class="container">
    @yield('firstContainer')
</div>


<div class="container mt-3">
    @yield('secondContainer')
</div>


<div class="container mt-3 mb-4">
    @yield('thirdContainer')
</div>


<!-- Footer -->
<footer class="text-light">
    <div class="container">
        @yield('siteFooter')
    </div>
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
