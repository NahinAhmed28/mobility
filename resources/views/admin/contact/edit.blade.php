@extends('admin.layout')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Settings</li>
        </ol>
    </nav>
    <h2 class="fw-bold text-dark">Contact Settings</h2>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form method="post" action="{{ route('admin.contact.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input name="phone" value="{{ old('phone', $contact->phone ?? '') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Public Email</label>
                            <input name="email" value="{{ old('email', $contact->email ?? '') }}" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Office Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ old('address', $contact->address ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="mb-4 border-top pt-4">
                        <label class="form-label fw-bold d-block">Contact QR Image</label>
                        <div class="d-flex align-items-start gap-3">
                            <div class="flex-grow-1">
                                <input type="file" name="qr_image" class="form-control mb-1">
                                <div class="form-text small">Used for easy contact sharing.</div>
                            </div>
                            @if(!empty($contact->qr_image_path))
                                <img src="{{ $contact->qr_image_path }}" style="max-width:100px" class="rounded border">
                            @endif
                        </div>
                    </div>

                    <div class="border-top pt-4">
                        <button class="btn btn-primary px-5">Update Contact Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
