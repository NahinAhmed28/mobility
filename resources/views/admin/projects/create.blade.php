@extends('admin.layout')

@section('content')
<div class="mb-8">
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">Projects</a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="bi bi-chevron-right text-gray-400 text-xs"></i>
                    <span class="ml-2 text-sm font-medium text-gray-900">Add Project</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">Add New Project</h2>
</div>

<div class="max-w-4xl">
    <div class="bg-white shadow sm:rounded-lg overflow-hidden">
        <div class="px-4 py-8 sm:p-8">
            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-bold text-gray-700">Project Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" required>
                        @error('title') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Service Category</label>
                        <select name="service_category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="" selected disabled>Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Year</label>
                        <input type="text" name="year" value="{{ old('year') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. 2023">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. Dhaka, Bangladesh">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Client</label>
                        <input type="text" name="client" value="{{ old('client') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-bold text-gray-700">Description</label>
                        <textarea name="description" rows="6" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center space-x-3">
                    <button type="submit" class="inline-flex justify-center py-2 px-10 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                        Create Project
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
