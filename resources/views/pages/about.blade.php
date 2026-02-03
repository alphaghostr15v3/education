@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-3 fw-bold text-dark">About YPSVEF</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">Industry-led vocational skills for a green, modern India. We build future-ready capabilities that lead to real employment.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row align-items-center py-5">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1000&auto=format&fit=crop" alt="Our Story" class="img-fluid rounded-4 shadow-lg">
        </div>
        <div class="col-lg-6 ps-lg-5">
            <h2 class="fw-bold mb-4">Our Mission</h2>
            <p class="text-muted mb-4 fs-5">Yadupati Singhania Vocational Education Foundation (YPSVEF) is a not-for-profit institution building future-ready vocational skills that lead to real jobs, sustainable livelihoods, and industry relevance.</p>
            <p class="text-muted mb-5 fs-5">We work at the intersection of industry needs, youth aspirations, and national priorities—delivering high-quality, low-waste, employability-focused vocational education.</p>
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

<div class="container mb-5">
    <div class="row g-4 pb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                <div class="mb-3 text-primary">
                    <i class="bi bi-bullseye fs-1"></i>
                </div>
                <h5 class="fw-bold">Mission & Vision</h5>
                <p class="small text-muted mb-4">Our core purpose and aspirations for the future of education.</p>
                <a href="{{ route('about.mission') }}" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                <div class="mb-3 text-primary">
                    <i class="bi bi-book fs-1"></i>
                </div>
                <h5 class="fw-bold">Our Story</h5>
                <p class="small text-muted mb-4">The journey of how we became a leading learning platform.</p>
                <a href="{{ route('about.story') }}" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                <div class="mb-3 text-primary">
                    <i class="bi bi-person-workspace fs-1"></i>
                </div>
                <h5 class="fw-bold">Leadership & Team</h5>
                <p class="small text-muted mb-4">Meet the visionaries and experts behind the scenes.</p>
                <a href="{{ route('about.leadership') }}" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                <div class="mb-3 text-primary">
                    <i class="bi bi-hand-thumbs-up fs-1"></i>
                </div>
                <h5 class="fw-bold">Our Partners</h5>
                <p class="small text-muted mb-4">Collaborating with world-class organizations to provide value.</p>
                <a href="{{ route('about.partners') }}" class="btn btn-outline-primary btn-sm mt-auto">Learn More</a>
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
