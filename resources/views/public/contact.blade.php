@extends('public.layouts.app')

@section('content')
  <!-- Contact Header -->
  <section class="page-header py-5 bg-brand-primary text-white">
    <div class="container py-lg-4">
      <h1 class="display-4 fw-bold text-uppercase">Contact Us</h1>
      <p class="lead text-brand-secondary fw-bold">Get in touch with our team for inquiries and support</p>
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

              <div class="card border-0 shadow-sm p-4 hover-shadow">
                  <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="name" class="form-label small fw-bold text-brand-primary">YOUR NAME</label>
                        <input type="text" class="form-control bg-light @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label small fw-bold text-brand-primary">EMAIL ADDRESS</label>
                        <input type="email" class="form-control bg-light @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                      <div class="col-12">
                        <label for="subject" class="form-label small fw-bold text-brand-primary">SUBJECT</label>
                        <input type="text" class="form-control bg-light @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                        @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                      <div class="col-12">
                        <label for="message" class="form-label small fw-bold text-brand-primary">MESSAGE</label>
                        <textarea class="form-control bg-light @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                      <div class="col-12 text-end">
                        <button type="submit" class="btn btn-secondary px-5 py-2 fw-bold shadow">
                          SEND MESSAGE <i class="bi bi-send ms-2"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-5">
          <div class="d-grid gap-4">
            <!-- Info Cards -->
            <div class="card border-0 shadow-sm p-4 hover-shadow">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-brand-secondary text-brand-primary rounded p-3">
                  <i class="bi bi-geo-alt fs-4"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-brand-primary mb-1">Our Location</h6>
                  <p class="text-muted small mb-0">{{ $company->address ?? 'Address not available' }}</p>
                </div>
              </div>
            </div>
            
            <div class="card border-0 shadow-sm p-4 hover-shadow">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-brand-secondary text-brand-primary rounded p-3">
                  <i class="bi bi-telephone fs-4"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-brand-primary mb-1">Call Us</h6>
                  <p class="text-muted small mb-0">{{ $company->phone ?? 'Phone number not available' }}</p>
                </div>
              </div>
            </div>

            <div class="card border-0 shadow-sm p-4 hover-shadow">
              <div class="d-flex align-items-center gap-3">
                <div class="bg-brand-secondary text-brand-primary rounded p-3">
                  <i class="bi bi-envelope fs-4"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-brand-primary mb-1">Email Support</h6>
                  <p class="text-muted small mb-0">{{ $company->email ?? 'Email not available' }}</p>
                </div>
              </div>
            </div>

            <!-- Business Hours -->
            <div class="card border-0 shadow-sm bg-brand-primary text-white p-4">
              <h6 class="fw-bold text-brand-secondary mb-3 text-uppercase">Business Hours</h6>
              <ul class="list-unstyled d-grid gap-2 small mb-0">
                <li class="d-flex justify-content-between border-bottom border-white border-opacity-10 pb-2">
                  <span>Monday - Friday</span>
                  <span>9:00 AM - 6:00 PM</span>
                </li>
                <li class="d-flex justify-content-between pt-1">
                  <span>Saturday - Sunday</span>
                  <span class="text-brand-secondary">Closed</span>
                </li>
              </ul>
            </div>
          </div>
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
