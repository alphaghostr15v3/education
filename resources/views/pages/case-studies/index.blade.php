@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-6 text-center mx-auto">
            <h6 class="text-primary fw-bold text-uppercase mb-3">Our Impact</h6>
            <h2 class="display-5 fw-bold mb-3">Real Stories, Real Results</h2>
            <p class="text-muted">Discover how our industry-aligned vocational education is transforming lives and building future-ready careers across India.</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($caseStudies as $study)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm transition-hover">
                    <div class="position-relative overflow-hidden" style="height: 240px;">
                        @if($study->image)
                            <img src="{{ asset($study->image) }}" class="card-img-top h-100 w-100 object-fit-cover" alt="{{ $study->title }}">
                        @else
                            <div class="bg-light h-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-image text-muted display-4"></i>
                            </div>
                        @endif
                        <div class="position-absolute bottom-0 start-0 p-3 w-100" style="background: linear-gradient(transparent, rgba(0,0,0,0.7));">
                            <span class="badge bg-primary">Success Story</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="card-title fw-bold h5 mb-3">{{ $study->title }}</h4>
                        <p class="card-text text-muted small mb-4">{{ Str::limit($study->excerpt, 120) }}</p>
                        <a href="{{ route('case-studies.show', $study->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">Read Full Story</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No case studies available at the moment.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $caseStudies->links() }}
    </div>
</div>

<style>
    .transition-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .transition-hover:hover { transform: translateY(-10px); box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important; }
    .object-fit-cover { object-fit: cover; }
</style>
@endsection
