@extends('public.layouts.app')

@section('content')
  <!-- Navigation / Back Button -->
  <section class="py-3 border-bottom bg-light">
    <div class="container">
      <a href="{{ route('projects') }}" class="btn btn-sm btn-outline-primary rounded-pill fw-bold">
        <i class="bi bi-arrow-left me-2"></i>BACK TO PROJECTS
      </a>
    </div>
  </section>

  <!-- Project Header -->
  <section class="py-5 bg-brand-primary text-white">
    <div class="container py-lg-4">
      <div class="row align-items-center">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold mb-3 text-uppercase">{{ $project->title }}</h1>
            <div class="d-flex flex-wrap gap-4 text-brand-secondary small fw-bold">
                @if($project->location) <span><i class="bi bi-geo-alt me-2"></i>{{ $project->location }}</span> @endif
                @if($project->year) <span><i class="bi bi-calendar-event me-2"></i>{{ $project->year }}</span> @endif
                @if($project->category) <span><i class="bi bi-folder me-2"></i>{{ $project->category->name }}</span> @endif
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Project Content -->
  <section class="py-5">
    <div class="container py-lg-4">
      <div class="row g-5">
        <div class="col-lg-8">
          <h3 class="fw-bold text-brand-primary mb-4 text-uppercase">Project Overview</h3>
          <div class="content-section card border-0 shadow-sm p-4 p-lg-5 transition-hover">
            {!! $project->description ?? '<p class="text-muted">No description available for this project.</p>' !!}
          </div>
          
          <!-- Project Images Carousel -->
          @if($project->images->count())
            <div class="mt-5">
                <h4 class="fw-bold text-brand-primary mb-4 text-uppercase">Project Gallery</h4>
                <div id="projCarousel" class="carousel slide shadow-sm rounded overflow-hidden" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    @foreach($project->images as $i => $img)
                      <div class="carousel-item @if($i==0) active @endif">
                        <img src="{{ $img->image_path }}" class="d-block w-100" alt="{{ $project->title }}" style="max-height: 500px; object-fit: cover;">
                      </div>
                    @endforeach
                  </div>
                  @if($project->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#projCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#projCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </button>
                  @endif
                </div>
            </div>
          @endif
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h5 class="fw-bold text-brand-primary mb-4 border-bottom pb-2">PROJECT DETAILS</h5>
              <div class="d-grid gap-4">
                @if($project->client)
                  <div>
                    <label class="small text-muted fw-bold text-uppercase d-block mb-1">Client</label>
                    <div class="d-flex align-items-center gap-2 text-brand-primary fw-bold">
                        <i class="bi bi-building"></i> {{ $project->client }}
                    </div>
                  </div>
                @endif
                @if($project->location)
                  <div>
                    <label class="small text-muted fw-bold text-uppercase d-block mb-1">Location</label>
                    <div class="d-flex align-items-center gap-2 text-brand-primary fw-bold">
                        <i class="bi bi-geo-alt"></i> {{ $project->location }}
                    </div>
                  </div>
                @endif
                @if($project->year)
                  <div>
                    <label class="small text-muted fw-bold text-uppercase d-block mb-1">Year</label>
                    <div class="d-flex align-items-center gap-2 text-brand-primary fw-bold">
                        <i class="bi bi-calendar-event"></i> {{ $project->year }}
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-brand-primary text-white text-center">
    <div class="container">
      <h2 class="mb-3 text-uppercase fw-bold">Interested in Similar Services?</h2>
      <p class="lead mb-4 text-white-50">Let's discuss how we can help with your transportation project.</p>
      <a href="{{ route('contact') }}" class="btn btn-secondary btn-lg px-5 rounded-pill fw-bold">GET IN TOUCH</a>
    </div>
  </section>
@endsection
