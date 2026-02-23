@extends('public.layouts.app')

@section('content')
  <!-- Projects Header -->
  <section class="page-header py-5" style="background: linear-gradient(135deg, #1e2d5a 0%, #2d4a7e 100%);">
    <div class="container">
      <h1 class="display-4 fw-bold text-white">Project Experience</h1>
      <p class="lead text-light">Showcase of our completed transportation projects</p>
    </div>
  </section>

  <!-- Projects Filter Tabs -->
  <section class="py-4 bg-light border-bottom">
    <div class="container">
      <ul class="nav nav-tabs border-0" role="tablist">
        @foreach($categories as $cat)
          <li class="nav-item">
            <a class="nav-link @if(optional($selected)->id == $cat->id || (is_null($selected) && $loop->first)) active @endif" href="{{ route('projects', ['category' => $cat->slug]) }}">
              <i class="bi bi-folder me-2"></i>{{ $cat->name }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </section>

  <!-- Projects List -->
  <section class="py-5">
    <div class="container">
      @php $list = $selected? $selected->projects : $categories->first()->projects; @endphp
      
      @if($list->count())
        <div class="row g-4">
          @foreach($list as $p)
            <div class="col-lg-6">
              <div class="card h-100 border-0 shadow-sm hover-lift">
                <div class="card-body p-4">
                  <h5 class="card-title mb-2">{{ $p->title }}</h5>
                  @if($p->location)
                    <p class="text-muted small mb-3">
                      <i class="bi bi-geo-alt"></i> {{ $p->location }}
                    </p>
                  @endif
                  @if($p->year)
                    <p class="text-muted small mb-3">
                      <i class="bi bi-calendar-event"></i> {{ $p->year }}
                    </p>
                  @endif
                  @if($p->client)
                    <p class="text-muted small mb-3">
                      <i class="bi bi-building"></i> <strong>Client:</strong> {{ $p->client }}
                    </p>
                  @endif
                  <p class="card-text text-muted">{{ Str::limit($p->description ?? 'Feasibility study, design and planning services for transportation infrastructure.', 180) }}</p>
                  <a href="{{ route('projects.show', $p) }}" class="btn btn-primary btn-sm mt-3">
                    <i class="bi bi-arrow-right me-2"></i>View Details
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="text-center py-5 text-muted">
          <i class="bi bi-inbox" style="font-size: 3rem;"></i>
          <p class="mt-3">No projects in this category yet.</p>
        </div>
      @endif
    </div>
  </section>
@endsection
