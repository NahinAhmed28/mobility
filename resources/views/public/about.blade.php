@extends('public.layouts.app')

@section('content')
  <!-- About Header -->
  <section class="page-header py-5" style="background: linear-gradient(135deg, #1e2d5a 0%, #2d4a7e 100%);">
    <div class="container">
      <h1 class="display-4 fw-bold text-white">About Us</h1>
      <p class="lead text-light">Learn about our mission, values, and vision</p>
    </div>
  </section>

  <!-- About Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="content-section">
            {!! $company->about_html ?? '<p class="text-muted">About content is being prepared. Please check back soon.</p>' !!}
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Values Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center section-title mb-5">Our Core Values</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="text-center">
            <div class="service-icon mb-3">
              <i class="bi bi-compass"></i>
            </div>
            <h5>Excellence</h5>
            <p class="text-muted">We strive for excellence in every project and interaction.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="text-center">
            <div class="service-icon mb-3">
              <i class="bi bi-people"></i>
            </div>
            <h5>Collaboration</h5>
            <p class="text-muted">We believe in working closely with our clients and partners.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="text-center">
            <div class="service-icon mb-3">
              <i class="bi bi-lightbulb"></i>
            </div>
            <h5>Innovation</h5>
            <p class="text-muted">We continuously innovate to deliver better solutions.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section py-5" style="background: linear-gradient(135deg, #1e2d5a 0%, #2d4a7e 100%);">
    <div class="container text-center text-white">
      <h2 class="mb-3">Ready to Work With Us?</h2>
      <p class="lead mb-4">Let's discuss how we can help you achieve your transportation goals</p>
      <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-envelope me-2"></i>Contact Us Now
      </a>
    </div>
  </section>
@endsection
