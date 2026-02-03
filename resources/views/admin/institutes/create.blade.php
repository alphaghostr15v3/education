@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h4 class="mb-0 fw-bold">Add New Institute</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.institutes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Institute Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" required>{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Features List (One per line)</label>
                            <textarea name="features" class="form-control @error('features') is-invalid @enderror" rows="5" placeholder="Feature 1&#10;Feature 2&#10;Feature 3">{{ old('features') }}</textarea>
                            <div class="form-text text-muted">Enter each bullet point feature on a new line.</div>
                            @error('features') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Thumbnail Image</label>
                            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*" required>
                            <div class="form-text text-muted">Recommended: Landscape orientation (16:9).</div>
                            @error('thumbnail') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Action URL (Button Link)</label>
                            <input type="url" name="action_url" class="form-control @error('action_url') is-invalid @enderror" value="{{ old('action_url') }}" placeholder="e.g., https://example.com/programs">
                            @error('action_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('admin.institutes.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary px-5">Save Institute</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
