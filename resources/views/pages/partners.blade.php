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
        <h2 class="fw-bold">Collaborating for Vocational Excellence</h2>
        <p class="text-muted">We partner with global leaders in industry and technology to bridge the gap between youth training and employability.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Vocational & Industry Partners -->
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <i class="bi bi-gear-wide-connected fs-1 text-primary mb-3"></i>
                <h6 class="fw-bold">Industry Sector Councils</h6>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <i class="bi bi-building fs-1 text-primary mb-3"></i>
                <h6 class="fw-bold">Manufacturing Leaders</h6>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <i class="bi bi-tools fs-1 text-primary mb-3"></i>
                <h6 class="fw-bold">VET Institutions</h6>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 py-5 hover-lift">
                <i class="bi bi-person-check fs-1 text-primary mb-3"></i>
                <h6 class="fw-bold">Global Certifiers</h6>
            </div>
        </div>
    </div>

    <div class="mt-5 p-5 bg-soft rounded-4 text-center">
        <h3 class="fw-bold mb-3">Invite for Partnership</h3>
        <p class="text-muted mx-auto mb-4" style="max-width: 600px;">Join us in our mission to create a future-ready workforce. We invite industry leaders and training providers to collaborate on large-scale vocational impact.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary px-5">Get In Touch</a>
    </div>
</div>
@endsection
