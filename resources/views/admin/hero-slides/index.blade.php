@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold h4 mb-0">Manage Hero Photos</h2>
                <p class="text-muted small">Update background slider images for the home page.</p>
            </div>
            <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Hero Slide
            </a>
        </div>
    </div>
</div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<div class="card admin-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle admin-table">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 150px;">Preview</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($slides as $slide)
                        <tr>
                            <td class="ps-4">
                                <div class="rounded-3 overflow-hidden shadow-sm" style="width: 100px; height: 60px;">
                                    <img src="{{ $slide->image_path }}" class="w-100 h-100 object-fit-cover" alt="Slide preview">
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $slide->order }}</span>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Active</span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                            <i class="bi bi-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted italic">
                                No hero slides found. Add one to get started!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($slides->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                {{ $slides->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
