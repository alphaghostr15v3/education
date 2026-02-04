@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Our Expert Team</h1>
        <p class="lead text-muted">Meet the brilliant minds behind our educational excellence.</p>
    </div>

    <div class="row g-4">
        @forelse($teams as $member)
            <div class="col-md-4 text-center">
                <div class="card border-0 shadow-sm h-100 p-4 hover-lift">
                    @if($member->photo)
                        <img src="{{ asset($member->photo) }}" class="rounded-circle mx-auto mb-4 shadow" alt="{{ $member->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="rounded-circle mx-auto mb-4 shadow bg-secondary d-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
                            <i class="bi bi-person text-white display-4"></i>
                        </div>
                    @endif
                    <h5 class="fw-bold">{{ $member->name }}</h5>
                    <p class="text-primary small fw-bold">{{ $member->position }}</p>
                    @if($member->bio)
                        <p class="text-muted small">{{ $member->bio }}</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-people display-1 text-muted"></i>
                    <h3 class="mt-3 text-muted">No team members yet</h3>
                    <p class="text-muted">Check back soon to meet our team!</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
