@extends('admin.layout')

@section('content')
  <h1>Edit Contact Settings</h1>
  <form method="post" action="{{ route('admin.contact.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input name="phone" value="{{ old('phone', $contact->phone ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input name="email" value="{{ old('email', $contact->email ?? '') }}" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <textarea name="address" class="form-control">{{ old('address', $contact->address ?? '') }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">QR Image</label>
      <input type="file" name="qr_image" class="form-control">
      @if(!empty($contact->qr_image_path))<img src="{{ $contact->qr_image_path }}" style="max-width:200px" class="mt-2">@endif
    </div>
    <button class="btn btn-primary">Save</button>
  </form>
@endsection
