<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Admin Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    @yield('styles')
</head>
<body>
    <div id="admin-wrapper">
        <!-- Sidebar -->
        <nav id="admin-sidebar" class="shadow">
            <div class="sidebar-header border-bottom border-secondary border-opacity-25">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    <img src="{{ asset('images/ysvef-logo.png') }}" alt="Logo" class="img-fluid bg-white rounded p-1" style="max-height: 50px;">
                    <span class="ms-2 fw-bold text-white small text-uppercase letter-spacing-1">Admin Panel</span>
                </a>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                </li>
                <li class="{{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.courses.index') }}"><i class="bi bi-journal-text"></i> Courses</a>
                </li>
                <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}"><i class="bi bi-tags"></i> Categories</a>
                </li>
                <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.blogs.index') }}"><i class="bi bi-newspaper"></i> Blog Posts</a>
                </li>
                <li class="{{ request()->routeIs('admin.newsletters.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.newsletters.index') }}"><i class="bi bi-mailbox"></i> Newsletters</a>
                </li>
                <li class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.events.index') }}"><i class="bi bi-calendar-event"></i> Events</a>
                </li>
                <li class="{{ request()->routeIs('admin.galleries.*') || request()->routeIs('admin.gallery-images.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.galleries.index') }}"><i class="bi bi-images"></i> Gallery</a>
                </li>
                <li class="{{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.videos.index') }}"><i class="bi bi-play-circle"></i> Videos</a>
                </li>
                <li class="{{ request()->routeIs('admin.hero-slides.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.hero-slides.index') }}"><i class="bi bi-image"></i> Hero Photos</a>
                </li>
                <li class="{{ request()->routeIs('admin.institutes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.institutes.index') }}"><i class="bi bi-building"></i> Institutes</a>
                </li>
                <li class="{{ request()->routeIs('admin.teams.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.teams.index') }}"><i class="bi bi-people"></i> Team Members</a>
                </li>
                <li class="{{ request()->routeIs('admin.stories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.stories.index') }}"><i class="bi bi-clock-history"></i> Our Story</a>
                </li>
                <li class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contacts.index') }}"><i class="bi bi-chat-left-text"></i> Messages</a>
                </li>
                <li class="{{ request()->routeIs('admin.case-studies.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.case-studies.index') }}"><i class="bi bi-briefcase"></i> Case Studies</a>
                </li>
                <li class="{{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.alumni.index') }}"><i class="bi bi-mortarboard"></i> Alumni Success</a>
                </li>
                <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}"><i class="bi bi-person-gear"></i> Users</a>
                </li>
            </ul>

            <div class="mt-auto p-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="admin-content">
            <nav id="admin-navbar" class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary d-lg-none">
                        <i class="bi bi-list"></i>
                    </button>
                    
                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><a class="dropdown-item" href="{{ url('/') }}"><i class="bi bi-house-door me-2"></i> Visit Website</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="admin-main-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#admin-sidebar').toggleClass('active');
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
