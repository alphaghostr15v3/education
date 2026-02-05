@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold h4 mb-0">Manage Institutes</h2>
                <p class="text-muted small">Update institute programs and descriptions.</p>
            </div>
            <a href="{{ route('admin.institutes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Institute
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
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle admin-table">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3">Thumbnail</th>
                            <th class="py-3">Title</th>
                            <th class="py-3">Features</th>
                            <th class="py-3 text-end px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($institutes as $institute)
                            <tr>
                                <td class="px-4">
                                    <img src="{{ asset($institute->thumbnail) }}" alt="Thumb" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $institute->title }}</div>
                                    <div class="small text-muted">{{ Str::limit($institute->description, 50) }}</div>
                                </td>
                                <td>
                                    @php $features = $institute->features_list; @endphp
                                    @if(count($features) > 0)
                                        <span class="badge bg-light text-dark border">{{ count($features) }} Features</span>
                                    @else
                                        <span class="text-muted small">-</span>
                                    @endif
                                </td>
                                <td class="text-end px-4">
                                    <a href="{{ route('admin.institutes.edit', $institute->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.institutes.destroy', $institute->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">No institutes found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center py-3">
                {{ $institutes->links() }}
            </div>
        </div>
    </div>
@endsection
