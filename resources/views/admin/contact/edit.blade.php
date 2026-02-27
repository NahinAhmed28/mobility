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
                    <span class="ml-2 text-sm font-medium text-gray-900">Contact Settings</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">Contact Settings</h2>
    <p class="mt-1 text-sm text-gray-500">Configure how users reach you (phone, email, address, etc.).</p>
</div>

<div class="max-w-4xl bg-white shadow sm:rounded-lg">
    <div class="px-4 py-6 sm:p-8">
        <form method="post" action="{{ route('admin.contact.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Public Email</label>
                        <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700">Office Address</label>
                        <textarea name="address" rows="3" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('address', $contact->address ?? '') }}</textarea>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-4">Contact QR Image</label>
                    <div class="flex items-start space-x-6">
                        <div class="flex-grow">
                            <input type="file" name="qr_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-2 text-xs text-gray-500 italic">Used for easy contact sharing on mobile devices.</p>
                        </div>
                        @if(!empty($contact->qr_image_path))
                            <div class="flex-shrink-0 p-2 bg-white border border-gray-200 rounded-lg shadow-sm">
                                <img src="{{ $contact->qr_image_path }}" class="h-24 w-24">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-10 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Update Contact Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
