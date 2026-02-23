@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark">Services Management</h2>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-lg me-1"></i> Add Category
    </a>
</div>

<div class="row">
    @forelse($categories as $cat)
    <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold text-primary">{{ $cat->name }}</h5>
                <div class="btn-group">
                    <a href="{{ route('admin.services.edit', $cat) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('admin.services.destroy', $cat) }}" method="POST" onsubmit="return confirm('Delete this category and all its items?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger ms-1">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Service Item</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cat->items as $item)
                        <tr>
                            <td class="ps-4">{{ $item->title }}</td>
                            <td>
                                <form action="{{ route('admin.services.items.destroy', $item) }}" method="POST" onsubmit="return confirm('Remove this service item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm text-danger">
                                        <i class="bi bi-x-circle"></i> Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center py-4 text-muted small">No items added to this category yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>
                            <td colspan="2">
                                <form action="{{ route('admin.services.items.store', $cat) }}" method="POST" class="row g-2 px-3 py-2">
                                    @csrf
                                    <div class="col-md-9">
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="Add new service item title..." required>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">
                                            <i class="bi bi-plus"></i> Add Item
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center py-5">
            <i class="bi bi-info-circle display-4 d-block mb-3"></i>
            <h5>No Service Categories Found</h5>
            <p>Start by adding a service category like "Transport Planning".</p>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary mt-2">Add Category</a>
        </div>
    </div>
    @endforelse
</div>
@endsection
