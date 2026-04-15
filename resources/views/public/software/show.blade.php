@extends('public.layouts.app')

@section('content')
  <!-- Navigation / Back Button -->
  <section class="py-3 border-bottom bg-light">
    <div class="container">
      <a href="{{ route('software') }}" class="btn btn-sm btn-outline-primary rounded-pill fw-bold">
        <i class="bi bi-arrow-left me-2"></i>BACK TO SOFTWARE
      </a>
    </div>
  </section>

  <!-- Software Header -->
  <section class="py-5 bg-brand-primary text-white">
    <div class="container py-lg-4">
      <div class="row align-items-center">
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold mb-3 text-uppercase">{{ $product->title }}</h1>
            <div class="d-flex flex-wrap gap-4 text-brand-secondary small fw-bold">
                <span><i class="bi bi-tag-fill me-2"></i>{{ $product->category->name }}</span>
                <span><i class="bi bi-cpu me-2"></i>PROFESSIONAL EDITION</span>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Software Content -->
  <section class="py-5">
    <div class="container py-lg-4">
      <div class="row g-5">
        <div class="col-lg-8">
          <h3 class="fw-bold text-brand-primary mb-4 text-uppercase">Software Overview</h3>
          <div class="content-section card border-0 shadow-sm p-4 p-lg-5 transition-hover">
            {!! $product->details_text ?? '<p class="text-muted">No detailed information available for this product.</p>' !!}
          </div>
          
          <!-- Software Images Carousel -->
          @if($product->images->count())
            <div class="mt-5">
                <h4 class="fw-bold text-brand-primary mb-4 text-uppercase">Software Gallery</h4>
                <div id="softCarousel" class="carousel slide shadow-sm rounded overflow-hidden" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    @foreach($product->images as $i => $img)
                      <div class="carousel-item @if($i==0) active @endif">
                        @php
                          $imgPath = $img->image_path;
                          $imgUrl = Str::startsWith($imgPath, 'http') ? $imgPath : asset('storage/' . $imgPath);
                        @endphp
                        <img src="{{ $imgUrl }}" class="d-block w-100" alt="{{ $product->title }}" style="max-height: 500px; object-fit: cover;">
                      </div>
                    @endforeach
                  </div>
                  @if($product->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#softCarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon bg-brand-primary rounded-circle p-2"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#softCarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon bg-brand-primary rounded-circle p-2"></span>
                    </button>
                  @endif
                </div>
            </div>
          @endif
        </div>
        
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
            <div class="card-body p-4">
              <h5 class="fw-bold text-brand-primary mb-4 border-bottom pb-2 uppercase">Request Information</h5>
              <p class="text-muted small mb-4">
                Interested in obtaining a license for {{ $product->title }} or seeking specialized training? Reach out to our team of experts for professional guidance and technical support.
              </p>
              
              <div class="d-grid gap-3">
                <a href="{{ route('contact') }}" class="btn btn-secondary btn-lg py-3 fw-bold rounded-pill shadow-sm transition-all d-flex align-items-center justify-content-center">
                    <i class="bi bi-chat-dots-fill me-2 fs-5"></i> CONTACT US FOR QUOTE
                </a>
                <div class="text-center">
                    <span class="text-muted small">Standardized for Industry Professional Use</span>
                </div>
              </div>
            </div>
          </div>

          <div class="card border-0 shadow-sm rounded-4 p-4 bg-light border-start border-4 border-brand-secondary mt-4">
            <h6 class="fw-bold text-brand-primary mb-2">Implementation Expert</h6>
            <p class="text-muted x-small mb-0">Our engineering team provides full implementation and Modelling audits to ensure your software is yielding high-precision results for your transport projects.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-brand-primary text-white text-center">
    <div class="container">
      <h2 class="mb-3 text-uppercase fw-bold">Need Specialized Software?</h2>
      <p class="lead mb-4 text-white-50">Discovery how our Modelling solutions can transform your project's efficiency.</p>
      <a href="{{ route('contact') }}" class="btn btn-secondary btn-lg px-5 rounded-pill fw-bold">EXPLORE MORE SOLUTIONS</a>
    </div>
  </section>
@endsection
