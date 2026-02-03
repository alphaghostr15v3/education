@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Leadership & Team</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about') }}">About</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Leadership</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">The Minds Behind EduPlatform</h2>
        <p class="text-muted">Our leadership team brings decades of experience in education, technology, and business development.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4">
                <img src="https://via.placeholder.com/150?text=CEO" class="rounded-circle mx-auto mb-4" width="120" height="120">
                <h5 class="fw-bold mb-1">Jane Doe</h5>
                <p class="text-primary small mb-3">CEO & Founder</p>
                <p class="small text-muted">A visionary leader with a passion for transformative education technology.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4">
                <img src="https://via.placeholder.com/150?text=CTO" class="rounded-circle mx-auto mb-4" width="120" height="120">
                <h5 class="fw-bold mb-1">John Smith</h5>
                <p class="text-primary small mb-3">Chief Technology Officer</p>
                <p class="small text-muted">Architecting the future of online learning with scalable modern tech stacks.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4">
                <img src="https://via.placeholder.com/150?text=COO" class="rounded-circle mx-auto mb-4" width="120" height="120">
                <h5 class="fw-bold mb-1">Alex Rivera</h5>
                <p class="text-primary small mb-3">Chief Operations Officer</p>
                <p class="small text-muted">Ensuring operational excellence and student satisfaction across the globe.</p>
            </div>
        </div>
    </div>

    <div class="mt-5 p-5 bg-light rounded-4 border">
        <h4 class="fw-bold mb-4">Annual Team Report</h4>
        <p class="text-muted mb-4">In 2024, our team expanded by 40%, allowing us to double our course production rate while maintaining a 98% student satisfaction score.</p>
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">50+</h2>
                <small class="fw-bold text-muted">Staff Members</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">12</h2>
                <small class="fw-bold text-muted">Countries Represented</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">4.9/5</h2>
                <small class="fw-bold text-muted">Instructor Rating</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">24/7</h2>
                <small class="fw-bold text-muted">Student Support</small>
            </div>
        </div>
    </div>
</div>
@endsection
