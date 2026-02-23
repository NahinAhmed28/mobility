@extends('public.layouts.app')

@section('content')
  <!-- Back Button -->
  <section class="py-3 border-bottom">
    <div class="container">
      <a href="{{ route('projects') }}" class="btn btn-sm btn-outline-primary">
        <i class="bi bi-arrow-left me-2"></i>Back to Projects
      </a>
    </div>
  </section>

  <!-- Project Header -->
  <section class="py-5 bg-light">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">{{ $project->title }}</h1>
      <div class="row g-4 mb-4">
        @if($project->location)
          <div class="col-md-3">
            <p class="text-muted mb-1"><strong>Location</strong></p>
            <p><i class="bi bi-geo-alt text-accent"></i> {{ $project->location }}</p>
          </div>
        @endif
        @if($project->year)
          <div class="col-md-3">
            <p class="text-muted mb-1"><strong>Year</strong></p>
            <p><i class="bi bi-calendar-event text-accent"></i> {{ $project->year }}</p>
          </div>
        @endif
        @if($project->client)
          <div class="col-md-3">
            <p class="text-muted mb-1"><strong>Client</strong></p>
            <p><i class="bi bi-building text-accent"></i> {{ $project->client }}</p>
          </div>
        @endif
        @if($project->category)
          <div class="col-md-3">
            <p class="text-muted mb-1"><strong>Category</strong></p>
            <p><i class="bi bi-folder text-accent"></i> {{ $project->category->name }}</p>
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- Project Description -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h3 class="mb-3">Project Overview</h3>
          <div class="content-section">
            {!! $project->description ?? '<p class="text-muted">No description available for this project.</p>' !!}
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h5 class="card-title mb-3">Project Details</h5>
              <ul class="list-unstyled">
                @if($project->location)
                  <li class="mb-2"><i class="bi bi-geo-alt text-accent me-2"></i><strong>{{ $project->location }}</strong></li>
                @endif
                @if($project->year)
                  <li class="mb-2"><i class="bi bi-calendar-event text-accent me-2"></i><strong>{{ $project->year }}</strong></li>
                @endif
                @if($project->category)
                  <li class="mb-2"><i class="bi bi-folder text-accent me-2"></i><strong>{{ $project->category->name }}</strong></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Project Images Carousel -->
  @if($project->images->count())
    <section class="py-5 bg-light">
      <div class="container">
        <h3 class="mb-4">Project Gallery</h3>
        <div id="projCarousel" class="carousel slide shadow-md" data-bs-ride="carousel">
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
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#projCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="visually-hidden">Next</span>
            </button>
          @endif
        </div>
      </div>
    </section>
  @endif

  <!-- CTA Section -->
  <section class="cta-section py-5" style="background: linear-gradient(135deg, #1e2d5a 0%, #2d4a7e 100%);">
    <div class="container text-center text-white">
      <h2 class="mb-3">Interested in Similar Services?</h2>
      <p class="lead mb-4">Let's discuss how we can help with your transportation project</p>
      <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-envelope me-2"></i>Get in Touch
      </a>
    </div>
  </section>
@endsection
