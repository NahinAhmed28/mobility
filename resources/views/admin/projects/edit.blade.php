@extends('admin.layout')

@section('content')
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
        </ol>
    </nav>
    <h2 class="fw-bold text-dark">Edit Project: {{ $project->title }}</h2>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3">
                <h5 class="m-0 fw-bold text-primary">Project Information</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                    @csrf
                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Project Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Category</label>
                            <select name="project_category_id" class="form-select" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected($cat->id == $project->project_category_id)>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Year</label>
                            <input type="text" name="year" class="form-control" value="{{ old('year', $project->year) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location', $project->location) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Client</label>
                            <input type="text" name="client" class="form-control" value="{{ old('client', $project->client) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="8">{{ old('description', $project->description) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex gap-2 border-top pt-4">
                        <button type="submit" class="btn btn-primary px-4">Update Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="m-0 fw-bold text-primary">Project Images</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.projects.images.upload', $project) }}" method="POST" enctype="multipart/form-data" class="mb-4 pb-4 border-bottom">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Upload New Image</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control" required>
                            <button class="btn btn-success" type="submit">Upload</button>
                        </div>
                    </div>
                </form>

                <div class="row g-3">
                    @forelse($project->images as $img)
                    <div class="col-md-6">
                        <div class="position-relative">
                            <img src="{{ $img->image_path }}" class="img-fluid rounded shadow-sm" style="height: 120px; width: 100%; object-fit: cover;">
                            <form action="{{ route('admin.projects.images.destroy', $img) }}" method="POST" class="position-absolute top-0 end-0 m-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-circle p-1 shadow">
                                    <i class="bi bi-x"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-4 text-muted small">No images uploaded for this project yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
