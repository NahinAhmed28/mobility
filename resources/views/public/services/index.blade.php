@extends('public.layouts.app')

@section('content')
  <!-- Services Header -->
  <section class="page-header bg-dark text-white py-5">
    <div class="container">
      <h1 class="display-4 fw-bold">Services We Offer</h1>
      <p class="lead text-light">Comprehensive transportation planning and engineering solutions</p>
    </div>
  </section>

  <!-- Services Content -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        @forelse($services as $cat)
          <div class="col-lg-6">
            <div class="service-detail-card card h-100 border-0 shadow-sm hover-lift">
              <div class="card-body p-4">
                <div class="d-flex align-items-start mb-3">
                  <div class="service-number me-3">{{ $loop->index + 1 }}</div>
                  <div>
                    <h4 class="card-title m-0">{{ $cat->name }}</h4>
                  </div>
                </div>
                <ul class="service-list list-unstyled ms-5">
                  @forelse($cat->items as $item)
                    <li class="mb-2">
                      <i class="bi bi-check-circle-fill text-accent me-2"></i>
                      <strong>{{ $item->title }}</strong>
                    </li>
                  @empty
                    <li class="text-muted">No services in this category</li>
                  @endforelse
                </ul>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center text-muted py-5">
            <i class="bi bi-inbox" style="font-size: 3rem;"></i>
            <p class="mt-3">Services information is being prepared.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section py-5" style="background: linear-gradient(135deg, #1e2d5a 0%, #2d4a7e 100%);">
    <div class="container text-center text-white">
      <h2 class="mb-3">Need Transportation Planning Services?</h2>
      <p class="lead mb-4">Get in touch with our team to discuss your project requirements</p>
      <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-envelope me-2"></i>Contact Us Today
      </a>
    </div>
  </section>
@endsection
