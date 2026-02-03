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
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift transition">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=600&auto=format&fit=crop" class="h-100 w-100" alt="Technology" style="object-fit: cover; min-height: 200px;">
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body p-4">
                            <h4 class="fw-bold">Technology Institute</h4>
                            <p class="text-muted">Focusing on software engineering, data science, and cybersecurity certifications.</p>
                            <ul class="list-unstyled small mb-4">
                                <li class="mb-2"><i class="bi bi-check2 text-primary me-2"></i>Full-Stack Development</li>
                                <li class="mb-2"><i class="bi bi-check2 text-primary me-2"></i>AI & Machine Learning</li>
                                <li><i class="bi bi-check2 text-primary me-2"></i>Cloud Architecture</li>
                            </ul>
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-primary btn-sm">View Programs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift transition">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600&auto=format&fit=crop" class="h-100 w-100" alt="Business" style="object-fit: cover; min-height: 200px;">
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body p-4">
                            <h4 class="fw-bold">Business Institute</h4>
                            <p class="text-muted">Empowering future leaders with management, finance, and entrepreneurship skills.</p>
                            <ul class="list-unstyled small mb-4">
                                <li class="mb-2"><i class="bi bi-check2 text-secondary me-2"></i>Strategic Management</li>
                                <li class="mb-2"><i class="bi bi-check2 text-secondary me-2"></i>Digital Marketing</li>
                                <li><i class="bi bi-check2 text-secondary me-2"></i>Financial Analysis</li>
                            </ul>
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm">View Programs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
