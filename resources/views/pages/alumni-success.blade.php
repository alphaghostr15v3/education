@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-6 text-center mx-auto">
            <h6 class="text-primary fw-bold text-uppercase mb-3">Alumni Voices</h6>
            <h2 class="display-5 fw-bold mb-3">Success Across the Industry</h2>
            <p class="text-muted">Hear directly from our graduates who are making significant contributions to India's modernization and green economy.</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($alumni as $alumnus)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-md-5">
                    <i class="bi bi-quote display-1 text-primary-soft mb-0 opacity-25" style="position: absolute; top: 10px; right: 20px;"></i>
                    <div class="card-body p-0 d-flex flex-column">
                        <p class="card-text text-muted mb-5 flex-grow-1 lead-italic" style="font-style: italic; line-height: 1.8;">
                            "{{ $alumnus->testimonial }}"
                        </p>
                        <div class="d-flex align-items-center mt-auto">
                            @if($alumnus->image)
                                <img src="{{ asset($alumnus->image) }}" class="rounded-circle me-3 border border-3 border-light shadow-sm" style="width: 70px; height: 70px; object-fit: cover;" alt="{{ $alumnus->name }}">
                            @else
                                <div class="rounded-circle me-3 bg-light d-flex align-items-center justify-content-center border border-3 border-light shadow-sm" style="width: 70px; height: 70px;">
                                    <i class="bi bi-person text-muted fs-2"></i>
                                </div>
                            @endif
                            <div>
                                <h5 class="fw-bold mb-1">{{ $alumnus->name }}</h5>
                                <div class="text-primary small fw-bold">{{ $alumnus->position }}</div>
                                <div class="text-muted small">{{ $alumnus->company }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Alumni success stories are coming soon!</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .text-primary-soft { color: rgba(26, 182, 157, 0.2); }
    .lead-italic { font-family: 'Nunito', serif; }
</style>
@endsection
