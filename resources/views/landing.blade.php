@extends('layouts.app')

@section('content')
<div class="hero-modern">
    <div class="container-fluid p-0">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-6">
                <div class="hero-modern-content ps-lg-5 ms-lg-5 pe-lg-4">
                    <h1 class="hero-modern-title">Yadupati Singhania Vocational Education Foundation (YPSVEF)</h1>
                    <p class="hero-modern-description">
                        Building future-ready vocational skills that lead to real jobs, sustainable livelihoods, and industry relevance across India.
                    </p>
                    
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="{{ route('about') }}" class="btn btn-primary btn-lg px-4 fw-bold">Explore Our Work</a>
                        <a href="{{ route('about.partners') }}" class="btn btn-outline-light btn-lg px-4 fw-bold">Partner With Us</a>
                    </div>

                    <div class="row g-4 mt-5">
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-white opacity-75"></i>
                                <span class="small fw-bold">Industry-aligned</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-white opacity-75"></i>
                                <span class="small fw-bold">Future-ready</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-white opacity-75"></i>
                                <span class="small fw-bold">Employability Focus</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="hero-modern-image-container">
                    <div class="hero-slider">
                        @foreach($slides as $index => $slide)
                            <div class="hero-slide" style="background-image: url('{{ $slide->image_path }}'); animation-delay: {{ $index * 5 }}s;"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Positioning Section -->
<section class="py-5 bg-light border-top border-bottom">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="text-primary text-uppercase fw-bold letter-spacing-1 mb-2 d-block">OUR POSITIONING</span>
                <h2 class="display-5 fw-bold mb-4">Not just skilling. <br>Industry-led capability building.</h2>
                <p class="lead text-muted mb-4">India does not suffer from a shortage of trained youth. It suffers from a shortage of industry-ready skills.</p>
                <p class="text-muted fs-5">YPSVEF was created to bridge this gap by designing and delivering training that is defined by real job roles and modern systems.</p>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="bg-white p-4 rounded-3 shadow-sm h-100 hover-lift">
                            <div class="text-primary fs-3 mb-2"><i class="bi bi-gear-wide-connected"></i></div>
                            <h5 class="fw-bold">Industry-led</h5>
                            <p class="small text-muted mb-0">Defined by real job roles and industry systems.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bg-white p-4 rounded-3 shadow-sm h-100 hover-lift">
                            <div class="text-primary fs-3 mb-2"><i class="bi bi-cpu"></i></div>
                            <h5 class="fw-bold">Future-ready</h5>
                            <p class="small text-muted mb-0">Aligned to green energy and smart infrastructure.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bg-white p-4 rounded-3 shadow-sm h-100 hover-lift">
                            <div class="text-primary fs-3 mb-2"><i class="bi bi-graph-up-arrow"></i></div>
                            <h5 class="fw-bold">Outcome-driven</h5>
                            <p class="small text-muted mb-0">Focused on employment and micro-enterprises.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bg-white p-4 rounded-3 shadow-sm h-100 hover-lift">
                            <div class="text-primary fs-3 mb-2"><i class="bi bi-recycle"></i></div>
                            <h5 class="fw-bold">Responsible</h5>
                            <p class="small text-muted mb-0">Low-cost, zero-waste, and ESG-aligned.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Do Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">WHAT WE DO</h2>
            <div class="bg-primary mx-auto my-3" style="width: 50px; height: 3px;"></div>
        </div>

        <div class="row g-4">
            <!-- 1. Future-Ready Vocational Training -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 hover-lift">
                    <div class="row align-items-center">
                        <div class="col-sm-3 text-center mb-3 mb-sm-0">
                            <div class="bg-soft text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-lightning fs-2"></i>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h4 class="fw-bold">1. Future-Ready Vocational Training</h4>
                            <p class="text-muted mb-3">High-demand skill domains critical to India's growth:</p>
                            <ul class="list-unstyled small">
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Green construction skills</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Electrical & electronics systems</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Energy, solar, and electrification skills</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Competition-oriented excellence</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Quality & Excellence as a System -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 hover-lift">
                    <div class="row align-items-center">
                        <div class="col-sm-3 text-center mb-3 mb-sm-0">
                            <div class="bg-soft text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-award fs-2"></i>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h4 class="fw-bold">2. Quality & Excellence as a System</h4>
                            <p class="text-muted mb-3">Quality is a system, not a slogan:</p>
                            <ul class="list-unstyled small">
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>SOP-driven training delivery</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Standardised labs and assessments</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Trainer upskilling and pedagogy</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Competition benchmarks for excellence</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Zero-Waste, Low-Cost Skill Labs -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 hover-lift">
                    <div class="row align-items-center">
                        <div class="col-sm-3 text-center mb-3 mb-sm-0">
                            <div class="bg-soft text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-wallet2 fs-2"></i>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h4 class="fw-bold">3. Zero-Waste, Low-Cost Skill Labs</h4>
                            <p class="text-muted mb-3">Pioneers in zero-waste vocational training models:</p>
                            <ul class="list-unstyled small">
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Reduced material wastage / circular use</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Lower cost per trainee</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Scalable and sustainable labs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Employability & Livelihood Outcomes -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm p-4 hover-lift">
                    <div class="row align-items-center">
                        <div class="col-sm-3 text-center mb-3 mb-sm-0">
                            <div class="bg-soft text-primary rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-briefcase fs-2"></i>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h4 class="fw-bold">4. Employability & Livelihood Outcomes</h4>
                            <p class="text-muted mb-3">Success measured by livelihoods:</p>
                            <ul class="list-unstyled small">
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Wage employment & Apprenticeships</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Self-employment / micro-enterprises</li>
                                <li class="mb-1"><i class="bi bi-dot text-primary me-2"></i>Close industry & ecosystem partnerships</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why YPSVEF Section -->
<section class="py-5 bg-soft" style="background-color: var(--edu-bg-soft);">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-5">
                <span class="text-primary text-uppercase fw-bold letter-spacing-1 mb-2 d-block">WHY YPSVEF</span>
                <h2 class="display-6 fw-bold mb-4">What Sets Us Apart</h2>
                <p class="text-muted mb-4">YPSVEF is built for credibility, scale, and long-term impact in the vocational education ecosystem.</p>
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800&auto=format&fit=crop" class="img-fluid rounded-4 shadow" alt="Differentiation">
            </div>
            <div class="col-lg-6 offset-lg-1 d-flex flex-column justify-content-center">
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-white p-2 rounded-circle shadow-sm text-primary">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Industry-defined skills</h5>
                        <p class="small text-muted mb-0">Driven by jobs, not just government schemes.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-white p-2 rounded-circle shadow-sm text-primary">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Modern trades aligned to 2030</h5>
                        <p class="small text-muted mb-0">Future-ready certifications for upcoming technologies.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-white p-2 rounded-circle shadow-sm text-primary">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Competition-ready excellence</h5>
                        <p class="small text-muted mb-0">Training that meets WorldSkills benchmarks.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="bg-white p-2 rounded-circle shadow-sm text-primary">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Strong governance</h5>
                        <p class="small text-muted mb-0">Accountability and transparency as foundation.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3">
                    <div class="bg-white p-2 rounded-circle shadow-sm text-primary">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">CSR- and ESG-aligned</h5>
                        <p class="small text-muted mb-0">Responsible implementation for long-term value.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partnership Invitation Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="bg-primary text-white p-5 rounded-5 shadow-lg position-relative overflow-hidden text-center">
            <!-- Background Shape -->
            <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.05); border-radius: 100px;"></div>
            
            <span class="text-uppercase fw-bold letter-spacing-1 mb-3 d-block opacity-75">PARTNERSHIP INVITATION</span>
            <h2 class="display-5 fw-bold mb-4">Join us in building India's future workforce</h2>
            <p class="mx-auto mb-5 opacity-90 fs-5" style="max-width: 800px;">
                We collaborate with industry leaders, CSR foundations, government institutions, and global partners to ensure skills lead to real work, real value, and real dignity.
            </p>
            
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('about.partners') }}" class="btn btn-white btn-lg px-5 py-3 fw-bold bg-white text-primary">Partner With YPSVEF</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<style>
    .letter-spacing-1 { letter-spacing: 2px; }
    .bg-soft { background-color: #f0f4f5; }
    .btn-white:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-3px);
    }
</style>
@endsection
