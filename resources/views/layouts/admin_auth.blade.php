<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 15px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .card-header {
            background: transparent;
            border-bottom: none;
            padding-top: 30px;
            text-align: center;
        }
        .brand-logo {
            height: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="text-center">
             <a href="{{ url('/') }}">
                <img src="{{ asset('images/ysvef-logo.png') }}" alt="YSVEF Logo" class="brand-logo">
            </a>
        </div>
        
        @yield('content')
        
        <div class="text-center mt-4">
            <p class="text-muted small">&copy; {{ date('Y') }} {{ config('app.name') }}. Admin Panel.</p>
        </div>
    </div>
</body>
</html>
