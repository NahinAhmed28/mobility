<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SoftwareProduct;
use App\Models\SoftwareCategory;
use App\Models\SoftwareProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SoftwareProductController extends Controller
{
    public function index()
    {
        $products = SoftwareProduct::with('category')->orderBy('sort_order')->get();
        return view('admin.software.products.index', compact('products'));
    }

    public function create()
    {
        $categories = SoftwareCategory::all();
        return view('admin.software.products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'software_category_id' => 'required|exists:software_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:software_products,slug',
            'description' => 'nullable|string',
            'details_text' => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        $product = SoftwareProduct::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('software', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        Cache::forget('public_software_module');

        return redirect()->route('admin.software.products.index')->with('success', 'Software product created!');
    }

    public function edit(SoftwareProduct $product)
    {
        $product->load('images');
        $categories = SoftwareCategory::all();
        return view('admin.software.products.form', compact('product', 'categories'));
    }

    public function update(Request $request, SoftwareProduct $product)
    {
        $data = $request->validate([
            'software_category_id' => 'required|exists:software_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:software_products,slug,' . $product->id,
            'description' => 'nullable|string',
            'details_text' => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        $product->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('software', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        Cache::forget('public_software_module');

        return redirect()->route('admin.software.products.index')->with('success', 'Software product updated!');
    }

    public function destroy(SoftwareProduct $product)
    {
        $product->delete();
        Cache::forget('public_software_module');
        return redirect()->route('admin.software.products.index')->with('success', 'Software product deleted!');
    }

    public function uploadImage(Request $request, SoftwareProduct $product)
    {
        $request->validate(['image' => 'required|image|max:4096']);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('software', 'public');
            $product->images()->create(['image_path' => $path]);
            Cache::forget('public_software_module');
        }
        return back()->with('success', 'Image uploaded.');
    }

    public function destroyImage(SoftwareProductImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();
        Cache::forget('public_software_module');
        return back()->with('info', 'Image removed.');
    }
}
