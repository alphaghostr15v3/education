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
        @forelse($teams as $member)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center p-4">
                    @if($member->photo)
                        <img src="{{ asset($member->photo) }}" class="rounded-circle mx-auto mb-4" width="120" height="120" style="object-fit: cover;">
                    @else
                        <div class="rounded-circle mx-auto mb-4 bg-secondary d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                            <i class="bi bi-person text-white display-5"></i>
                        </div>
                    @endif
                    <h5 class="fw-bold mb-1">{{ $member->name }}</h5>
                    <p class="text-primary small mb-3">{{ $member->position }}</p>
                    @if($member->bio)
                        <p class="small text-muted">{{ $member->bio }}</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-people display-1 text-muted"></i>
                    <h3 class="mt-3 text-muted">No leadership members yet</h3>
                    <p class="text-muted">Check back soon!</p>
                </div>
            </div>
        @endforelse
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
