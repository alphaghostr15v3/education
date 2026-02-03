@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Flexible Pricing Plans</h1>
        <p class="lead text-muted">Choose the plan that fits your learning journey.</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-5">
                <h4 class="fw-bold">Basic</h4>
                <h1 class="display-5 fw-bold my-4">$19<small class="text-muted fs-6">/mo</small></h1>
                <ul class="list-unstyled mb-5 text-muted">
                    <li>Access to 10 Courses</li>
                    <li>Community Support</li>
                    <li>Basic Certificates</li>
                </ul>
                <button class="btn btn-outline-primary btn-lg w-100">Get Started</button>
            </div>
        </div>
        <!-- Add more pricing cards as needed -->
    </div>
</div>
@endsection
