@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-3 fw-bold text-dark">About Our Mission</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">We are dedicated to bridging the gap between talent and opportunity through world-class online education.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row align-items-center py-5">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <img src="https://via.placeholder.com/600x400?text=Our+Story" alt="Our Story" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-lg-6 ps-lg-5">
            <h2 class="fw-bold mb-4">Our Journey</h2>
            <p class="text-muted mb-4 fs-5">Founded in 2024, our platform was built on the belief that quality education should be accessible to everyone, regardless of their location or background.</p>
            <p class="text-muted mb-5 fs-5">Today, we serve thousands of students worldwide, providing them with the tools and knowledge they need to succeed in the digital age.</p>
            <div class="row g-4 text-center">
                <div class="col-sm-4">
                    <h3 class="fw-bold text-primary mb-0">2024</h3>
                    <small class="text-muted fw-bold">Founded</small>
                </div>
                <div class="col-sm-4">
                    <h3 class="fw-bold text-primary mb-0">10k+</h3>
                    <small class="text-muted fw-bold">Students</small>
                </div>
                <div class="col-sm-4">
                    <h3 class="fw-bold text-primary mb-0">100+</h3>
                    <small class="text-muted fw-bold">Courses</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-primary text-white py-5">
    <div class="container text-center py-5">
        <h2 class="fw-bold mb-4">Core Values</h2>
        <div class="row g-5 mt-2">
            <div class="col-md-4">
                <i class="bi bi-lightning-charge fs-1 mb-3"></i>
                <h5 class="fw-bold">Innovation</h5>
                <p class="opacity-75">Pushing boundaries in teaching and learning methods.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-people fs-1 mb-3"></i>
                <h5 class="fw-bold">Community</h5>
                <p class="opacity-75">Building a supportive network of lifelong learners.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-shield-check fs-1 mb-3"></i>
                <h5 class="fw-bold">Quality</h5>
                <p class="opacity-75">Ensuring every course meets rigorous academic standards.</p>
            </div>
        </div>
    </div>
</div>
@endsection
