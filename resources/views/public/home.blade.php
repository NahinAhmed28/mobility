@extends('public.layouts.app')

@section('content')
  <!-- Hero Section -->
  <div class="hero-section" style="background: linear-gradient(135deg, #1e2d5a 0%, #2d4a7e 100%);">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-white text-center">
          <h1 class="display-3 fw-bold mb-3">{{ $company->name }}</h1>
          <p class="lead mb-4 text-light">{{ $company->tagline }}</p>
          <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a class="btn btn-primary btn-lg" href="{{ route('services') }}"><i class="bi bi-briefcase me-2"></i>Our Services</a>
            <a class="btn btn-outline-light btn-lg" href="{{ route('projects') }}"><i class="bi bi-diagram-3 me-2"></i>View Projects</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services Section -->
  <section class="services-section py-5 bg-light">
    <div class="container">
      <h2 class="text-center section-title mb-5">Our Services</h2>
      <div class="row g-4">
        @forelse($services as $cat)
          <div class="col-lg-4 col-md-6">
            <div class="service-card card h-100 border-0 shadow-sm">
              <div class="card-body p-4">
                <div class="service-icon mb-3">
                  <i class="bi bi-gear-fill"></i>
                </div>
                <h5 class="card-title">{{ $cat->name }}</h5>
                <ul class="service-list list-unstyled">
                  @forelse($cat->items->take(3) as $item)
                    <li><i class="bi bi-check-circle-fill text-accent"></i> <span>{{ $item->title }}</span></li>
                  @empty
                    <li>No services available</li>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center text-muted">
            <p>Services information coming soon.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Projects Section -->
  <section class="projects-section py-5">
    <div class="container">
      <h2 class="text-center section-title mb-5">Project Experience</h2>
      <div class="row g-4">
        @forelse($projects as $cat)
          @forelse($cat->projects->take(3) as $project)
            <div class="col-lg-4 col-md-6">
              <div class="project-card card h-100 border-0 shadow-sm overflow-hidden">
                <div class="project-placeholder">
                  <div class="d-flex align-items-center justify-content-center h-100 bg-gradient">
                    <i class="bi bi-graph-up-arrow text-white" style="font-size: 3rem;"></i>
                  </div>
                </div>
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">{{ $project->title }}</h5>
                  @if($project->location)
                    <p class="text-muted small"><i class="bi bi-geo-alt"></i> {{ $project->location }}</p>
                  @endif
                  <p class="card-text text-muted flex-grow-1">Feasibility study, design and planning services for transportation infrastructure.</p>
                  <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm mt-auto">
                    <i class="bi bi-arrow-right me-2"></i>View Details
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        @empty
          <div class="col-12 text-center text-muted">
            <p>Projects coming soon.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
