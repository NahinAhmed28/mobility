@extends('public.layouts.app')

@section('content')
  <!-- Contact Header -->
  <section class="page-header py-5" style="background: linear-gradient(135deg, #1e2d5a 0%, #2d4a7e 100%);">
    <div class="container">
      <h1 class="display-4 fw-bold text-white">Contact Us</h1>
      <p class="lead text-light">Get in touch with our team for inquiries and support</p>
    </div>
  </section>

  <!-- Contact Content -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-lg-6">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <h3 class="card-title mb-4">Send us a Message</h3>
              
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <form method="post" action="{{ route('contact.store') }}" class="needs-validation" novalidate>
                @csrf
                
                <div class="mb-3">
                  <label class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label">Email Address <span class="text-danger">*</span></label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label">Phone Number</label>
                  <input type="tel" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                  <label class="form-label">Message <span class="text-danger">*</span></label>
                  <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5" required></textarea>
                  @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">
                  <i class="bi bi-send me-2"></i>Send Message
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Contact Information -->
        <div class="col-lg-6">
          <!-- Contact Details Card -->
          <div class="card h-100 border-0 shadow-sm mb-4">
            <div class="card-body p-4">
              <h3 class="card-title mb-4">Get in Touch</h3>
              
              <div class="mb-4">
                <h6 class="mb-2"><i class="bi bi-telephone text-accent me-2"></i>Phone</h6>
                <p>
                  <a href="tel:{{ $contact->phone ?? '' }}" class="text-decoration-none">
                    {{ $contact->phone ?? 'Phone number not available' }}
                  </a>
                </p>
              </div>

              <div class="mb-4">
                <h6 class="mb-2"><i class="bi bi-envelope text-accent me-2"></i>Email</h6>
                <p>
                  <a href="mailto:{{ $contact->email ?? '' }}" class="text-decoration-none">
                    {{ $contact->email ?? 'Email not available' }}
                  </a>
                </p>
              </div>

              <div class="mb-4">
                <h6 class="mb-2"><i class="bi bi-geo-alt text-accent me-2"></i>Address</h6>
                <p>{{ $contact->address ?? 'Address not available' }}</p>
              </div>

              <hr>

              <h6 class="mb-3">Business Hours</h6>
              <p class="text-muted small mb-1">Monday - Friday: 9:00 AM - 6:00 PM</p>
              <p class="text-muted small">Saturday & Sunday: Closed</p>
            </div>
          </div>

          <!-- QR Code Card -->
          @if($contact->qr_image_path)
            <div class="card h-100 border-0 shadow-sm">
              <div class="card-body p-4 text-center">
                <h6 class="card-title mb-3">Quick Connect</h6>
                <img src="{{ $contact->qr_image_path }}" alt="QR Code" class="img-fluid rounded" style="max-width: 200px;">
                <p class="text-muted small mt-3">Scan to contact us directly</p>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>

  <!-- Map Placeholder (Optional) -->
  <section class="py-5 bg-light">
    <div class="container">
      <h3 class="text-center section-title mb-4">Find Us</h3>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="bg-dark rounded" style="height: 400px; display: flex; align-items: center; justify-content: center;">
            <div class="text-white text-center">
              <i class="bi bi-map" style="font-size: 3rem;"></i>
              <p class="mt-3">Map integration coming soon</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
