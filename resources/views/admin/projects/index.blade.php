@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">Projects Management</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Project
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Project Title</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Year</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold text-dark">{{ $project->title }}</div>
                            <span class="text-muted small">{{ Str::limit($project->description, 50) }}</span>
                        </td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $project->category->name ?? 'Uncategorized' }}</span>
                        </td>
                        <td>{{ $project->location ?? '-' }}</td>
                        <td>{{ $project->year ?? '-' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-outline-danger ms-1 delete-confirm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">No projects found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
