<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark admin-sidebar" style="width: 280px; height: 100vh; position: fixed;">
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <div class="bg-primary rounded p-1 me-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
            <span class="fw-bold">M</span>
        </div>
        <span class="fs-4 fw-bold">Mobility <span class="text-primary">Admin</span></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link @if(Route::is('admin.dashboard')) active @else text-white @endif">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.company.edit') }}" class="nav-link @if(Route::is('admin.company.*')) active @else text-white @endif">
                <i class="bi bi-building me-2"></i>
                Company Profile
            </a>
        </li>
        <li>
            <a href="{{ route('admin.contact.edit') }}" class="nav-link @if(Route::is('admin.contact.*')) active @else text-white @endif">
                <i class="bi bi-envelope me-2"></i>
                Contact Settings
            </a>
        </li>
        <hr>
        <li>
            <a href="{{ route('admin.services.index') }}" class="nav-link @if(Route::is('admin.services.*')) active @else text-white @endif">
                <i class="bi bi-briefcase me-2"></i>
                Services
            </a>
        </li>
        <li>
            <a href="{{ route('admin.projects.index') }}" class="nav-link @if(Route::is('admin.projects.*')) active @else text-white @endif">
                <i class="bi bi-collection me-2"></i>
                Projects
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Sign out</button>
                </form>
            </li>
        </ul>
    </div>
</div>
