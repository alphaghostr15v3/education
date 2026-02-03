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
        <!-- Blog Post 1 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 overflow-hidden">
                <img src="https://via.placeholder.com/400x250?text=Blog+Post+1" class="card-img-top" alt="Blog post">
                <div class="card-body p-4">
                    <small class="text-primary fw-bold text-uppercase">Technology</small>
                    <h5 class="fw-bold mt-2">The Future of AI in Modern Classrooms</h5>
                    <p class="text-muted small mt-3">Exploring how artificial intelligence is reshaping the way students learn and teachers instruct.</p>
                    <a href="#" class="btn btn-link link-primary p-0 text-decoration-none fw-bold mt-3">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <!-- Add more blog posts -->
    </div>
</div>
@endsection
