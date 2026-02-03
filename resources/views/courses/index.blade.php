@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-2 text-center">
        <h1 class="display-5 fw-bold mb-3">Course Catalog</h1>
        <p class="lead text-muted">Explore our extensive library of expert-led courses.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm sticky-top" style="top: 2rem;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Categories</h5>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('courses.index') }}" class="list-group-item list-group-item-action border-0 px-0 {{ !request('category') ? 'text-primary fw-bold' : '' }}">
                            All Courses
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('courses.index', ['category' => $category->slug]) }}" 
                               class="list-group-item list-group-item-action border-0 px-0 {{ request('category') == $category->slug ? 'text-primary fw-bold' : '' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Course List -->
        <div class="col-lg-9">
            <div class="row g-4">
                @forelse($courses as $course)
                    <div class="col-md-6 col-xl-4">
                        <div class="card border-0 shadow-sm h-100 hover-lift transition">
                            <div class="position-relative">
                                <img src="https://via.placeholder.com/400x225?text={{ urlencode($course->title) }}" class="card-img-top" alt="{{ $course->title }}">
                                <span class="badge bg-primary position-absolute top-0 end-0 m-3 shadow-sm">{{ $course->category->name }}</span>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <h5 class="card-title fw-bold mb-2">{{ $course->title }}</h5>
                                <p class="card-text text-muted small mb-4 flex-grow-1">{{ Str::limit($course->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="fw-bold fs-5">${{ number_format($course->price, 2) }}</span>
                                    <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-outline-primary shadow-sm">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">No courses found matching your criteria.</h4>
                    </div>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $courses->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.15)!important;
    }
    .transition {
        transition: all 0.3s ease;
    }
</style>
@endsection
