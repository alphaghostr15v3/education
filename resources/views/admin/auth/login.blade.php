@extends('layouts.admin_auth')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="fw-bold mb-0">Admin Access</h4>
        <p class="text-muted small">Please sign in to continue</p>
    </div>

    <div class="card-body p-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label small fw-bold">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="admin@example.com">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-bold">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary fw-bold py-2">
                    {{ __('Login to Dashboard') }}
                </button>
            </div>
            
            <div class="text-center mt-3">
                <a class="btn btn-link btn-sm text-decoration-none" href="{{ route('home') }}">
                    <i class="bi bi-arrow-left me-1"></i> Back to Website
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
