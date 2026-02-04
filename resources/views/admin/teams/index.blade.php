@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Team Members</h1>
        <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Team Member
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 80px;">Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Order</th>
                            <th style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teams as $member)
                            <tr>
                                <td>
                                    @if($member->photo)
                                        <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="bi bi-person text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $member->name }}</div>
                                    <small class="text-muted">{{ Str::limit($member->bio, 50) }}</small>
                                </td>
                                <td>{{ $member->position }}</td>
                                <td><span class="badge bg-secondary">{{ $member->order }}</span></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.teams.edit', $member) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.teams.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this team member?');">
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
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="bi bi-people display-4 d-block mb-2"></i>
                                    No team members found. Add your first team member!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
