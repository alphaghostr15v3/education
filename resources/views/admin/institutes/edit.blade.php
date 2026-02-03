@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="mb-0 fw-bold">Edit Institute</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.institutes.update', $institute->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-bold">Institute Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $institute->title) }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description', $institute->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Features List (One per line)</label>
                            <textarea name="features" class="form-control @error('features') is-invalid @enderror" rows="5">{{ old('features', $institute->features) }}</textarea>
                            @error('features') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Thumbnail Image</label>
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('storage/' . $institute->thumbnail) }}" class="rounded me-3" style="width: 80px; height: 50px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*">
                                </div>
                            </div>
                            <div class="form-text text-muted">Upload to replace current image.</div>
                            @error('thumbnail') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Action URL (Button Link)</label>
                            <input type="url" name="action_url" class="form-control @error('action_url') is-invalid @enderror" value="{{ old('action_url', $institute->action_url) }}">
                            @error('action_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('admin.institutes.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary px-5">Update Institute</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
