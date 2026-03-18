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
                    <a href="{{ route('admin.software.products.index') }}" class="ml-2 text-sm font-medium text-gray-500 hover:text-gray-700">Software Products</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="bi bi-chevron-right text-gray-400 text-xs"></i>
                    <span class="ml-2 text-sm font-medium text-gray-900">{{ isset($product) ? 'Edit' : 'Create' }} Product</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">{{ isset($product) ? 'Edit Software Product' : 'Create Software Product' }}</h2>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2">
        <div class="bg-white shadow sm:rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <form action="{{ isset($product) ? route('admin.software.products.update', $product) : route('admin.software.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($product)) @method('PUT') @endif

                    <div class="grid grid-cols-1 gap-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700">Title</label>
                                <input type="text" name="title" id="p-title" value="{{ old('title', $product->title ?? '') }}" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700">Category</label>
                                <select name="software_category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('software_category_id', $product->software_category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Slug</label>
                            <input type="text" name="slug" id="p-slug" value="{{ old('slug', $product->slug ?? '') }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Short Description</label>
                            <textarea name="description" rows="2" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $product->description ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700">Detailed Content (HTML)</label>
                            <textarea name="details_text" rows="10" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('details_text', $product->details_text ?? '') }}</textarea>
                        </div>

                        <div class="md:col-span-1">
                            <label class="block text-sm font-bold text-gray-700">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div class="mt-8 pt-5 border-t border-gray-100 flex justify-end">
                        <a href="{{ route('admin.software.products.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                            {{ isset($product) ? 'Update' : 'Create' }} Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(isset($product))
    <div class="lg:col-span-1 border-top pt-5 lg:pt-0 lg:border-top-0">
        <div class="bg-white shadow sm:rounded-lg overflow-hidden sticky top-8">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 border-bottom pb-2">Product Gallery</h3>
                
                <!-- Upload form for edit -->
                <form action="{{ route('admin.software.products.images.upload', $product) }}" method="POST" enctype="multipart/form-data" class="mb-6 pb-6 border-b border-gray-100">
                    @csrf
                    <div class="space-y-4">
                        <div id="image-preview-container" class="hidden mb-3">
                            <img id="image-preview" src="#" class="h-32 w-full object-cover rounded-lg border-2 border-dashed border-gray-200">
                        </div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Add New Image</label>
                        <input type="file" name="image" id="product-image-input" class="block w-full text-sm text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2" required>
                        <button type="submit" class="w-full inline-flex justify-center items-center py-2 px-4 shadow-sm text-xs font-bold rounded-md text-white bg-green-600 hover:bg-green-700 transition-colors">
                            <i class="bi bi-cloud-upload mr-2"></i> Upload
                        </button>
                    </div>
                </form>

                <div class="grid grid-cols-2 gap-4">
                    @forelse($product->images as $img)
                    <div class="group relative rounded-lg overflow-hidden border border-gray-200">
                        @php
                            $path = $img->image_path;
                            $url = Str::startsWith($path, 'http') ? $path : asset('storage/' . $path);
                        @endphp
                        <img src="{{ $url }}" class="h-24 w-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <form action="{{ route('admin.software.products.images.destroy', $img) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-600 text-white rounded-full hover:bg-red-700 shadow-md delete-confirm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-2 text-center py-8 text-gray-400 italic text-sm">No images uploaded.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('product-image-input').onchange = evt => {
            const [file] = evt.target.files
            if (file) {
                document.getElementById('image-preview').src = URL.createObjectURL(file)
                document.getElementById('image-preview-container').classList.remove('hidden')
            }
        }
    </script>
    @endif
</div>

<script>
    document.getElementById('p-title').addEventListener('input', function() {
        if (!document.getElementById('p-slug').value || "{{ isset($product) }}" == "") {
            document.getElementById('p-slug').value = this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        }
    });
</script>
@endsection
