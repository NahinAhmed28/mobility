@extends('admin.layout')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Company Profile</li>
        </ol>
    </nav>
    <h2 class="fw-bold text-dark">Company Profile</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form method="post" action="{{ route('admin.company.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Company Name</label>
                            <input name="name" value="{{ old('name', $profile->name ?? '') }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Tagline</label>
                            <input name="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Short Intro</label>
                            <input name="intro" value="{{ old('intro', $profile->intro ?? '') }}" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">About Us Content (HTML)</label>
                            <textarea name="about_html" class="form-control" rows="8">{{ old('about_html', $profile->about_html ?? '') }}</textarea>
                            <div class="form-text mt-2 small">This content appears on the public About page. You can use standard HTML tags.</div>
                        </div>
                    </div>

                    <div class="row g-4 mb-4 border-top pt-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Company Logo</label>
                            <input type="file" name="logo" class="form-control mb-2">
                            @if(!empty($profile->logo_path))
                                <div class="bg-light p-2 rounded d-inline-block">
                                    <img src="{{ $profile->logo_path }}" style="max-height:60px">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Hero Background Image</label>
                            <input type="file" name="hero_image" class="form-control mb-2">
                            @if(!empty($profile->hero_image_path))
                                <img src="{{ $profile->hero_image_path }}" style="max-width:150px" class="rounded shadow-sm">
                            @endif
                        </div>
                    </div>

                    <div class="border-top pt-4">
                        <button class="btn btn-primary px-5">Save Profile changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
