@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold h4 mb-0">Manage Videos</h2>
                <p class="text-muted small">Update video gallery content.</p>
            </div>
            <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Add Video
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
                        <th class="px-4 py-3">Thumbnail</th>
                        <th class="py-3">Title</th>
                        <th class="py-3">Type</th>
                        <th class="py-3">Source</th>
                        <th class="py-3">Status</th>
                        <th class="py-3 text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($videos as $video)
                        <tr>
                            <td class="px-4">
                                @if($video->thumbnail)
                                    <img src="{{ $video->thumbnail }}" alt="Thumbnail" class="rounded" style="width: 80px; height: 45px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 45px;">
                                        <i class="bi bi-play-btn fs-4"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold">{{ $video->title }}</div>
                                <div class="small text-muted">{{ Str::limit($video->description, 50) }}</div>
                            </td>
                            <td>
                                @if($video->type == 'upload')
                                    <span class="badge bg-info text-dark">File</span>
                                @else
                                    <span class="badge bg-dark">URL</span>
                                @endif
                            </td>
                            <td>
                                @if($video->type == 'upload')
                                     <span class="small text-muted">Local File</span>
                                @else
                                    <a href="{{ $video->video_url }}" target="_blank" class="small text-truncate d-inline-block" style="max-width: 150px;">
                                        {{ $video->video_url }} <i class="bi bi-box-arrow-up-right ms-1"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($video->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-end px-4">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" onsubmit="return confirm('Delete this video?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No videos found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($videos->hasPages())
            <div class="card-footer bg-white border-0">
                {{ $videos->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
