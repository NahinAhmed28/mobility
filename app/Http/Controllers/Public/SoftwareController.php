<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SoftwareCategory;
use App\Models\SoftwareProduct;
use Illuminate\Support\Facades\Cache;

class SoftwareController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('public_software_module', 3600, function() {
            return SoftwareCategory::with(['products' => function($q) {
                $q->orderBy('sort_order');
            }, 'products.images'])
            ->orderBy('sort_order')
            ->get();
        });

        return view('public.software.index', compact('categories'));
    }

    public function show(SoftwareProduct $product)
    {
        $product->load('images', 'category');
        return view('public.software.show', compact('product'));
    }
}
