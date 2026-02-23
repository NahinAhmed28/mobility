@extends('admin.layout')

@section('content')
  <h1>Dashboard</h1>
  <p>Company: {{ $company->name ?? '-' }}</p>
  <p>Contact: {{ $contact->email ?? '-' }}</p>
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-3"><div class="card-body">
        <h5>Quick Actions</h5>
        <a href="{{ route('admin.company.edit') }}" class="btn btn-sm btn-outline-primary">Edit Company</a>
        <a href="{{ route('admin.contact.edit') }}" class="btn btn-sm btn-outline-secondary">Edit Contact</a>
      </div></div>
    </div>
  </div>
@endsection
