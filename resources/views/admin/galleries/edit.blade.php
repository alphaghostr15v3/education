@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Edit Gallery Item</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" class="form-control border-2 @error('title') is-invalid @enderror" value="{{ old('title', $gallery->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Change Images (Optional, Max 5)</label>
                            <input type="file" name="images[]" class="form-control border-2 @error('images') is-invalid @enderror" multiple>
                            <small class="text-muted">Leave empty to keep current images. Max: 2MB per image.</small>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="mt-3">
                                <label class="d-block mb-3 small fw-bold">Current Images:</label>
                                <div class="row g-2">
                                    @foreach($gallery->images as $img)
                                        <div class="col-3">
                                            <img src="{{ $img->image_path }}" alt="Gallery shift" class="rounded shadow-sm img-fluid" style="height: 80px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Category</label>
                            <input type="text" name="category" class="form-control border-2" value="{{ $gallery->category }}">
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary px-4">Update Gallery Item</button>
                            <a href="{{ route('admin.galleries.index') }}" class="btn btn-light px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
