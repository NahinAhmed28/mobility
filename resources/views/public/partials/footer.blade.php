<footer class="bg-brand-primary text-white py-5 mt-auto">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <h5 class="fw-bold text-brand-secondary text-uppercase mb-4">{{ $company->name ?? 'Mobility Unlimited' }}</h5>
        <p class="text-white-50 small mb-4">{{ $company->intro ?? 'Specialist transport planning and engineering consultancy.' }}</p>
        <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"><i class="bi bi-facebook"></i></a>
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"><i class="bi bi-twitter-x"></i></a>
        </div>
      </div>
      <div class="col-lg-2 ms-lg-auto">
        <h6 class="fw-bold mb-4">QUICK LINKS</h6>
        <ul class="list-unstyled d-grid gap-2 small">
          <li><a href="{{ route('services') }}" class="text-white-50 text-decoration-none">Services</a></li>
          <li><a href="{{ route('projects') }}" class="text-white-50 text-decoration-none">Projects</a></li>
          <li><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">About Us</a></li>
          <li><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h6 class="fw-bold mb-4">CONTACT US</h6>
        <div class="d-grid gap-3 small text-white-50">
          <div class="d-flex align-items-start gap-2">
            <i class="bi bi-geo-alt text-brand-secondary"></i>
            <span>{{ $contact->address ?? 'Dhaka, Bangladesh' }}</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-telephone text-brand-secondary"></i>
            <span>{{ $contact->phone ?? '' }}</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-envelope text-brand-secondary"></i>
            <span>{{ $contact->email ?? '' }}</span>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-5 border-white opacity-10">
    <div class="text-center text-white-50 small">
      &copy; {{ date('Y') }} {{ $company->name ?? 'Mobility Unlimited' }}. All rights reserved.
    </div>
  </div>
</footer>
