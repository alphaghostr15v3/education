@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-4">
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-link text-decoration-none p-0">
            <i class="bi bi-arrow-left"></i> Back to Messages
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Message Details</h5>
                    <small class="text-muted">{{ $contact->created_at->format('F d, Y \a\t H:i') }}</small>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="text-muted small text-uppercase fw-bold">From</label>
                            <p class="fs-5 mb-0">{{ $contact->first_name }} {{ $contact->last_name }}</p>
                            <p class="text-primary">{{ $contact->email }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-muted small text-uppercase fw-bold">Message</label>
                        <div class="p-3 bg-light rounded border">
                            {{ $contact->message }}
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Delete Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
