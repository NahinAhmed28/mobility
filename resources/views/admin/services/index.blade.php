@extends('admin.layout')

@section('content')
<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl">Services Management</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your business service categories and specific service items here.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
            <i class="bi bi-plus-lg mr-2"></i> Add Category
        </a>
    </div>
</div>

<div class="space-y-8">
    @forelse($categories as $cat)
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 bg-gray-50 flex justify-between items-center sm:px-6">
            <div>
                <h3 class="text-lg leading-6 font-bold text-gray-900">
                    {{ $cat->name }}
                </h3>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.services.edit', $cat) }}" class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200">
                    <i class="bi bi-pencil mr-1"></i> Edit
                </a>
                <form action="{{ route('admin.services.destroy', $cat) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 delete-confirm">
                        <i class="bi bi-trash mr-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="px-4 py-0 sm:px-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service Item</th>
                        <th scope="col" class="relative px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($cat->items as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $item->title }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <form action="{{ route('admin.services.items.destroy', $item) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 delete-confirm">
                                    <i class="bi bi-x-circle mr-1"></i> Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="px-4 py-6 text-center text-sm text-gray-400 italic">No items added to this category yet.</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="2" class="px-4 py-3">
                            <form action="{{ route('admin.services.items.store', $cat) }}" method="POST" class="flex items-center space-x-3">
                                @csrf
                                <div class="flex-1">
                                    <input type="text" name="title" class="block w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Add new service item title..." required>
                                </div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-bold text-white bg-green-600 rounded-md hover:bg-green-700">
                                    <i class="bi bi-plus mr-1"></i> Add Item
                                </button>
                            </form>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-lg shadow-sm border border-dashed border-gray-300 p-12 text-center">
        <i class="bi bi-info-circle text-gray-400 text-5xl inline-block mb-4"></i>
        <h3 class="text-lg font-bold text-gray-900">No Service Categories Found</h3>
        <p class="text-gray-500 max-w-sm mx-auto mt-2">Start by adding a service category (e.g. "Transport Planning") to organize your offerings.</p>
        <a href="{{ route('admin.services.create') }}" class="mt-6 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md font-bold">Add Category</a>
    </div>
    @endforelse
</div>
@endsection
