<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Base') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}" defer></script>
    <script src="{{ mix('js/vendor.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/sidebar.js') }}" defer></script>
    {{-- @auth
    <script src="{{ mix('js/dropdown.js') }}" defer></script>
    @endauth --}}

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon -->

    <link rel="icon" href="{{ asset('logos/landing-logo-n.png') }}">
    @yield('css')

    @yield('header')
</head>

<body>
    <div id="app" class="app-container">
        <aside class="animate__animated animate__faster aside">
            <div class="top">
                <div class="logo">
                    <img src="{{ asset('logos/landing-logo-n.png') }}" alt="logo" />
                </div>
                <div class="close close-btn">
                    <a href="#">
                        <span class="material-icons"> close </span>
                    </a>
                </div>
            </div>

            <div class="sidebar">
                @guest
                <a href="#galery" class="active option-menu">
                    <span class="material-icons">photo_library</span>
                    <h3>Galery</h3>
                </a>
                <a href="#quotations" class="active option-menu">
                    <span class="material-icons">monetization_on</span>
                    <h3>Quotations</h3>
                </a>
                {{-- Fake button --}}
                <a href="#" class="option-menu d-none">
                    <span class="material-icons"></span>
                    <h3></h3>
                </a>
                @endguest
            </div>
        </aside>

        <!-- Main -->
        <main>
            <nav style="background: #13263C !important; box-shadow:none !important; border:none !important">
                <div class="navbar">
                    <div class="nav-left">
                        <div class="menu d-block d-md-none d-lg-none d-xl-none">
                            <a href="#">
                                <span class="material-icons menu-light"
                                    style="margin-top: 0.5rem !important">menu</span>
                            </a>
                        </div>
                        <div class="logo d-none d-md-block d-lg-block d-xl-block">
                            <img src="{{ asset('logos/landing-logo-b.png') }}" alt="logo" height="65" width="126" />
                        </div>
                        {{-- <div class="title">
                            <h1 class="mb-0">ERP</h1>
                        </div> --}}
                    </div>
                    <div class="nav-right d-none d-md-flex d-lg-flex d-xl-flex" style="padding-right: 5rem">
                        <div class="user">
                            <a href="#galery">
                                {{-- <span class="material-icons">person</span> --}}
                                <span class="fs-5">Galery</span>
                            </a>
                        </div>
                        <div class="user">
                            <a href="#quotations">
                                {{-- <span class="material-icons">person</span> --}}
                                <span class="fs-5">Quotations</span>
                            </a>
                        </div>
                        {{-- <div class="notifications">
                            <a href="#">
                                <span class="material-icons">notifications</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </nav>
            <div class="landing-hero">
                <div class="text-center mb-5">
                    <h1 class="hero-text text-white text-capitalize">Lorem ipsum dolor sit
                        <br />amet
                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                            <span id="">consectetur adipisicing</span>
                        </span>
                    </h1>
                    <div class="hero-button p-4">
                        <a href="#quotations" class="btn btn-quotes fs-5 mt-4" style="padding: 0.5rem 2rem;">See
                            Quotations</a>
                    </div>
                </div>
            </div>
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>

            @yield('content')
        </main>
        <!-- Main -->


        <!-- Footer  -->
        <footer class="landing-bg-dark" style="height:10rem">
            <div class="footer-item">
                <div class="footer-title mb-2">
                    <h5>GrassLanding &copy 2022</h5>
                </div>
            </div>
            <span class="footer-subtitle mb-2">All rights reserved.</span>
            <div class="icon-list">
                <a href="https://www.facebook.com/" target="_blank" class=""><img src="{{ asset('img/FB-L.svg') }}"
                        alt="facebook" height="25" width="25" /></a>
                <a href="https://www.youtube.com/" target="_blank" class=""><img src="{{ asset('img/YT-L.svg') }}"
                        alt="youtube" height="25" width="25" /></a>
                <a href="https://www.instagram.com/" target="_blank" class=""><img src="{{ asset('img/IG-L.svg') }}"
                        alt="instagram" height="25" width="25" /></a>
            </div>
        </footer>
        <!-- Footer  -->
    </div>

    <!-- Scripts -->
    @yield('scripts')
</body>

</html>