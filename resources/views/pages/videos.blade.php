@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Video Gallery</h1>
        <p class="lead text-muted">Explore our latest videos and events.</p>
    </div>

    <div class="row g-4">
        @forelse($videos as $video)
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="ratio ratio-16x9">
                        @if($video->type == 'upload')
                            <video controls class="w-100 h-100" style="object-fit: cover;">
                                <source src="{{ asset($video->video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <iframe src="{{ $video->embed_url }}" title="{{ $video->title }}" allowfullscreen></iframe>
                        @endif
                    </div>
                    <div class="card-body p-lg-5 p-4">
                        <h3 class="fw-bold mb-3">{{ $video->title }}</h3>
                        @if($video->description)
                            <p class="text-muted fs-5 mb-0">{{ $video->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No videos available yet.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $videos->links() }}
    </div>
</div>
@endsection
