@extends('admin.layout')

@section('content')
  <h1>Edit Company Profile</h1>
  <form method="post" action="{{ route('admin.company.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" value="{{ old('name', $profile->name ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Tagline</label>
      <input name="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Intro</label>
      <input name="intro" value="{{ old('intro', $profile->intro ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">About (HTML)</label>
      <textarea name="about_html" class="form-control" rows="6">{{ old('about_html', $profile->about_html ?? '') }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Logo</label>
      <input type="file" name="logo" class="form-control">
      @if(!empty($profile->logo_path))<img src="{{ $profile->logo_path }}" style="max-height:80px" class="mt-2">@endif
    </div>
    <div class="mb-3">
      <label class="form-label">Hero Image</label>
      <input type="file" name="hero_image" class="form-control">
      @if(!empty($profile->hero_image_path))<img src="{{ $profile->hero_image_path }}" style="max-width:200px" class="mt-2">@endif
    </div>
    <button class="btn btn-primary">Save</button>
  </form>
@endsection
