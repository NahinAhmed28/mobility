@extends('public.layouts.app')

@section('content')
  <!-- Hero Section - Matching Reference Aesthetics -->
  @php
    $heroImage = $company->hero_image_path ?? '';
    $heroUrl = $heroImage ? (Str::startsWith($heroImage, 'http') ? $heroImage : asset('storage/' . $heroImage)) : '';
    $logo = $company->logo_path ?? null; 
    $logoUrl = $logo ? (Str::startsWith($logo, 'http') ? $logo : asset('storage/' . $logo)) : null;
  @endphp
  <div class="hero-section" style="{{ $heroUrl ? 'background-image: linear-gradient(rgba(26, 45, 90, 0.7), rgba(26, 45, 90, 0.7)), url(' . $heroUrl . '); background-size: cover; background-position: center;' : '' }}">
    <div class="container py-lg-5">
      <div class="row align-items-center g-5">
        <div class="col-lg-7 text-start">
              <img src="{{ asset('storage/media/mobility_unlimited_white.png') }}" alt="Mobility Unlimited" class="img-fluid" style="max-height: 140px; object-fit: contain;">
          <p class="lead mb-5 text-white-50">{{ $company->tagline }}</p>
          <div class="d-flex gap-3 flex-wrap">
            <a class="btn btn-secondary btn-lg px-5 py-3 fw-bold rounded-pill shadow" href="{{ route('services') }}">OUR SERVICES</a>
            <a class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill" href="{{ route('projects') }}">VIEW PROJECTS</a>
          </div>
        </div>
        <div class="col-lg-5 d-none d-lg-flex justify-content-center mt-5 mt-lg-0">
            <div class="hero-graphic-circle d-flex align-items-center justify-content-center overflow-hidden">
                @if($logoUrl)
                    <img src="{{ $logoUrl }}" alt="{{ $company->name }}" class="img-fluid" style="max-height: 90%; width: 90%; object-fit: contain;">
                @else
                    <div class="hero-brand-logo">M</div>
                @endif
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services Section -->
  <section class="py-5 bg-light" id="services-section">
    <div class="container py-lg-4">
      <div class="text-center mb-5">
        <h2 class="fw-bold text-brand-primary text-uppercase mb-2">Our Services</h2>
        <div class="section-divider"></div>
      </div>
      <div class="row g-4">
        @forelse($services->take(6) as $category)
          <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm hover-shadow p-3 cursor-pointer" 
                 data-bs-toggle="modal" 
                 data-bs-target="#serviceModal"
                 data-service-title="{{ $category->name }}"
                 data-service-items="{{ json_encode($category->items->pluck('title')) }}">
              <div class="card-body">
                <div class="mb-4 text-brand-secondary">
                  <i class="bi bi-shield-check display-5"></i>
                </div>
                <h5 class="fw-bold text-brand-primary mb-3">{{ $category->name }}</h5>
                <p class="text-muted small mb-4">{{ $category->description ?? 'Professional transportation planning and engineering services tailored to your needs.' }}</p>
                <div class="d-flex align-items-center text-brand-secondary">
                    <span class="small fw-bold">LEARN MORE</span>
                    <i class="bi bi-arrow-right ms-2"></i>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center text-muted py-5">
            <p>Services information coming soon.</p>
          </div>
        @endforelse
      </div>
      <div class="text-center mt-5">
          <a href="{{ route('services') }}" class="btn btn-outline-primary px-5 rounded-pill fw-bold">SEE ALL SERVICES</a>
      </div>
    </div>
  </section>

  <!-- Service Details Modal -->
  <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
        <div class="modal-header bg-brand-primary text-white border-0">
          <h5 class="modal-title fw-bold" id="serviceModalLabel">Service Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div id="service-items-container">
            <!-- Items will be populated here by JS -->
          </div>
        </div>
        <div class="modal-footer border-0 p-4 pt-0">
          <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
          <a href="{{ route('contact') }}" class="btn btn-primary rounded-pill px-4">Inquire Now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Projects Section -->
  <section class="py-5">
    <div class="container py-lg-4">
      <div class="text-center mb-5">
        <h2 class="fw-bold text-brand-primary text-uppercase mb-2">Recent Projects</h2>
        <div class="section-divider"></div>
      </div>
      <div class="row g-4">
          @forelse($recentProjects as $project)
            <div class="col-lg-4 col-md-6">
              <div class="card h-100 border-0 shadow-sm overflow-hidden bg-brand-primary text-white hover-shadow">
                <div class="bg-secondary bg-opacity-10 py-5 text-center">
                    <i class="bi bi-geometry text-white opacity-25" style="font-size: 4rem;"></i>
                </div>
                <div class="card-body p-4">
                  <div class="small text-brand-secondary mb-2 fw-bold">{{ $project->serviceCategory->name ?? 'PROJECT' }}</div>
                  <h5 class="fw-bold mb-3">{{ $project->title }}</h5>
                  @if($project->location)
                    <div class="small text-white-50 mb-3">
                        <i class="bi bi-geo-alt me-2"></i>{{ $project->location }}
                    </div>
                  @endif
                  <a href="{{ route('projects.show', $project) }}" class="btn btn-link text-brand-secondary p-0 fw-bold text-decoration-none">
                    DETAILS <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center text-muted py-5">
              <p>Projects coming soon.</p>
            </div>
          @endforelse
      </div>
      <div class="text-center mt-5">
          <a href="{{ route('recent-projects') }}" class="btn btn-outline-primary px-5 rounded-pill fw-bold">EXPLORE PROJECTS</a>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceModal = document.getElementById('serviceModal');
        if (serviceModal) {
            serviceModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const title = button.getAttribute('data-service-title');
                const itemsStr = button.getAttribute('data-service-items');
                const items = JSON.parse(itemsStr || '[]');

                const modalTitle = serviceModal.querySelector('.modal-title');
                const itemsContainer = serviceModal.querySelector('#service-items-container');

                modalTitle.textContent = title;
                
                if (items.length > 0) {
                    let html = '<ul class="list-group list-group-flush">';
                    items.forEach(item => {
                        html += `
                            <li class="list-group-item border-0 d-flex align-items-start px-0 bg-transparent mb-2">
                                <i class="bi bi-patch-check-fill text-brand-secondary me-3 mt-1"></i>
                                <span>${item}</span>
                            </li>
                        `;
                    });
                    html += '</ul>';
                    itemsContainer.innerHTML = html;
                } else {
                    itemsContainer.innerHTML = `
                        <div class="text-center py-4">
                            <i class="bi bi-info-circle text-muted display-4 mb-3"></i>
                            <p class="text-muted mb-0">No specific service items are listed for this category yet. Please contact us for more information.</p>
                        </div>
                    `;
                }
            });
        }
    });
  </script>
@endsection
