@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Mission & Vision</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about') }}">About</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Mission & Vision</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4">Our Mission</h2>
            <p class="lead text-muted mb-4">To empower individuals worldwide through accessible, high-quality education that transforms lives and communities.</p>
            <p class="text-secondary mb-4">We believe that learning is a lifelong journey and that everyone deserves the chance to excel, regardless of their background or current circumstances.</p>
            <ul class="list-unstyled">
                <li class="mb-3 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill text-primary me-3 fs-5"></i>
                    <span>Providing world-class learning resources</span>
                </li>
                <li class="mb-3 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill text-primary me-3 fs-5"></i>
                    <span>Fostering a global community of experts and learners</span>
                </li>
                <li class="mb-3 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill text-primary me-3 fs-5"></i>
                    <span>Leveraging technology to lower barriers to entry</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-6">
            <div class="p-5 bg-soft rounded-4 shadow-sm border border-white" style="background: linear-gradient(135deg, #1ab69d0a 0%, #ffffff 100%);">
                <h2 class="fw-bold mb-4">Our Vision</h2>
                <p class="lead text-muted mb-4">To be the world's most trusted partner in education, recognized for innovation, inclusivity, and excellence.</p>
                <p class="text-secondary mb-0">We envision a future where skills gap is eliminated, and every learner has the opportunity to achieve their professional and personal potential through a global network of knowledge sharing.</p>
            </div>
        </div>
    </div>
</div>
@endsection
