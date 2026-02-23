@extends('public.layouts.app')

@section('content')
  <!-- Services Header -->
  <section class="page-header py-5 bg-primary text-white">
    <div class="container">
      <h1 class="display-4 fw-bold text-uppercase">Our Services</h1>
      <p class="lead text-secondary fw-bold">Comprehensive Transportation Planning & Engineering Solutions</p>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      @foreach($services as $cat)
        <div class="mb-5">
          <h2 class="section-title text-primary">{{ $cat->name }}</h2>
          <div class="row g-4 mt-2">
            @foreach($cat->items as $item)
              <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm border-start border-secondary border-4">
                   <div class="card-body">
                       <h5 class="fw-bold">{{ $item->title }}</h5>
                       @if($item->details_text)
                        <p class="text-muted small">{{ $item->details_text }}</p>
                       @endif
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
