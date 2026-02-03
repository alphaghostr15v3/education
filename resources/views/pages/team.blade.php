@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Our Expert Team</h1>
        <p class="lead text-muted">Meet the brilliant minds behind our educational excellence.</p>
    </div>

    <div class="row g-4">
        <!-- Team Member 1 -->
        <div class="col-md-4 text-center">
            <div class="card border-0 shadow-sm h-100 p-4">
                <img src="https://via.placeholder.com/150" class="rounded-circle mx-auto mb-4" alt="Team member">
                <h5 class="fw-bold">John Doe</h5>
                <p class="text-primary small fw-bold">Founder & CEO</p>
                <p class="text-muted small">Leading the vision for modern education.</p>
            </div>
        </div>
        <!-- Add more team members as needed -->
    </div>
</div>
@endsection
