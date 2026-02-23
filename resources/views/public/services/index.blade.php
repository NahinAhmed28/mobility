@extends('public.layouts.app')

@section('content')
  <!-- Services Header -->
  <section class="page-header bg-brand-primary text-white py-5">
    <div class="container">
      <h1 class="display-4 fw-bold text-uppercase">Our Services</h1>
      <p class="lead text-brand-secondary fw-bold">Comprehensive Transportation Planning & Engineering Solutions</p>
    </div>
  </section>

  <!-- Services Content -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        @forelse($services as $cat)
          <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm hover-shadow">
              <div class="card-body p-4">
                <div class="d-flex align-items-start mb-4">
                  <div class="bg-brand-secondary text-brand-primary fw-bold rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 32px; height: 32px; min-width: 32px">
                    {{ $loop->index + 1 }}
                  </div>
                  <div>
                    <h4 class="card-title m-0 text-brand-primary fw-bold text-uppercase">{{ $cat->name }}</h4>
                  </div>
                </div>
                <ul class="list-unstyled d-grid gap-3 ms-4 ms-lg-5">
                  @forelse($cat->items as $item)
                    <li class="d-flex align-items-start gap-2">
                      <i class="bi bi-check-circle-fill text-brand-secondary"></i>
                      <span class="text-dark small fw-medium">{{ $item->title }}</span>
                    </li>
                  @empty
                    <li class="text-muted small">No services in this category</li>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center text-muted py-5">
            <i class="bi bi-inbox display-4 mb-3"></i>
            <p>Services information is being prepared.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-brand-primary text-white text-center">
    <div class="container">
      <h2 class="mb-3 text-uppercase fw-bold">Ready to Get Started?</h2>
      <p class="lead mb-4 text-white-50">Contact our experts today to discuss your transportation project.</p>
      <a href="{{ route('contact') }}" class="btn btn-secondary btn-lg px-5 rounded-pill fw-bold">CONTACT US NOW</a>
    </div>
  </section>
@endsection
