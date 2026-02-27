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
                    <span class="ml-2 text-sm font-medium text-gray-900">Edit Project</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">Edit Project: {{ $project->title }}</h2>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Main Form -->
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white shadow sm:rounded-lg overflow-hidden">
            <div class="px-4 py-5 border-b border-gray-100 bg-gray-50 sm:px-6">
                <h3 class="text-lg font-bold text-gray-900">Project Information</h3>
            </div>
            <div class="px-4 py-6 sm:p-8">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-bold text-gray-700">Project Title</label>
                            <input type="text" name="title" value="{{ old('title', $project->title) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" required>
                            @error('title') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Service Category</label>
                            <select name="service_category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected($cat->id == $project->service_category_id)>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Year</label>
                            <input type="text" name="year" value="{{ old('year', $project->year) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. 2023">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Location</label>
                            <input type="text" name="location" value="{{ old('location', $project->location) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. Dhaka, Bangladesh">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Client</label>
                            <input type="text" name="client" value="{{ old('client', $project->client) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-sm font-bold text-gray-700">Description</label>
                            <textarea name="description" rows="8" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $project->description) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <button type="submit" class="inline-flex justify-center py-2 px-10 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                            Update Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Images Section -->
    <div class="space-y-8">
        <div class="bg-white shadow sm:rounded-lg overflow-hidden">
            <div class="px-4 py-5 border-b border-gray-100 bg-gray-50 sm:px-6">
                <h3 class="text-lg font-bold text-gray-900">Project Images</h3>
            </div>
            <div class="px-4 py-6 sm:p-6">
                <!-- Upload form -->
                <form action="{{ route('admin.projects.images.upload', $project) }}" method="POST" enctype="multipart/form-data" class="mb-6 pb-6 border-b border-gray-100">
                    @csrf
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Upload New Image</label>
                    <div class="flex flex-col space-y-3">
                        <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                        <button type="submit" class="w-full inline-flex justify-center items-center py-2 px-4 shadow-sm text-sm font-bold rounded-md text-white bg-green-600 hover:bg-green-700">
                            <i class="bi bi-cloud-upload mr-2"></i> Upload Image
                        </button>
                    </div>
                </form>

                <!-- Images list -->
                <div class="grid grid-cols-2 gap-4">
                    @forelse($project->images as $img)
                    <div class="group relative rounded-lg overflow-hidden border border-gray-100">
                        <img src="{{ $img->image_path }}" class="h-32 w-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <form action="{{ route('admin.projects.images.destroy', $img) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="p-2 bg-red-600 text-white rounded-full hover:bg-red-700 shadow-lg delete-confirm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-2 text-center py-8 text-gray-400 italic text-sm">
                        No images uploaded yet.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
