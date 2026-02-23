@extends('public.layouts.app')

@section('content')
  <!-- Projects Header -->
  <section class="page-header py-5 bg-primary text-white">
    <div class="container">
      <h1 class="display-4 fw-bold text-uppercase">Project Experience</h1>
      <p class="lead text-secondary fw-bold">Delivering Success Across the Globe</p>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      @foreach($projects as $cat)
        <div class="mb-5">
          <h2 class="section-title text-primary">{{ $cat->name }}</h2>
          <div class="row g-4 mt-2">
            @foreach($cat->projects as $p)
              <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm transition-hover">
                   <div class="card-body p-4 d-flex">
                       <div class="me-3">
                           <div class="bg-light rounded p-3">
                               <i class="bi bi-building-gear text-primary" style="font-size: 1.5rem"></i>
                           </div>
                       </div>
                       <div>
                           <h5 class="fw-bold mb-1">{{ $p->title }}</h5>
                           @if($p->location) <div class="text-muted small mb-2"><i class="bi bi-geo-alt me-1"></i> {{ $p->location }}</div> @endif
                           <a href="{{ route('projects.show', $p) }}" class="btn btn-link p-0 text-secondary fw-bold text-decoration-none small">VIEW PROJECT DETAILS <i class="bi bi-arrow-right"></i></a>
                       </div>
                   </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
