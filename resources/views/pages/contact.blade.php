@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-5">
            <h1 class="display-4 fw-bold mb-4">Get in Touch</h1>
            <p class="lead text-muted mb-5">Have any questions? We'd love to hear from you. Our team is here to help.</p>
            
            <div class="d-flex mb-4">
                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-4">
                    <i class="bi bi-geo-alt fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold">Our Office</h5>
                    <p class="text-muted mb-0">PHOENIX Tower, JK Centre,<br>59 Community Centre, Okhla Phase III,<br>New Delhi – 110020</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-4">
                    <i class="bi bi-envelope fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold">Email Us</h5>
                    <p class="text-muted mb-0">ypsvef@jkcement.com</p>
                </div>
            </div>

            <div class="d-flex">
                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-4">
                    <i class="bi bi-telephone fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold">Call Us</h5>
                    <p class="text-muted mb-0">+91 11 49220000</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg p-4 p-md-5 rounded-4">
                <h3 class="fw-bold mb-4">Send us a message</h3>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase">First Name</label>
                            <input type="text" name="first_name" class="form-control form-control-lg border-2 @error('first_name') is-invalid @enderror" placeholder="John" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase">Last Name</label>
                            <input type="text" name="last_name" class="form-control form-control-lg border-2 @error('last_name') is-invalid @enderror" placeholder="Doe" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold small text-uppercase">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg border-2 @error('email') is-invalid @enderror" placeholder="john@example.com" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold small text-uppercase">How can we help?</label>
                            <textarea name="message" class="form-control form-control-lg border-2 @error('message') is-invalid @enderror" rows="4" placeholder="Describe your inquiry..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 pb-2">
                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold py-3 shadow-sm mt-2">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
