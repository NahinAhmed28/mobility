@extends('public.layouts.app')

@section('content')
  <!-- About Header -->
  <section class="page-header py-5 bg-brand-primary">
    <div class="container py-lg-4">
      <h1 class="display-4 fw-bold text-white text-uppercase">About Us</h1>
      <p class="lead text-brand-secondary fw-bold">Learn about our mission, values, and vision</p>
    </div>
  </section>

  <!-- About Content -->
  <section class="py-5">
    <div class="container py-lg-4">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="content-section card border-0 shadow-sm p-4 p-lg-5 transition-hover">
            {!! $company->about_html ?? '<p class="text-muted">About content is being prepared. Please check back soon.</p>' !!}
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="py-5 bg-light">
    <div class="container py-lg-4">
      <div class="text-center mb-5">
        <h2 class="fw-bold text-brand-primary text-uppercase mb-2">Our Core Values</h2>
        <div class="section-divider"></div>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm p-4 text-center hover-shadow">
            <div class="bg-brand-secondary text-brand-primary rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px">
              <i class="bi bi-compass fs-3"></i>
            </div>
            <h5 class="fw-bold text-brand-primary mb-3">EXCELLENCE</h5>
            <p class="text-muted small mb-0">We strive for excellence in every project and interaction.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm p-4 text-center hover-shadow">
            <div class="bg-brand-secondary text-brand-primary rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px">
              <i class="bi bi-people fs-3"></i>
            </div>
            <h5 class="fw-bold text-brand-primary mb-3">COLLABORATION</h5>
            <p class="text-muted small mb-0">We believe in working closely with our clients and partners.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm p-4 text-center hover-shadow">
            <div class="bg-brand-secondary text-brand-primary rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px">
              <i class="bi bi-lightbulb fs-3"></i>
            </div>
            <h5 class="fw-bold text-brand-primary mb-3">INNOVATION</h5>
            <p class="text-muted small mb-0">We continuously innovate to deliver better solutions.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-brand-primary text-white text-center">
    <div class="container">
      <h2 class="mb-3 text-uppercase fw-bold">Ready to Work With Us?</h2>
      <p class="lead mb-4 text-white-50">Let's discuss how we can help you achieve your transportation goals.</p>
      <a href="{{ route('contact') }}" class="btn btn-secondary btn-lg px-5 rounded-pill fw-bold shadow">CONTACT US NOW</a>
    </div>
  </section>
@endsection
