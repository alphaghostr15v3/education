@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold h4 mb-0">Manage Case Studies</h2>
                <p class="text-muted small">Showcase success stories and impactful projects.</p>
            </div>
            <a href="{{ route('admin.case-studies.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Case Study
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
                        <th class="px-4 py-3">Case Study</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Created</th>
                        <th class="py-3 text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($caseStudies as $study)
                        <tr>
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    @if($study->image)
                                        <img src="{{ asset($study->image) }}" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="rounded me-3 bg-light d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-bold">{{ $study->title }}</div>
                                        <div class="small text-muted">{{ Str::limit($study->excerpt, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $study->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($study->status) }}
                                </span>
                            </td>
                            <td>{{ $study->created_at->format('M d, Y') }}</td>
                            <td class="text-end px-4">
                                <div class="btn-group">
                                    <a href="{{ route('admin.case-studies.edit', $study) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.case-studies.destroy', $study) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this case study?');">
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
                            <td colspan="4" class="text-center py-5 text-muted">No case studies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $caseStudies->links() }}
        </div>
    </div>
</div>
@endsection
