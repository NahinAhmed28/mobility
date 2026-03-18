<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoftwareCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoftwareCategoryController extends Controller
{
    public function index()
    {
        $categories = SoftwareCategory::orderBy('sort_order')->get();
        return view('admin.software.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.software.categories.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:software_categories,slug',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'sort_order' => 'integer'
        ]);

        SoftwareCategory::create($data);
        Cache::forget('public_software_module');

        return redirect()->route('admin.software.categories.index')->with('success', 'Software category created!');
    }

    public function edit(SoftwareCategory $category)
    {
        return view('admin.software.categories.form', compact('category'));
    }

    public function update(Request $request, SoftwareCategory $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:software_categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'sort_order' => 'integer'
        ]);

        $category->update($data);
        Cache::forget('public_software_module');

        return redirect()->route('admin.software.categories.index')->with('success', 'Software category updated!');
    }

    public function destroy(SoftwareCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.software.categories.index')->with('success', 'Software category deleted!');
    }
}
