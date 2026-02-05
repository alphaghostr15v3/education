@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-secondary btn-sm me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h2 class="fw-bold h4 mb-0">Edit Video</h2>
                <p class="text-muted small">Modify existing video details.</p>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card admin-card">
            <div class="card-body p-4">
                    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-bold">Video Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $video->title) }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Source Type</label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="typeUrl" value="url" {{ old('type', $video->type ?? 'url') == 'url' ? 'checked' : '' }} onchange="toggleSource()">
                                    <label class="form-check-label" for="typeUrl">External URL (YouTube)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="typeUpload" value="upload" {{ old('type', $video->type ?? 'url') == 'upload' ? 'checked' : '' }} onchange="toggleSource()">
                                    <label class="form-check-label" for="typeUpload">Upload Video File</label>
                                </div>
                            </div>
                            @error('type') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3" id="urlInput">
                            <label class="form-label fw-bold">Video URL</label>
                            <input type="url" name="video_url" class="form-control @error('video_url') is-invalid @enderror" value="{{ old('video_url', $video->type == 'url' ? $video->video_url : '') }}" placeholder="e.g., https://www.youtube.com/watch?v=...">
                            @error('video_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3 d-none" id="fileInput">
                            <label class="form-label fw-bold">Video File (MP4)</label>
                            @if($video->type == 'upload')
                                <div class="mb-2">
                                    <span class="badge bg-secondary">Current File: {{ basename($video->video_url) }}</span>
                                </div>
                            @endif
                            <input type="file" name="video_file" class="form-control @error('video_file') is-invalid @enderror" accept="video/mp4,video/quicktime,video/ogg">
                            <div class="form-text text-muted">Upload to replace the current file (if any).</div>
                            @error('video_file') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <script>
                            function toggleSource() {
                                const isUrl = document.getElementById('typeUrl').checked;
                                document.getElementById('urlInput').classList.toggle('d-none', !isUrl);
                                document.getElementById('fileInput').classList.toggle('d-none', isUrl);
                            }
                            // Run on load
                            toggleSource();
                        </script>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Thumbnail URL</label>
                            <input type="url" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" value="{{ old('thumbnail', $video->thumbnail) }}">
                            @error('thumbnail') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $video->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $video->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="is_published">Published</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold shadow-sm">Update Video</button>
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-secondary py-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
