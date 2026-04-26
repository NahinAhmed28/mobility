@extends('public.layouts.app')

@section('content')
  <!-- Recent Projects Header -->
  <section class="page-header py-5 bg-brand-primary text-white">
    <div class="container">
      <h1 class="display-4 fw-bold text-uppercase">Recent Projects</h1>
      <p class="lead text-brand-secondary fw-bold">Our Latest Work & Achievements</p>
    </div>
  </section>

  <!-- Recent Projects List -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        @forelse($projects as $p)
          <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow">
              <div class="card-body p-4 d-flex flex-column flex-xl-row gap-3 gap-xl-4 text-center text-xl-start">
                <div class="d-none d-sm-flex align-items-center justify-content-center bg-light rounded text-brand-primary mx-auto mx-xl-0" style="width: 80px; height: 80px; min-width: 80px">
                  <i class="bi bi-building display-6"></i>
                </div>
                <div>
                  <h5 class="fw-bold text-brand-primary mb-1">{{ $p->title }}</h5>
                  @if($p->serviceCategory)
                    <div class="mb-2">
                      <span class="badge bg-brand-secondary text-white small fw-semibold">{{ $p->serviceCategory->name }}</span>
                    </div>
                  @endif
                  @if($p->location)
                    <div class="text-muted small mb-2">
                      <i class="bi bi-geo-alt me-1"></i> {{ $p->location }}
                    </div>
                  @endif
                  <p class="card-text text-muted small mb-3">{{ Str::limit($p->description ?? 'Project details coming soon.', 120) }}</p>
                  <a href="{{ route('projects.show', $p) }}" class="btn btn-outline-primary btn-sm rounded-pill fw-bold">
                    VIEW DETAILS <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="text-center py-5 text-muted">
              <i class="bi bi-folder2-open display-4 d-block mb-3"></i>
              <p class="lead">No recent projects to display yet.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
