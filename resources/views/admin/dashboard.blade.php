@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold h4 mb-0">Overview Dashboard</h2>
            <p class="text-muted small">Real-time statistics and quick access to management tools.</p>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-7 g-4 mb-5">
        <div class="col">
            <div class="card admin-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-value text-primary mb-1">{{ $stats['users'] }}</div>
                    <div class="stat-label text-muted">Users</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card admin-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-value text-success mb-1">{{ $stats['courses'] }}</div>
                    <div class="stat-label text-muted">Courses</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card admin-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-value text-info mb-1">{{ $stats['enrollments'] }}</div>
                    <div class="stat-label text-muted">Enrollments</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card admin-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-value text-primary mb-1">{{ $stats['galleries'] }}</div>
                    <div class="stat-label text-muted">Photos</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card admin-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-value text-indigo mb-1">{{ $stats['events'] }}</div>
                    <div class="stat-label text-muted">Events</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card admin-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-value text-warning mb-1">{{ $stats['categories'] }}</div>
                    <div class="stat-label text-muted">Categories</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card admin-card h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-value text-danger mb-1">{{ $stats['contacts'] }}</div>
                    <div class="stat-label text-muted">Messages</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card admin-card mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold h6">Quick Statistics</h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted">Welcome to your new professional admin dashboard. Use the sidebar on the left to navigate through different management modules.</p>
                    
                    <div class="row g-3 mt-2">
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded text-center">
                                <i class="bi bi-clock-history d-block mb-2 h4 text-primary"></i>
                                <span class="d-block fw-bold small">Latest Activity</span>
                                <span class="text-muted tiny">Just now</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded text-center">
                                <i class="bi bi-shield-check d-block mb-2 h4 text-success"></i>
                                <span class="d-block fw-bold small">System Status</span>
                                <span class="text-success tiny">All systems go</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded text-center">
                                <i class="bi bi-lightning d-block mb-2 h4 text-warning"></i>
                                <span class="d-block fw-bold small">Quick Action</span>
                                <a href="{{ route('admin.courses.create') }}" class="text-decoration-none small">New Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card admin-card">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold h6">Module Overview</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush small">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-journal-text me-2"></i> Courses</span>
                            <span class="badge bg-primary rounded-pill">{{ $stats['courses'] }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-people me-2"></i> Users</span>
                            <span class="badge bg-secondary rounded-pill">{{ $stats['users'] }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-chat-left-text me-2"></i> Inquiries</span>
                            <span class="badge bg-danger rounded-pill">{{ $stats['contacts'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-indigo { color: #6610f2; }
    .tiny { font-size: 0.7rem; }
</style>
@endsection
