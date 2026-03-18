@extends('admin.layout')

@section('content')
<div class="mb-8">
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Dashboard</a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="bi bi-chevron-right text-gray-400 text-xs"></i>
                    <a href="{{ route('admin.software.categories.index') }}" class="ml-2 text-sm font-medium text-gray-500 hover:text-gray-700">Software Categories</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="bi bi-chevron-right text-gray-400 text-xs"></i>
                    <span class="ml-2 text-sm font-medium text-gray-900">{{ isset($category) ? 'Edit' : 'Create' }} Category</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h2>
</div>

<div class="bg-white shadow sm:rounded-lg overflow-hidden">
    <div class="px-4 py-5 sm:p-6">
        <form action="{{ isset($category) ? route('admin.software.categories.update', $category) : route('admin.software.categories.store') }}" method="POST">
            @csrf
            @if(isset($category)) @method('PUT') @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700">Name</label>
                    <input type="text" name="name" id="cat-name" value="{{ old('name', $category->name ?? '') }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">Slug</label>
                    <input type="text" name="slug" id="cat-slug" value="{{ old('slug', $category->slug ?? '') }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700">Description</label>
                    <textarea name="description" rows="3" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $category->description ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">Icon (Bootstrap Icon Class)</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                            bi-
                        </span>
                        <input type="text" name="icon" value="{{ old('icon', $category->icon ?? '') }}" 
                            class="flex-1 min-w-0 block w-full px-3 py-2 border-gray-300 rounded-none rounded-r-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="mt-8 pt-5 border-t border-gray-100 flex justify-end">
                <a href="{{ route('admin.software.categories.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    {{ isset($category) ? 'Update' : 'Create' }} Category
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('cat-name').addEventListener('input', function() {
        if (!document.getElementById('cat-slug').value || "{{ isset($category) }}" == "") {
            document.getElementById('cat-slug').value = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        }
    });
</script>
@endsection
