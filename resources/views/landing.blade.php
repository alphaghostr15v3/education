@extends('layouts.app')

@section('content')
<div class="hero-centered">
    <!-- Floating Elements -->
    <div class="float-element d-none d-lg-block" style="top: 20%; left: 5%;">
        <img src="https://via.placeholder.com/200x250?text=Campus+Life" class="img-screenshot shadow-lg" alt="EduBlink">
    </div>
    <div class="float-element d-none d-lg-block" style="top: 10%; right: 10%;">
        <div class="bg-white p-4 rounded-4 shadow-lg text-center" style="width: 150px;">
            <div class="text-primary fs-1 mb-2">●</div>
            <div class="fw-bold">Class Done</div>
        </div>
    </div>
    <div class="float-element d-none d-lg-block" style="bottom: 15%; left: 15%;">
         <img src="https://via.placeholder.com/300x200?text=Courses+UI" class="img-screenshot shadow-lg" alt="EduBlink">
    </div>
    <div class="float-element d-none d-lg-block" style="bottom: 10%; right: 5%;">
         <img src="https://via.placeholder.com/350x250?text=Dashboard+UI" class="img-screenshot shadow-lg" alt="EduBlink">
    </div>

    <div class="container position-relative z-index-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <span class="hero-subtitle">Empower Your Future with Online Learning</span>
                <h1 class="hero-title">EduBlink - Your Global Learning Partner</h1>
                <div class="mt-5">
                    <a href="{{ route('courses.index') }}" class="btn btn-primary btn-lg px-5 py-3">Explore Our Courses <i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5 text-center">
    <div class="mb-5">
        <h2 class="fw-bold display-6">Top Categories</h2>
        <div class="bg-primary mx-auto my-3" style="width: 50px; height: 3px;"></div>
    </div>
    <div class="row g-4 mt-4">
        @php
            $displayCategories = \App\Models\Category::all();
        @endphp
        @foreach($displayCategories as $category)
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm p-4 hover-lift">
                    <div class="text-primary fs-1 mb-3">
                        <i class="bi {{ $category->icon ?: 'bi-journal-code' }}"></i>
                    </div>
                    <h5 class="fw-bold">{{ $category->name }}</h5>
                    <p class="text-muted small">Access high-quality material.</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Features CTA -->
<div class="bg-soft py-5 border-top border-bottom" style="background-color: var(--edu-bg-soft);">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h2 class="fw-bold">Ready to Start Your Learning Journey?</h2>
                <p class="text-muted">Join thousands of students and transform your career today.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Join For Free</a>
            </div>
        </div>
    </div>
</div>
@endsection
