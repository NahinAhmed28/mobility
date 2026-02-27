@use('Illuminate\Support\Str')
@extends('admin.layout')

@section('content')
<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">Projects Management</h2>
        <p class="mt-1 text-sm text-gray-500">A list of all projects currently displayed on your website.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <i class="bi bi-plus-lg mr-2"></i> Add Project
        </a>
    </div>
</div>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Project Info
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Details
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($projects as $project)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-900">
                                            {{ $project->title }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ Str::limit($project->description, 50) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $project->serviceCategory->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex flex-col">
                                    <span><i class="bi bi-geo-alt mr-1"></i> {{ $project->location ?? '-' }}</span>
                                    <span><i class="bi bi-calendar-event mr-1"></i> {{ $project->year ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 p-2 rounded-md">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-md delete-confirm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500 italic">
                                No projects found matching your criteria.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
