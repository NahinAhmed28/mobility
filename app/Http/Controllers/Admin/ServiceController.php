<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with('items')->orderBy('sort_order')->get();
        return view('admin.services.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['name']);
        ServiceCategory::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service category created successfully');
    }

    public function edit(ServiceCategory $category)
    {
        return view('admin.services.edit', compact('category'));
    }

    public function update(Request $request, ServiceCategory $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $category->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service category updated successfully');
    }

    public function destroy(ServiceCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service category deleted successfully');
    }

    public function storeItem(Request $request, ServiceCategory $category)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $category->items()->create($data);

        return redirect()->back()->with('success', 'Service item added successfully');
    }

    public function destroyItem(ServiceItem $item)
    {
        $item->delete();
        return redirect()->back()->with('success', 'Service item removed successfully');
    }
}
