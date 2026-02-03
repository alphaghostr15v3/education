@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Frequently Asked Questions</h1>
        <p class="lead text-muted">Got questions? We've got answers.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion accordion-flush shadow-sm" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            How do I enroll in a course?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Simply browse our course catalog, select a course, and click the "Enroll Now" button.
                        </div>
                    </div>
                </div>
                <!-- Add more FAQ items as needed -->
            </div>
        </div>
    </div>
</div>
@endsection
