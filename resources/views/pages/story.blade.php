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
    @forelse($stories as $index => $story)
        <div class="row align-items-center mb-5 {{ $index % 2 != 0 ? 'flex-row-reverse' : '' }}">
            <div class="col-lg-6 mb-4 mb-lg-0 {{ $index % 2 != 0 ? 'ps-lg-5' : 'pe-lg-5' }}">
                @if($story->image_path)
                    <img src="{{ asset($story->image_path) }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $story->title }}">
                @endif
            </div>
            <div class="col-lg-6 {{ $index % 2 != 0 ? '' : 'ps-lg-5' }}">
                <h2 class="fw-bold mb-4">{{ $story->title }}</h2>
                <div class="text-muted fs-5 mb-4">
                    {!! nl2br(e($story->description)) !!}
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <h3 class="text-muted">Our story is being written...</h3>
        </div>
    @endforelse
</div>
@endsection
