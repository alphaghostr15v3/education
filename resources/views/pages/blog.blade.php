@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-3 fw-bold">Education Blog</h1>
        <p class="lead text-muted">Stay informed with the latest trends and student stories.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">
        @forelse($blogs as $blog)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 overflow-hidden hover-lift transition">
                    @if($blog->featured_image)
                        <img src="{{ asset($blog->featured_image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 250px; object-fit: cover;">
                    @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="bi bi-image text-white display-4"></i>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        @if($blog->category)
                            <small class="text-primary fw-bold text-uppercase">{{ $blog->category }}</small>
                        @endif
                        <h5 class="fw-bold mt-2">{{ $blog->title }}</h5>
                        <p class="text-muted small mt-3">{{ Str::limit($blog->excerpt, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted">
                                <i class="bi bi-person"></i> {{ $blog->author->name }}
                            </small>
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $blog->published_at->format('M d, Y') }}
                            </small>
                        </div>
                        <a href="{{ route('blog.detail', $blog->slug) }}" class="btn btn-link link-primary p-0 text-decoration-none fw-bold mt-3">
                            Read More <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-inbox display-1 text-muted"></i>
                    <h3 class="mt-3 text-muted">No blog posts yet</h3>
                    <p class="text-muted">Check back soon for new content!</p>
                </div>
            </div>
        @endforelse
    </div>

    @if($blogs->hasPages())
        <div class="mt-5">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection

