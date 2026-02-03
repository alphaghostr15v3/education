@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Institutes & Programs</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">Specialized training institutes and comprehensive academic programs designed for the modern workforce.</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">
        @forelse($institutes as $institute)
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm overflow-hidden hover-lift transition">
                 <img src="{{ asset('storage/' . $institute->thumbnail) }}" class="card-img-top" alt="{{ $institute->title }}" style="height: 300px; object-fit: cover;">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-3">{{ $institute->title }}</h3>
                    <p class="text-muted mb-4">{{ $institute->description }}</p>
                    
                    @php $features = $institute->features_list; @endphp
                    @if(count($features) > 0)
                    <ul class="list-unstyled mb-4">
                        @foreach($features as $feature)
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill text-primary me-2"></i> {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    
                    @if($institute->action_url)
                    <a href="{{ $institute->action_url }}" class="btn btn-outline-primary px-4">View Programs</a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
             <p class="text-muted">No institutes available at the moment.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
