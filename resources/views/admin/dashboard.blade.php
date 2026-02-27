@extends('admin.layout')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">CMS Overview</h2>
    <p class="mt-1 text-sm text-gray-500">Welcome back, {{ Auth::user()->name }}. Manage your website content here.</p>
</div>

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
    <a href="{{ route('admin.services.index') }}" class="relative overflow-hidden transition-transform duration-200 bg-white rounded-lg shadow group hover:scale-105">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-blue-100 rounded-md">
                    <i class="text-2xl text-blue-600 bi bi-briefcase"></i>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate uppercase">Services Total</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $serviceCount }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
            <div class="text-sm">
                <span class="font-medium text-blue-600 hover:text-blue-500">Manage <i class="bi bi-arrow-right ml-1"></i></span>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.projects.index') }}" class="relative overflow-hidden transition-transform duration-200 bg-white rounded-lg shadow group hover:scale-105">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-green-100 rounded-md">
                    <i class="text-2xl text-green-600 bi bi-collection"></i>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate uppercase">Projects Total</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $projectCount }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
            <div class="text-sm">
                <span class="font-medium text-green-600 hover:text-green-500">Manage <i class="bi bi-arrow-right ml-1"></i></span>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.company.edit') }}" class="relative overflow-hidden transition-transform duration-200 bg-white rounded-lg shadow group hover:scale-105">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-cyan-100 rounded-md">
                    <i class="text-2xl text-cyan-600 bi bi-building"></i>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate uppercase">Company Profile</p>
                    <p class="text-lg font-bold text-gray-900 truncate">{{ $company->name ?? 'Not Set' }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
            <div class="text-sm">
                <span class="font-medium text-cyan-600 hover:text-cyan-500">Edit Profile <i class="bi bi-arrow-right ml-1"></i></span>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.contact.edit') }}" class="relative overflow-hidden transition-transform duration-200 bg-white rounded-lg shadow group hover:scale-105">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-amber-100 rounded-md">
                    <i class="text-2xl text-amber-600 bi bi-envelope"></i>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-medium text-gray-500 truncate uppercase">Contact Email</p>
                    <p class="text-sm font-bold text-gray-900 truncate">{{ $contact->email ?? 'Not Set' }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
            <div class="text-sm">
                <span class="font-medium text-amber-600 hover:text-amber-500">Edit Settings <i class="bi bi-arrow-right ml-1"></i></span>
            </div>
        </div>
    </a>
</div>

<div class="overflow-hidden bg-slate-900 rounded-lg shadow-lg">
    <div class="px-6 py-8 sm:px-12 sm:py-10">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex-1">
                <h4 class="text-xl font-bold text-white">Need to update your presence?</h4>
                <p class="mt-2 text-slate-400">Quickly jump to the sections you want to modify using the shortcuts above or the quick actions here.</p>
            </div>
            <div class="mt-6 sm:mt-0 sm:ml-6 flex items-center space-x-3">
                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold bg-white text-slate-900 rounded-md hover:bg-slate-100 transition-colors">
                    ADD PROJECT
                </a>
                <a href="{{ route('admin.services.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-bold border border-white text-white rounded-md hover:bg-white/10 transition-colors">
                    ADD SERVICE
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
