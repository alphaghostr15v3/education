@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Our Partners</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about') }}">About</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Partners</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Collaborating for Excellence</h2>
        <p class="text-muted">We partner with global leaders in technology and education to provide our students with the best opportunities.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <img src="https://logo.clearbit.com/google.com" class="img-fluid mx-auto mb-0" alt="Google" style="max-height: 40px; filter: grayscale(100%);">
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <img src="https://logo.clearbit.com/microsoft.com" class="img-fluid mx-auto mb-0" alt="Microsoft" style="max-height: 40px; filter: grayscale(100%);">
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <img src="https://logo.clearbit.com/amazon.com" class="img-fluid mx-auto mb-0" alt="Amazon" style="max-height: 40px; filter: grayscale(100%);">
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <img src="https://logo.clearbit.com/adobe.com" class="img-fluid mx-auto mb-0" alt="Adobe" style="max-height: 40px; filter: grayscale(100%);">
            </div>
        </div>
    </div>

    <div class="mt-5 p-5 bg-soft rounded-4 text-center">
        <h3 class="fw-bold mb-3">Interested in partnering with us?</h3>
        <p class="text-muted mx-auto mb-4" style="max-width: 600px;">Join our mission to democratize education. We are always looking for organizations that share our values and commitment to excellence.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary px-5">Get In Touch</a>
    </div>
</div>
@endsection
