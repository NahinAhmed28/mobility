<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #1e2d5a 0%, #2d4a7e 100%);">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}">
      @if(!empty($company->logo_path))
        <img src="{{ $company->logo_path }}" alt="{{ $company->name }}" style="height:36px; object-fit:contain; margin-right:10px">
      @else
        <i class="bi bi-graph-up me-2" style="font-size: 1.5rem;"></i>
      @endif
      <span>{{ $company->name ?? 'Mobility Unlimited' }}</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('services') }}"><i class="bi bi-briefcase me-1"></i>Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('projects') }}"><i class="bi bi-diagram-3 me-1"></i>Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}"><i class="bi bi-info-circle me-1"></i>About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary ms-2 text-white" href="{{ route('contact') }}">
            <i class="bi bi-envelope me-1"></i>Contact
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
