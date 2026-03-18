@extends('public.layouts.app')

@section('content')
<div class="bg-brand-primary py-5 mb-5">
    <div class="container py-lg-4 text-center">
        <h1 class="display-4 fw-bold text-white mb-3">SOFTWARE SOLUTIONS</h1>
        <p class="lead text-white-50 max-w-2xl mx-auto">Industry-leading software for transport modeling, economic analysis, and more.</p>
    </div>
</div>

<div class="container mb-5 pb-5">
    @foreach($categories as $category)
    <div class="mb-5">
        <div class="d-flex align-items-center mb-4 border-bottom pb-3">
            <div class="bg-brand-secondary p-3 rounded-circle me-3 text-brand-primary">
                <i class="bi bi-{{ $category->icon ?: 'pc-display' }} fs-3"></i>
            </div>
            <div>
                <h2 class="fw-bold text-brand-primary mb-0">{{ $category->name }}</h2>
                <p class="text-muted mb-0">{{ $category->description }}</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse($category->products as $product)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm hover-shadow overflow-hidden">
                    <div class="aspect-video bg-light d-flex align-items-center justify-content-center overflow-hidden">
                        @if($product->images->count() > 0)
                            @php
                                $path = $product->images->first()->image_path;
                                $url = Str::startsWith($path, 'http') ? $path : asset('storage/' . $path);
                            @endphp
                            <img src="{{ $url }}" class="img-fluid w-100 h-100 object-cover" alt="{{ $product->title }}">
                        @else
                            <i class="bi bi-box-seam text-muted display-4 opacity-25"></i>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-brand-primary mb-2">{{ $product->title }}</h5>
                        <p class="text-muted small mb-4 line-clamp-3">{{ $product->description }}</p>
                        <a href="{{ route('software.show', $product) }}" class="btn btn-outline-primary rounded-pill px-4 fw-bold small">
                            VIEW DETAILS <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 italic text-muted">No products currently available in this category.</div>
            @endforelse
        </div>
    </div>
    @endforeach
</div>
@endsection
