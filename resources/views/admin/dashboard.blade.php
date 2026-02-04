@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold">Admin Dashboard</h2>
            <p class="text-muted">Welcome back, {{ Auth::user()->name }}!</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Stat Cards -->
        <div class="col-md-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 fw-bold text-primary mb-2">{{ $stats['users'] }}</div>
                    <div class="text-muted text-uppercase small font-weight-bold">Total Users</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 fw-bold text-success mb-2">{{ $stats['courses'] }}</div>
                    <div class="text-muted text-uppercase small font-weight-bold">Active Courses</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 fw-bold text-info mb-2">{{ $stats['enrollments'] }}</div>
                    <div class="text-muted text-uppercase small font-weight-bold">Enrollments</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 fw-bold text-primary mb-2">{{ $stats['galleries'] }}</div>
                    <div class="text-muted text-uppercase small font-weight-bold">Photos</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 fw-bold text-primary mb-2">{{ $stats['events'] }}</div>
                    <div class="text-muted text-uppercase small font-weight-bold">Events</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="display-6 fw-bold text-warning mb-2">{{ $stats['categories'] }}</div>
                    <div class="text-muted text-uppercase small font-weight-bold">Categories</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold">Recent Management</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('admin.courses.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Courses</h6>
                                    <p class="mb-1 text-muted small">Create, edit, and publish educational content.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Categories</h6>
                                    <p class="mb-1 text-muted small">Organize courses into meaningful genres.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Users</h6>
                                    <p class="mb-1 text-muted small">Monitor student activity and roles.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.galleries.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Gallery</h6>
                                    <p class="mb-1 text-muted small">Upload and organize campus photos.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.events.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Events</h6>
                                    <p class="mb-1 text-muted small">Schedule workshops and webinars.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.hero-slides.index') }}" class="list-group-item list-group-item-action border-0 px-0 text-primary">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Hero Photos</h6>
                                    <p class="mb-1 text-muted small">Update background slider images for the home page.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.videos.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Videos</h6>
                                    <p class="mb-1 text-muted small">Add and curate video content for the gallery.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.institutes.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Institutes</h6>
                                    <p class="mb-1 text-muted small">Update institute programs and descriptions.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.blogs.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Blog Posts</h6>
                                    <p class="mb-1 text-muted small">Create and publish educational blog content.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.teams.index') }}" class="list-group-item list-group-item-action border-0 px-0">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">Manage Team Members</h6>
                                    <p class="mb-1 text-muted small">Add and update team member profiles.</p>
                                </div>
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-lightning-charge-fill display-4 mb-3"></i>
                    <h5>Quick Actions</h5>
                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ route('admin.courses.create') }}" class="btn btn-light fw-bold">New Course</a>
                        <button class="btn btn-outline-light">Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
