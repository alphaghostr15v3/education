<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/ysvef-logo.png') }}" alt="YSVEF Logo" style="height: 100px; width: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->routeIs('home') ? 'active text-primary' : 'text-dark' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-bold dropdown-toggle {{ request()->routeIs('about*') ? 'active text-primary' : 'text-dark' }}" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About Us
                            </a>
                            <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="aboutDropdown">
                                <li><a class="dropdown-item" href="{{ route('about') }}">Overview</a></li>
                                <li><a class="dropdown-item" href="{{ route('about.mission') }}">Mission & Vision</a></li>
                                <li><a class="dropdown-item" href="{{ route('about.story') }}">Our Story</a></li>
                                <li><a class="dropdown-item" href="{{ route('about.leadership') }}">Leadership</a></li>
                                <li><a class="dropdown-item" href="{{ route('about.partners') }}">Partnerships</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->routeIs('institutes') ? 'active text-primary' : 'text-dark' }}" href="{{ route('institutes') }}">Institutes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->routeIs('courses.*') ? 'active text-primary' : 'text-dark' }}" href="{{ route('courses.index') }}">Courses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->routeIs('events') ? 'active text-primary' : 'text-dark' }}" href="{{ route('events') }}">Events</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link fw-bold dropdown-toggle {{ request()->routeIs('gallery') || request()->routeIs('videos.*') ? 'active text-primary' : 'text-dark' }}" href="#" id="mediaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Media
                            </a>
                            <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="mediaDropdown">
                                <li><a class="dropdown-item" href="{{ route('gallery') }}">Gallery</a></li>
                                <li><a class="dropdown-item" href="{{ route('videos.index') }}">Video</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link fw-bold dropdown-toggle {{ request()->routeIs('blog') || request()->routeIs('faq') || request()->routeIs('pricing') || request()->routeIs('team') ? 'active text-primary' : 'text-dark' }}" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="resourcesDropdown">
                                <li><a class="dropdown-item" href="{{ route('blog') }}">News & Blog</a></li>
                                <li><a class="dropdown-item" href="{{ route('team') }}">Our Team</a></li>
                                <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                                <li><a class="dropdown-item" href="{{ route('newsletters') }}">Newsletters</a></li>
                                <li><a class="dropdown-item" href="{{ route('pricing') }}">Pricing</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->routeIs('contact') ? 'active text-primary' : 'text-dark' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-3">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

@else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->isAdmin())
                                        <a class="dropdown-item fw-bold text-primary" href="{{ route('admin.dashboard') }}">
                                            Admin Dashboard
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-dark text-white py-5 mt-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="mb-4">
                            <img src="{{ asset('images/YPSVEFFOOTER.png') }}" alt="YSVEF Logo" style="height: 80px; width: auto;">
                        </div>
                        <p class="text-muted small">Building future-ready vocational skills for a green, modern India. A not-for-profit initiative dedicated to industry-aligned excellence.</p>
                        <div class="d-flex gap-3 mt-4">
                            <a href="#" class="text-white opacity-75"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-white opacity-75"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="text-white opacity-75"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-white opacity-75"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <h6 class="fw-bold mb-4">Quick Links</h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><a href="{{ route('about') }}" class="text-muted text-decoration-none hover-white">About Us</a></li>
                            <li class="mb-2"><a href="{{ route('courses.index') }}" class="text-muted text-decoration-none hover-white">Vocational Courses</a></li>
                            <li class="mb-2"><a href="{{ route('institutes') }}" class="text-muted text-decoration-none hover-white">Institutes</a></li>
                            <li><a href="{{ route('contact') }}" class="text-muted text-decoration-none hover-white">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h6 class="fw-bold mb-4">Resources</h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><a href="{{ route('gallery') }}" class="text-muted text-decoration-none hover-white">Gallery</a></li>
                            <li class="mb-2"><a href="{{ route('blog') }}" class="text-muted text-decoration-none hover-white">News & Blog</a></li>
                            <li class="mb-2"><a href="{{ route('faq') }}" class="text-muted text-decoration-none hover-white">FAQ</a></li>
                            <li><a href="{{ route('about.partners') }}" class="text-muted text-decoration-none hover-white">Partnerships</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h6 class="fw-bold mb-4">Contact Info</h6>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-2"></i> J.K. House, 7, Council House Street, Kolkata - 700001</p>
                        <p class="text-muted small mb-2"><i class="bi bi-envelope me-2"></i> info@ypsvef.org</p>
                        <p class="text-muted small"><i class="bi bi-telephone me-2"></i> +91 33 2248 8908</p>
                    </div>
                </div>
                <hr class="my-5 opacity-25">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="small text-muted mb-0">&copy; {{ date('Y') }} Yadupati Singhania Vocational Education Foundation. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                        <a href="#" class="text-muted small text-decoration-none me-3">Privacy Policy</a>
                        <a href="#" class="text-muted small text-decoration-none">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <style>
        .hover-white:hover { color: #fff !important; }
        footer .text-muted { color: #b0b0b0 !important; }
    </style>
    <div class="floating-contact-buttons">
        <a href="https://wa.me/911234567890" target="_blank" class="floating-btn btn-whatsapp" title="Chat on WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
        <a href="tel:+913322488908" class="floating-btn btn-call" title="Call Us">
            <i class="bi bi-telephone-fill"></i>
        </a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>
</html>
