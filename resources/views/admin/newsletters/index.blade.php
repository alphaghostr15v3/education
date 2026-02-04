@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Manage Newsletters</h2>
        <a href="{{ route('admin.newsletters.create') }}" class="btn btn-primary">Add Newsletter</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Published Date</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($newsletters as $newsletter)
                            <tr>
                                <td>{{ $newsletter->title }}</td>
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
                                <td colspan="5" class="text-center py-4">No newsletters found.</td>
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
