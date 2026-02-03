@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Our Campus Gallery</h1>
        <p class="lead text-muted">Recent photos from our campus and events.</p>
    </div>

    <div class="row g-4">
        @forelse($galleries as $gallery)
            <div class="col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100 overflow-hidden hover-lift position-relative">
                    @if($gallery->images->count() > 1)
                        <span class="position-absolute top-0 end-0 m-2 badge rounded-pill bg-primary shadow-sm" style="z-index: 5;">
                            {{ $gallery->images->count() }} <i class="bi bi-images ms-1"></i>
                        </span>
                    @endif
                    <img src="{{ $gallery->image_path }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body p-3 text-center">
                        <h6 class="fw-bold mb-1">{{ $gallery->title }}</h6>
                        <small class="text-primary">{{ $gallery->category }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No photos available yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
