@extends('public.layouts.app')

@section('content')
  <!-- Projects Header -->
  <section class="page-header py-5 bg-brand-primary text-white">
    <div class="container">
      <h1 class="display-4 fw-bold text-uppercase">Project Experience</h1>
      <p class="lead text-brand-secondary fw-bold">Delivering Success Across the Globe</p>
    </div>
  </section>

  <!-- Projects List -->
  <section class="py-5">
    <div class="container">
      @foreach($categories as $cat)
        <div class="mb-5">
            <h2 class="fw-bold text-brand-primary text-uppercase mb-4 h4">
                <i class="bi bi-folder2-open me-2 text-brand-secondary"></i>{{ $cat->name }}
            </h2>
            <div class="row g-4">
              @forelse($cat->projects as $p)
                <div class="col-lg-6">
                  <div class="card h-100 border-0 shadow-sm hover-shadow">
                    <div class="card-body p-4 d-flex gap-4">
                      <div class="d-none d-sm-flex align-items-center justify-content-center bg-light rounded text-brand-primary" style="width: 80px; height: 80px; min-width: 80px">
                        <i class="bi bi-building display-6"></i>
                      </div>
                      <div>
                        <h5 class="fw-bold text-brand-primary mb-2">{{ $p->title }}</h5>
                        @if($p->location)
                          <div class="text-muted small mb-3">
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
                <div class="col-12 text-muted small">No projects listed in this category.</div>
              @endforelse
            </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
