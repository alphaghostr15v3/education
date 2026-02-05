@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('case-studies.index') }}">Impact</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Case Study</li>
                </ol>
            </nav>

            <h1 class="display-4 fw-bold mb-4">{{ $caseStudy->title }}</h1>

            @if($caseStudy->image)
                <div class="mb-5 rounded-4 overflow-hidden shadow">
                    <img src="{{ asset($caseStudy->image) }}" class="img-fluid w-100" alt="{{ $caseStudy->title }}">
                </div>
            @endif

            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="content shadow-sm p-4 p-md-5 bg-white rounded-4 mb-5">
                        <div class="mb-5">
                            <h3 class="fw-bold h4 mb-3 border-start border-primary border-4 ps-3">Overview</h3>
                            <div class="lead text-muted lh-lg">
                                {!! nl2br(e($caseStudy->description)) !!}
                            </div>
                        </div>

                        @if($caseStudy->challenge)
                            <div class="mb-5">
                                <h3 class="fw-bold h4 mb-3 border-start border-danger border-4 ps-3 text-danger">The Challenge</h3>
                                <p class="text-muted lh-lg">{{ $caseStudy->challenge }}</p>
                            </div>
                        @endif

                        @if($caseStudy->solution)
                            <div class="mb-5">
                                <h3 class="fw-bold h4 mb-3 border-start border-success border-4 ps-3 text-success">Our Solution</h3>
                                <p class="text-muted lh-lg">{{ $caseStudy->solution }}</p>
                            </div>
                        @endif

                        @if($caseStudy->result)
                            <div>
                                <h3 class="fw-bold h4 mb-3 border-start border-info border-4 ps-3 text-info">Final Result</h3>
                                <p class="text-muted lh-lg">{{ $caseStudy->result }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px; z-index: 1;">
                        <div class="card border-0 shadow-sm rounded-4 bg-primary text-white p-4 mb-4">
                            <h5 class="fw-bold mb-3">Key Highlights</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Industry Aligned</li>
                                <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Practical Skills</li>
                                <li class="mb-2"><i class="bi bi-check2-circle me-2"></i> Future-Ready</li>
                                <li><i class="bi bi-check2-circle me-2"></i> Sustainable Career</li>
                            </ul>
                        </div>

                        <div class="card border-0 shadow-sm rounded-4 p-4 text-center">
                            <h5 class="fw-bold mb-3">Ready to Start?</h5>
                            <p class="text-muted small mb-4">Join our vocational programs and build your own success story today.</p>
                            <a href="{{ route('courses.index') }}" class="btn btn-primary w-100 rounded-pill py-3">Explore Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
