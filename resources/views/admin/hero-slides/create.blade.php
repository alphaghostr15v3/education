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
                    <h2 class="fw-bold mb-0">Add New Hero Photo</h2>
                    <p class="text-muted mb-0">Upload a high-quality image for the home page slider.</p>
                </div>
            </div>

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-5">
                            <label for="image" class="form-label fw-bold h5 mb-3 text-primary">Hero Background Image</label>
                            <div class="upload-container text-center p-5 border-2 border-dashed rounded-4 bg-light position-relative">
                                <input type="file" name="image" id="image" class="form-control opacity-0 w-100 h-100 position-absolute start-0 top-0 cursor-pointer" style="z-index: 10;" required>
                                <div id="image-preview-container" class="py-3">
                                    <i class="bi bi-cloud-arrow-up display-1 text-muted opacity-50"></i>
                                    <p class="mt-3 fs-5 text-muted">Click or drag image to upload</p>
                                    <p class="small text-muted mb-0">Recommended: 1920x1080px (Max 2MB)</p>
                                </div>
                                <img id="image-preview" src="#" alt="Preview" class="img-fluid rounded d-none" style="max-height: 250px;">
                            </div>
                            @error('image')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="order" class="form-control border-2" id="order" placeholder="0" value="0">
                                    <label for="order">Display Order</label>
                                    <div class="form-text">Lower numbers appear first.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="label" class="form-control border-2" id="label" placeholder="Home > VET">
                                    <label for="label">Internal Label (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden fields to satisfy model requirements -->
                        <input type="hidden" name="title" value="Dynamic Hero Slide">
                        
                        <hr class="my-5 opacity-10">

                        <div class="d-flex gap-3 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold py-3 rounded-pill shadow-sm flex-fill">
                                Upload Photo
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
            const placeholder = document.getElementById('image-preview-container');
            preview.src = URL.createObjectURL(file)
            preview.classList.remove('d-none');
            placeholder.classList.add('d-none');
        }
    }
</script>

<style>
    .cursor-pointer { cursor: pointer; }
    .border-dashed { border-style: dashed !important; }
</style>
@endsection
