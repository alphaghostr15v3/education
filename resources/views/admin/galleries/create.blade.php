@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Add New Gallery Item</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" class="form-control border-2 @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g., Campus Event" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Gallery Images (Max 5)</label>
                            <input type="file" name="images[]" class="form-control border-2 @error('images') is-invalid @enderror" multiple required>
                            <small class="text-muted">You can select up to 5 images. Max size per image: 2MB.</small>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Category</label>
                            <input type="text" name="category" class="form-control border-2" placeholder="e.g., Campus, Sports">
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary px-4">Save Gallery Item</button>
                            <a href="{{ route('admin.galleries.index') }}" class="btn btn-light px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
