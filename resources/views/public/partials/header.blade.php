<nav class="navbar navbar-expand-lg navbar-dark bg-brand-primary py-3 shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
      @php $logo = $company->logo_path ?? null; @endphp
      @if($logo)
        @php
            $logoUrl = Str::startsWith($logo, 'http') ? $logo : asset('storage/' . $logo);
        @endphp
        <img src="{{ $logoUrl }}" alt="Logo" height="40" class="d-inline-block align-text-top me-2">
      @else
        <div class="logo-m me-2">M</div>
      @endif
      <span class="fw-bold fs-4 tracking-tight">MOBILITY <span class="text-brand-secondary">UNLIMITED</span></span>
    </a>
    
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto gap-lg-3 mt-3 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-semibold text-uppercase small {{ Route::is('about*') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-uppercase small" href="{{ route('services') }}">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-uppercase small {{ Route::is('projects*') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-uppercase small {{ Route::is('recent-projects*') ? 'active' : '' }}" href="{{ route('recent-projects') }}">Recent Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-uppercase small {{ Route::is('software*') ? 'active' : '' }}" href="{{ route('software') }}">Software</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-uppercase small" href="{{ route('contact') }}">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
