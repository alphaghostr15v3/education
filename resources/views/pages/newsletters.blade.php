@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Newsletters</h1>
        <p class="lead text-muted">Stay updated with our latest news and announcements.</p>
    </div>

    <div class="row g-4">
        @forelse($newsletters as $newsletter)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
                    @if($newsletter->thumbnail)
                        <img src="{{ asset($newsletter->thumbnail) }}" alt="{{ $newsletter->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-file-earmark-pdf text-danger display-1"></i>
                        </div>
                    @endif
                    <div class="card-body p-4 d-flex flex-column h-100">
                        <h5 class="fw-bold card-title mb-2">{{ $newsletter->title }}</h5>
                        @if($newsletter->description)
                            <p class="text-muted small mb-3">{{ Str::limit($newsletter->description, 120) }}</p>
                        @endif
                        <div class="mt-auto">
                            <p class="text-muted small mb-3">Published on {{ $newsletter->published_date->format('F d, Y') }}</p>
                            <a href="{{ asset($newsletter->file_path) }}" target="_blank" class="btn btn-outline-primary w-100 stretched-link">
                                <i class="bi bi-download me-2"></i> Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No newsletters available at the moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
