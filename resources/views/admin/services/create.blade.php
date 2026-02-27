@extends('admin.layout')

@section('content')
<div class="mb-8">
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{ route('admin.services.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Services</a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="bi bi-chevron-right text-gray-400 text-xs"></i>
                    <span class="ml-2 text-sm font-medium text-gray-900">Add Category</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">Add Service Category</h2>
</div>

<div class="max-w-xl">
    <div class="bg-white shadow sm:rounded-lg overflow-hidden">
        <div class="px-4 py-8 sm:p-8">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Category Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" placeholder="e.g. Transport Planning" required>
                        @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center space-x-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-10 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                        Create Category
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
