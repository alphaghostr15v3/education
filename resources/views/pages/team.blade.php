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
            <div class="card border-0 shadow-sm h-100 p-4 hover-lift">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop" class="rounded-circle mx-auto mb-4 shadow" alt="John Doe" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="fw-bold">John Doe</h5>
                <p class="text-primary small fw-bold">Founder & CEO</p>
                <p class="text-muted small">Leading the vision for modern education with 15+ years of experience.</p>
            </div>
        </div>
        <!-- Team Member 2 -->
        <div class="col-md-4 text-center">
            <div class="card border-0 shadow-sm h-100 p-4 hover-lift">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400&auto=format&fit=crop" class="rounded-circle mx-auto mb-4 shadow" alt="Jane Smith" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="fw-bold">Jane Smith</h5>
                <p class="text-primary small fw-bold">Head of Academics</p>
                <p class="text-muted small">Curating world-class curriculum for our students worldwide.</p>
            </div>
        </div>
        <!-- Team Member 3 -->
        <div class="col-md-4 text-center">
            <div class="card border-0 shadow-sm h-100 p-4 hover-lift">
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=400&auto=format&fit=crop" class="rounded-circle mx-auto mb-4 shadow" alt="Robert Wilson" style="width: 150px; height: 150px; object-fit: cover;">
                <h5 class="fw-bold">Robert Wilson</h5>
                <p class="text-primary small fw-bold">Lead Instructor</p>
                <p class="text-muted small">Expert in Web Technologies and interactive learning methods.</p>
            </div>
        </div>
    </div>
</div>
@endsection
