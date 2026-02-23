@extends('admin.layout')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-dark">CMS Overview</h2>
    <p class="text-muted">Welcome back, {{ Auth::user()->name }}. Manage your website content here.</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <a href="{{ route('admin.services.index') }}" class="text-decoration-none transition-hover d-block h-100">
            <div class="card border-0 shadow-sm p-3 text-center h-100">
                <div class="text-primary fs-1 mb-2"><i class="bi bi-briefcase"></i></div>
                <h3 class="fw-bold m-0 text-dark">{{ $serviceCount }}</h3>
                <span class="text-muted small fw-bold text-uppercase">Services Total</span>
                <div class="mt-2 text-primary small fw-bold">Manage <i class="bi bi-arrow-right"></i></div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.projects.index') }}" class="text-decoration-none transition-hover d-block h-100">
            <div class="card border-0 shadow-sm p-3 text-center h-100">
                <div class="text-success fs-1 mb-2"><i class="bi bi-collection"></i></div>
                <h3 class="fw-bold m-0 text-dark">{{ $projectCount }}</h3>
                <span class="text-muted small fw-bold text-uppercase">Projects Total</span>
                <div class="mt-2 text-success small fw-bold">Manage <i class="bi bi-arrow-right"></i></div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.company.edit') }}" class="text-decoration-none transition-hover d-block h-100">
            <div class="card border-0 shadow-sm p-3 text-center h-100">
                <div class="text-info fs-1 mb-2"><i class="bi bi-building"></i></div>
                <div class="small fw-bold text-truncate px-2 text-dark">{{ $company->name ?? 'Not Set' }}</div>
                <span class="text-muted small fw-bold text-uppercase d-block mt-2">Company Name</span>
                <div class="mt-2 text-info small fw-bold">Edit Profile <i class="bi bi-arrow-right"></i></div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('admin.contact.edit') }}" class="text-decoration-none transition-hover d-block h-100">
            <div class="card border-0 shadow-sm p-3 text-center h-100">
                <div class="text-warning fs-1 mb-2"><i class="bi bi-envelope"></i></div>
                <div class="small fw-bold text-truncate px-2 text-dark">{{ $contact->email ?? 'Not Set' }}</div>
                <span class="text-muted small fw-bold text-uppercase d-block mt-2">Contact Email</span>
                <div class="mt-2 text-warning small fw-bold">Edit Contact <i class="bi bi-arrow-right"></i></div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card border-0 shadow-sm bg-brand-primary text-white overflow-hidden p-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="fw-bold mb-2">Need to update your presence?</h4>
                    <p class="mb-0 text-white-50">Quickly jump to the sections you want to modify using the cards above or the buttons below.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-light fw-bold px-4 py-2 me-2">ADD NEW PROJECT</a>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-outline-light fw-bold px-4 py-2">ADD SERVICE</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
