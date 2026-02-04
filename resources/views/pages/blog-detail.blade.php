@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Back to Blog Link -->
            <a href="{{ route('blog') }}" class="btn btn-link text-decoration-none mb-4">
                <i class="bi bi-arrow-left"></i> Back to Blog
            </a>

            <!-- Featured Image -->
            @if($blog->featured_image)
                <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid rounded shadow-sm mb-4" style="width: 100%; max-height: 500px; object-fit: cover;">
            @endif

            <!-- Blog Header -->
            <div class="mb-4">
                @if($blog->category)
                    <span class="badge bg-primary mb-2">{{ $blog->category }}</span>
                @endif
                <h1 class="display-4 fw-bold mb-3">{{ $blog->title }}</h1>
                
                <div class="d-flex align-items-center text-muted mb-3">
                    <div class="me-4">
                        <i class="bi bi-person-circle"></i>
                        <span class="ms-1">{{ $blog->author->name }}</span>
                    </div>
                    <div>
                        <i class="bi bi-calendar3"></i>
                        <span class="ms-1">{{ $blog->published_at->format('F d, Y') }}</span>
                    </div>
                </div>

                @if($blog->excerpt)
                    <p class="lead text-muted border-start border-primary border-4 ps-3 py-2 bg-light">
                        {{ $blog->excerpt }}
                    </p>
                @endif
            </div>

            <!-- Blog Content -->
            <div class="blog-content">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <!-- Share Section -->
            <div class="border-top border-bottom py-4 my-5">
                <h5 class="mb-3">Share this post</h5>
                <div class="d-flex gap-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.detail', $blog->slug)) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="bi bi-facebook"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.detail', $blog->slug)) }}&text={{ urlencode($blog->title) }}" target="_blank" class="btn btn-outline-info">
                        <i class="bi bi-twitter"></i> Twitter
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.detail', $blog->slug)) }}&title={{ urlencode($blog->title) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="bi bi-linkedin"></i> LinkedIn
                    </a>
                </div>
            </div>

            <!-- Author Info -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                            <span class="fs-4 fw-bold">{{ substr($blog->author->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $blog->author->name }}</h5>
                            <p class="text-muted mb-0">Author</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Blog -->
            <div class="text-center mt-5">
                <a href="{{ route('blog') }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-arrow-left"></i> View All Blog Posts
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .blog-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }
    
    .blog-content p {
        margin-bottom: 1.5rem;
    }
</style>
@endsection
