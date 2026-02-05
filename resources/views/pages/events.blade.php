@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Upcoming Events</h1>
        <p class="lead text-muted">Join our community in these exciting upcoming events.</p>
    </div>

    <div class="row g-4">
        @forelse($events as $event)
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden hover-lift">
                    @if($event->image_path)
                        <img src="{{ asset($event->image_path) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 350px; object-fit: cover;">
                    @else
                        <div class="bg-primary bg-opacity-10 d-flex flex-column align-items-center justify-content-center" style="height: 350px;">
                            <div class="display-4 fw-bold text-primary">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
                            <div class="text-uppercase fw-bold text-primary">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>
                        </div>
                    @endif
                    <div class="card-body p-lg-5 p-4">
                        <div class="d-flex align-items-center mb-3 text-muted fs-5">
                            <i class="bi bi-calendar-event me-2"></i>
                            {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y h:i A') }}
                        </div>
                        <h3 class="fw-bold mb-3">{{ $event->title }}</h3>
                        <p class="text-muted fs-5 mb-4">{{ $event->description }}</p>
                        <div class="d-flex align-items-center text-primary fw-bold fs-5">
                            <i class="bi bi-geo-alt me-2"></i>
                            {{ $event->location }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No upcoming events scheduled at the moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
