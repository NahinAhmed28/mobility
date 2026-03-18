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
                    <span class="ml-2 text-sm font-medium text-gray-900">Company Profile</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">Company Profile</h2>
    <p class="mt-1 text-sm text-gray-500">Public information about your company as seen on the website.</p>
</div>

<div class="bg-white shadow sm:rounded-lg overflow-hidden">
    <div class="px-4 py-6 sm:p-8">
        <form method="post" action="{{ route('admin.company.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Company Name</label>
                        <input type="text" name="name" value="{{ old('name', $profile->name ?? '') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                        @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Tagline</label>
                        <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Short Intro</label>
                        <input type="text" name="intro" value="{{ old('intro', $profile->intro ?? '') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">About Us Content (HTML supported)</label>
                        <textarea name="about_html" rows="8" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('about_html', $profile->about_html ?? '') }}</textarea>
                        <p class="mt-2 text-xs text-gray-400">This content appears on the public About page. You can use standard HTML tags for formatting.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6 border-t border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6 border-t border-gray-100">
                    <div class="space-y-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Company Logo</label>
                        <div id="logo-preview-container" class="{{ empty($profile->logo_path) ? 'hidden' : '' }} mb-3">
                            @php
                                $logoPath = $profile->logo_path ?? '';
                                $logoUrl = $logoPath ? (Str::startsWith($logoPath, 'http') ? $logoPath : asset('storage/' . $logoPath)) : '#';
                            @endphp
                            <img id="logo-preview" src="{{ $logoUrl }}" class="h-16 object-contain rounded border p-1 bg-gray-50">
                        </div>
                        <input type="file" name="logo" id="logo-input" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Hero Background Image</label>
                        <div id="hero-preview-container" class="{{ empty($profile->hero_image_path) ? 'hidden' : '' }} mb-3">
                            @php
                                $heroPath = $profile->hero_image_path ?? '';
                                $heroUrl = $heroPath ? (Str::startsWith($heroPath, 'http') ? $heroPath : asset('storage/' . $heroPath)) : '#';
                            @endphp
                            <img id="hero-preview" src="{{ $heroUrl }}" class="h-24 w-full object-cover rounded border p-1 bg-gray-50 shadow-sm">
                        </div>
                        <input type="file" name="hero_image" id="hero-input" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                </div>

                <script>
                    function setupPreview(inputId, previewId, containerId) {
                        document.getElementById(inputId).onchange = evt => {
                            const [file] = evt.target.files
                            if (file) {
                                document.getElementById(previewId).src = URL.createObjectURL(file)
                                document.getElementById(containerId).classList.remove('hidden')
                            }
                        }
                    }
                    setupPreview('logo-input', 'logo-preview', 'logo-preview-container');
                    setupPreview('hero-input', 'hero-preview', 'hero-preview-container');
                </script>
                </div>

                <div class="pt-8 border-t border-gray-100">
                    <button type="submit" class="inline-flex justify-center py-2 px-10 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Save Profile Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
