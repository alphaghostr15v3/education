@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold h4 mb-0">Manage Alumni Success</h2>
                <p class="text-muted small">Share the achievements of our former students.</p>
            </div>
            <a href="{{ route('admin.alumni.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Alumni Story
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                        <th class="px-4 py-3">Alumnus</th>
                        <th class="py-3">Company & Position</th>
                        <th class="py-3">Status</th>
                        <th class="py-3 text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alumni as $alumnus)
                        <tr>
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    @if($alumnus->image)
                                        <img src="{{ asset($alumnus->image) }}" class="rounded-circle me-3" style="width: 45px; height: 45px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle me-3 bg-light d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                            <i class="bi bi-person text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="fw-bold">{{ $alumnus->name }}</div>
                                </div>
                            </td>
                            <td>
                                @if($alumnus->company || $alumnus->position)
                                    <div>{{ $alumnus->position }}</div>
                                    <small class="text-muted">{{ $alumnus->company }}</small>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $alumnus->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($alumnus->status) }}
                                </span>
                            </td>
                            <td class="text-end px-4">
                                <div class="btn-group">
                                    <a href="{{ route('admin.alumni.edit', $alumnus) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.alumni.destroy', $alumnus) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this alumni story?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">No alumni stories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $alumni->links() }}
        </div>
    </div>
</div>
@endsection
