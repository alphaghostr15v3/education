@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Our Institutions</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">Explore our global network of learning centers and partner institutions.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
                <div class="bg-soft p-5 text-center" style="background-color: #f0f4f5; height: 400px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <i class="bi bi-geo-alt-fill text-primary display-1 mb-3"></i>
                    <h3 class="fw-bold">Global Network Map</h3>
                    <p class="text-muted">Interative map showing all 12 institutional profiles worldwide.</p>
                    <span class="badge bg-primary px-3 py-2 mt-2">Interactive Element Placeholder</span>
                </div>
            </div>

            <h2 class="fw-bold mb-4">Featured Campus Profiles</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://via.placeholder.com/400x250?text=London+Campus" class="card-img-top" alt="London">
                        <div class="card-body">
                            <h5 class="fw-bold">London Innovation Hub</h5>
                            <p class="small text-muted mb-0">Specializing in FinTech and Digital Arts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://via.placeholder.com/400x250?text=Singapore+Campus" class="card-img-top" alt="Singapore">
                        <div class="card-body">
                            <h5 class="fw-bold">Singapore Excellence Center</h5>
                            <p class="small text-muted mb-0">Focusing on Logistics and Emerging Tech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 bg-primary text-white mb-4">
                <h4 class="fw-bold mb-3">Institutional Reports</h4>
                <p class="small mb-4">Download our latest impact reports and institutional performance analytics.</p>
                <div class="d-grid">
                    <button class="btn btn-light fw-bold text-primary">Download PDF (2024)</button>
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Quick Search</h5>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by city...">
                    <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
