@extends('layouts.app')

@section('content')
<div class="container-fluid px-0 h-100" style="margin-top: -1.5rem;">
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-lg-3 bg-light border-end overflow-auto" style="height: calc(100vh - 56px);">
            <div class="p-4 border-bottom bg-white sticky-top">
                <h6 class="fw-bold mb-1 text-primary">{{ $course->title }}</h6>
                <div class="progress mt-2" style="height: 6px;">
                    <div class="progress-bar" role="progressbar" style="width: 25%;"></div>
                </div>
                <small class="text-muted mt-2 d-block">Course Progress: 25%</small>
            </div>
            
            <div class="list-group list-group-flush">
                @foreach($lessons as $idx => $l)
                    <a href="{{ route('lessons.show', [$course->slug, $l->slug]) }}" 
                       class="list-group-item list-group-item-action py-3 px-4 border-0 {{ $lesson->id == $l->id ? 'bg-primary text-white shadow-sm active' : '' }}">
                        <div class="d-flex align-items-center">
                            <span class="me-3 opacity-75 fs-6">{{ $idx + 1 }}.</span>
                            <span class="fw-medium">{{ $l->title }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- content -->
        <div class="col-lg-9 bg-white">
            <div class="p-5 overflow-auto" style="height: calc(100vh - 56px);">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a></li>
                            <li class="breadcrumb-item active">Lesson</li>
                        </ol>
                    </nav>
                    <h1 class="fw-bold display-6">{{ $lesson->title }}</h1>
                </div>

                @if($lesson->video_url)
                    <div class="ratio ratio-16x9 mb-5 rounded-4 shadow-sm overflow-hidden bg-dark">
                        <!-- Simplified video player for demo -->
                        <div class="d-flex align-items-center justify-content-center text-white h-100">
                             <div class="text-center">
                                <i class="bi bi-play-btn-fill display-1"></i>
                                <p class="mt-3">Video Player Mock: {{ $lesson->video_url }}</p>
                             </div>
                        </div>
                    </div>
                @endif

                <div class="fs-5 text-muted" style="white-space: pre-line; line-height: 1.8;">
                    {{ $lesson->content ?: 'No written content for this lesson.' }}
                </div>

                <div class="mt-5 pt-5 border-top d-flex justify-content-between">
                    <button class="btn btn-outline-secondary px-4">Previous Lesson</button>
                    <button class="btn btn-primary px-4 shadow-sm">Next Lesson</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body { overflow: hidden; }
    .navbar { margin-bottom: 0 !important; }
    .active { border-radius: 0 !important; transition: none; }
</style>
@endsection
