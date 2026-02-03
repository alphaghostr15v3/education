@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Institutes & Programs</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">Specialized training institutes and comprehensive academic programs designed for the modern workforce.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Technology Institute -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift transition">
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=800&auto=format&fit=crop" class="card-img-top" alt="Technology" style="height: 300px; object-fit: cover;">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-3">Technology Institute</h3>
                    <p class="text-muted mb-4">Focusing on software engineering, data science, and cybersecurity certifications. Prepare for the digital future with hands-on labs and expert-led instruction.</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill text-primary me-2"></i>Full-Stack Development</li>
                        <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill text-primary me-2"></i>AI & Machine Learning</li>
                        <li class="d-flex align-items-center"><i class="bi bi-check-circle-fill text-primary me-2"></i>Cloud Architecture</li>
                    </ul>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary px-4">View Tech Programs</a>
                </div>
            </div>
        </div>

        <!-- Business Institute -->
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift transition">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" class="card-img-top" alt="Business" style="height: 300px; object-fit: cover;">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-3">Business Institute</h3>
                    <p class="text-muted mb-4">Empowering future leaders with management, finance, and entrepreneurship skills. Build the strategic mindset required for today's competitive markets.</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill text-secondary me-2"></i>Strategic Management</li>
                        <li class="mb-2 d-flex align-items-center"><i class="bi bi-check-circle-fill text-secondary me-2"></i>Digital Marketing</li>
                        <li class="d-flex align-items-center"><i class="bi bi-check-circle-fill text-secondary me-2"></i>Financial Analysis</li>
                    </ul>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary px-4">View Business Programs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
