@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold h4 mb-0">Manage Newsletters</h2>
                <p class="text-muted small">Upload and publish PDF newsletters.</p>
            </div>
            <a href="{{ route('admin.newsletters.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Newsletter
            </a>
        </div>
    </div>
</div>

<div class="card admin-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle admin-table">
                <thead class="table-light">
                    <tr>
                            <th style="width: 80px;">Thumb</th>
                            <th>Title</th>
                            <th>Published Date</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Actions</th>
                    </thead>
                    <tbody>
                        @forelse($newsletters as $newsletter)
                            <tr>
                                <td>
                                    @if($newsletter->thumbnail)
                                        <img src="{{ asset($newsletter->thumbnail) }}" alt="Thumb" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $newsletter->title }}</div>
                                    @if($newsletter->description)
                                        <small class="text-muted d-block">{{ Str::limit($newsletter->description, 50) }}</small>
                                    @endif
                                </td>
                                <td>{{ $newsletter->published_date->format('M d, Y') }}</td>
                                <td>
                                    @if($newsletter->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ asset($newsletter->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">View PDF</a>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.newsletters.edit', $newsletter) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <form action="{{ route('admin.newsletters.destroy', $newsletter) }}" method="POST" onsubmit="return confirm('Delete this newsletter?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">No newsletters found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $newsletters->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
