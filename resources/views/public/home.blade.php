@extends('public.layouts.app')

@section('content')
  <!-- Hero Section - Matching Reference Aesthetics -->
  <div class="hero-section">
    <div class="container py-lg-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-7 text-start">
          <h1 class="hero-title mb-4">
              MOBILITY <br>
              <span class="text-brand-secondary">UNLIMITED</span>
          </h1>
          <p class="lead mb-5 text-white-50">{{ $company->tagline }}</p>
          <div class="d-flex gap-3 flex-wrap">
            <a class="btn btn-secondary btn-lg px-5 py-3 fw-bold rounded-pill shadow" href="{{ route('services') }}">OUR SERVICES</a>
            <a class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill" href="{{ route('projects') }}">VIEW PROJECTS</a>
          </div>
        </div>
        <div class="col-lg-5 d-none d-lg-flex justify-content-center">
            <div class="hero-graphic-circle d-flex align-items-center justify-content-center">
                <div class="hero-brand-logo shadow-lg">M</div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services Section -->
  <section class="py-5 bg-light">
    <div class="container py-lg-4">
      <div class="text-center mb-5">
        <h2 class="fw-bold text-brand-primary text-uppercase mb-2">Our Services</h2>
        <div class="section-divider"></div>
      </div>
      <div class="row g-4">
        @forelse($featuredServices as $item)
          <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm hover-shadow p-3">
              <div class="card-body">
                <div class="mb-4 text-brand-secondary">
                  <i class="bi bi-shield-check display-5"></i>
                </div>
                <h5 class="fw-bold text-brand-primary mb-3">{{ $item->title }}</h5>
                <p class="text-muted small mb-4">Professional transportation planning and engineering services tailored to your needs.</p>
                <div class="d-flex align-items-center text-brand-secondary">
                    <span class="small fw-bold">LEARN MORE</span>
                    <i class="bi bi-arrow-right ms-2"></i>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center text-muted py-5">
            <p>Services information coming soon.</p>
          </div>
        @endforelse
      </div>
      <div class="text-center mt-5">
          <a href="{{ route('services') }}" class="btn btn-outline-primary px-5 rounded-pill fw-bold">SEE ALL SERVICES</a>
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section class="py-5">
    <div class="container py-lg-4">
      <div class="text-center mb-5">
        <h2 class="fw-bold text-brand-primary text-uppercase mb-2">Project Experience</h2>
        <div class="section-divider"></div>
      </div>
      <div class="row g-4">
          @forelse($featuredProjects as $project)
            <div class="col-lg-4 col-md-6">
              <div class="card h-100 border-0 shadow-sm overflow-hidden bg-brand-primary text-white hover-shadow">
                <div class="bg-secondary bg-opacity-10 py-5 text-center">
                    <i class="bi bi-geometry text-white opacity-25" style="font-size: 4rem;"></i>
                </div>
                <div class="card-body p-4">
                  <div class="small text-brand-secondary mb-2 fw-bold">{{ $project->category->name ?? 'PROJECT' }}</div>
                  <h5 class="fw-bold mb-3">{{ $project->title }}</h5>
                  @if($project->location)
                    <div class="small text-white-50 mb-3">
                        <i class="bi bi-geo-alt me-2"></i>{{ $project->location }}
                    </div>
                  @endif
                  <a href="{{ route('projects.show', $project) }}" class="btn btn-link text-brand-secondary p-0 fw-bold text-decoration-none">
                    DETAILS <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center text-muted py-5">
              <p>Projects coming soon.</p>
            </div>
          @endforelse
      </div>
      <div class="text-center mt-5">
          <a href="{{ route('projects') }}" class="btn btn-outline-primary px-5 rounded-pill fw-bold">EXPLORE PROJECTS</a>
      </div>
    </div>
  </section>
@endsection
