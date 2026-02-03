@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Our Story</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about') }}">About</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page">Our Story</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="https://via.placeholder.com/600x400?text= Humble+Beginnings" class="img-fluid rounded-4 shadow-sm" alt="Humble Beginnings">
        </div>
        <div class="col-lg-6 ps-lg-5">
            <h2 class="fw-bold mb-4">Where It All Began</h2>
            <p class="text-muted fs-5 mb-4">EduPlatform started as a small project in 2024 with a simple goal: making web development education easier for students in our local community.</p>
            <p class="text-secondary">We noticed that many online resources were either too expensive or too detached from real-world applications. We wanted to build something different—a platform that was both premium in quality and accessible in price.</p>
        </div>
    </div>

    <div class="row align-items-center flex-row-reverse">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="https://via.placeholder.com/600x400?text=Rapid+Growth" class="img-fluid rounded-4 shadow-sm" alt="Rapid Growth">
        </div>
        <div class="col-lg-6 pe-lg-5">
            <h2 class="fw-bold mb-4">A Growing Legacy</h2>
            <p class="text-muted fs-5 mb-4">What started as a single course quickly expanded into a comprehensive library covering diverse fields from coding to business management.</p>
            <p class="text-secondary">Today, we are proud to be a hub for thousands of students, supported by a dedicated team of instructors and developers who work tirelessly to improve the platform every day.</p>
        </div>
    </div>
</div>
@endsection
