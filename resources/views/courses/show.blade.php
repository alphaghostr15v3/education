@extends('layouts.app')

@section('content')
<div class="bg-dark text-white py-5 mb-5 shadow-sm">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}" class="text-white-50">Courses</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ $course->category->name }}</li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold mb-3">{{ $course->title }}</h1>
                <p class="lead mb-4 opacity-75">{{ Str::limit($course->description, 200) }}</p>
                <div class="d-flex align-items-center gap-4">
                    <div>
                        <small class="text-white-50 d-block">Instructor</small>
                        <span class="fw-bold">{{ $course->instructor->name }}</span>
                    </div>
                    <div>
                        <small class="text-white-50 d-block">Category</small>
                        <span class="fw-bold">{{ $course->category->name }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <img src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : 'https://via.placeholder.com/800x450?text=' . urlencode($course->title) }}" class="card-img-top" alt="{{ $course->title }}">
                    <div class="card-body p-4">
                        <div class="h2 fw-bold mb-4">${{ number_format($course->price, 2) }}</div>
                        @if($isEnrolled)
                            <a href="{{ route('lessons.show', [$course->slug, $course->lessons->first()->slug ?? 'intro']) }}" class="btn btn-success btn-lg w-100 fw-bold py-3 shadow-sm">Go to Course</a>
                        @else
                            <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold py-3 shadow-sm">Enroll Now</button>
                            </form>
                        @endif
                        <p class="text-center text-muted small mt-3 mb-0">Full Lifetime Access • Completion Certificate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-8">
            <h3 class="fw-bold mb-4">Course Description</h3>
            <div class="fs-5 text-muted mb-5" style="white-space: pre-line;">
                {{ $course->description }}
            </div>

            <h3 class="fw-bold mb-4">Course Content</h3>
            <div class="accordion shadow-sm" id="courseContent">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            Lessons ({{ $course->lessons->count() }})
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body p-0">
                            <ul class="list-group list-group-flush">
                                @forelse($course->lessons as $lesson)
                                    <li class="list-group-item py-3 px-4 d-flex align-items-center justify-content-between border-0">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-play-circle-fill text-primary me-3 fs-5"></i>
                                            <span class="fw-medium">{{ $lesson->title }}</span>
                                        </div>
                                        @if($isEnrolled || auth()->user()?->isAdmin())
                                            <a href="{{ route('lessons.show', [$course->slug, $lesson->slug]) }}" class="btn btn-sm btn-link text-decoration-none p-0">Preview</a>
                                        @else
                                            <i class="bi bi-lock-fill text-muted"></i>
                                        @endif
                                    </li>
                                @empty
                                    <li class="list-group-item py-4 text-center text-muted border-0">No lessons available yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
