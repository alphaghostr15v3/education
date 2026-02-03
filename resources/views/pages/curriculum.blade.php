@extends('layouts.app')

@section('content')
<div class="bg-light py-5 mb-5 border-bottom">
    <div class="container py-4 text-center">
        <h1 class="display-4 fw-bold text-dark">Courses & Curriculum</h1>
        <p class="lead text-muted mx-auto" style="max-width: 700px;">Our structured learning paths are designed to take you from foundational knowledge to expert mastery.</p>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="row g-4 text-center mb-5">
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-top border-primary border-4">
                <h2 class="fw-bold text-primary mb-3">Level 1</h2>
                <h5 class="fw-bold">Foundational</h5>
                <p class="small text-muted">Essential concepts and terminology to kickstart your journey.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-top border-primary border-4">
                <h2 class="fw-bold text-primary mb-3">Level 2</h2>
                <h5 class="fw-bold">Intermediate</h5>
                <p class="small text-muted">Practical application and project-based learning segments.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-top border-primary border-4">
                <h2 class="fw-bold text-primary mb-3">Level 3</h2>
                <h5 class="fw-bold">Advanced</h5>
                <p class="small text-muted">Mastery level expertise and industry-ready specialized skills.</p>
            </div>
        </div>
    </div>

    <h2 class="fw-bold mb-4">Curriculum by Sector</h2>
    <div class="accordion border-0 shadow-sm rounded-4 overflow-hidden" id="curriculumAccordion">
        <div class="accordion-item border-0 border-bottom">
            <h2 class="accordion-header">
                <button class="accordion-button fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    Engineering & Technology
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#curriculumAccordion">
                <div class="accordion-body p-4">
                    <p class="text-muted">A deep dive into modular curriculum structures for modern developers.</p>
                    <table class="table table-hover small mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>Module ID</th>
                                <th>Focus Area</th>
                                <th>Duration</th>
                                <th>Difficulty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>TECH-001</td>
                                <td>Web System Architecture</td>
                                <td>8 Weeks</td>
                                <td><span class="badge bg-success">Easy</span></td>
                            </tr>
                            <tr>
                                <td>TECH-002</td>
                                <td>Database Design Patterns</td>
                                <td>6 Weeks</td>
                                <td><span class="badge bg-warning text-dark">Medium</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item border-0">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    Creative Arts & Design
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#curriculumAccordion">
                <div class="accordion-body p-4">
                    <p class="text-muted">Curriculum focused on visual communication and user experience.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
