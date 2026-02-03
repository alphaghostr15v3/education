@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-outline-secondary rounded-circle p-2">
                    <i class="bi bi-arrow-left fs-5"></i>
                </a>
                <div>
                    <h2 class="fw-bold mb-0">Edit Hero Photo</h2>
                    <p class="text-muted mb-0">Update the slide configuration and image.</p>
                </div>
            </div>

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('admin.hero-slides.update', $heroSlide) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-5">
                            <label class="form-label fw-bold h5 mb-3 text-primary">Slide Background Image</label>
                            <div class="upload-container text-center p-4 border-2 border-solid rounded-4 bg-light position-relative">
                                <input type="file" name="image" id="image" class="form-control opacity-0 w-100 h-100 position-absolute start-0 top-0 cursor-pointer" style="z-index: 10;">
                                
                                <div id="current-image-container" class="mb-3">
                                    <div class="text-muted small mb-2">Current Photo</div>
                                    <img src="{{ $heroSlide->image_path }}" alt="Current Slide" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                </div>
                                
                                <div id="image-preview-container" class="d-none py-3">
                                    <div class="text-success small mb-2"><i class="bi bi-check-circle-fill"></i> New Image Selected</div>
                                    <img id="image-preview" src="#" alt="Preview" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                                </div>

                                <div class="mt-4">
                                    <span class="btn btn-outline-primary btn-sm rounded-pill px-4">Change Photo</span>
                                    <p class="small text-muted mt-2 mb-0">Leave empty to keep the existing image. Max 2MB.</p>
                                </div>
                            </div>
                            @error('image')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="order" class="form-control border-2" id="order" placeholder="0" value="{{ $heroSlide->order }}">
                                    <label for="order">Display Order</label>
                                    <div class="form-text">Lower numbers appear first in the slider.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="label" class="form-control border-2" id="label" placeholder="Home > VET" value="{{ $heroSlide->label }}">
                                    <label for="label">Internal Label (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-10">

                        <div class="d-flex gap-3 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold py-3 rounded-pill shadow-sm flex-fill">
                                Update Slide
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').onchange = evt => {
        const [file] = evt.target.files
        if (file) {
            const preview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');
            const currentContainer = document.getElementById('current-image-container');
            
            preview.src = URL.createObjectURL(file)
            previewContainer.classList.remove('d-none');
            currentContainer.classList.add('opacity-50');
        }
    }
</script>

<style>
    .cursor-pointer { cursor: pointer; }
</style>
@endsection
