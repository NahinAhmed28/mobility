<footer style="background: linear-gradient(to right, #1e2d5a 0%, #2d4a7e 100%);" class="text-white py-5 mt-5">
  <div class="container">
    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <h5 class="mb-3">{{ $company->name ?? 'Mobility Unlimited' }}</h5>
        <p class="text-light">{{ $company->tagline ?? 'Transportation Planning & Engineering Solutions' }}</p>
      </div>
      <div class="col-md-4">
        <h6 class="mb-3">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="{{ route('services') }}" class="text-light text-decoration-none"><i class="bi bi-arrow-right me-2"></i>Services</a></li>
          <li><a href="{{ route('projects') }}" class="text-light text-decoration-none"><i class="bi bi-arrow-right me-2"></i>Projects</a></li>
          <li><a href="{{ route('about') }}" class="text-light text-decoration-none"><i class="bi bi-arrow-right me-2"></i>About Us</a></li>
          <li><a href="{{ route('contact') }}" class="text-light text-decoration-none"><i class="bi bi-arrow-right me-2"></i>Contact</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="mb-3">Contact Info</h6>
        <p class="text-light mb-1"><i class="bi bi-telephone me-2"></i>{{ $contact->phone ?? '+880-1-XXXX-XXXX' }}</p>
        <p class="text-light mb-1"><i class="bi bi-envelope me-2"></i>{{ $contact->email ?? 'info@mobilityunlimited.com' }}</p>
        <p class="text-light"><i class="bi bi-geo-alt me-2"></i>{{ $contact->address ?? 'Bangladesh' }}</p>
      </div>
    </div>
    <hr class="border-light">
    <div class="text-center text-light text-opacity-75 small">
      <p>&copy; {{ date('Y') }} {{ $company->name ?? 'Mobility Unlimited' }}. All rights reserved.</p>
    </div>
  </div>
</footer>
