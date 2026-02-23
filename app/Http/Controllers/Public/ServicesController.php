<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class ServicesController extends Controller
{
    public function index()
    {
        $company = Cache::remember('company_profile', 60, fn() => CompanyProfile::first());
        $services = Cache::remember('public_service_categories', 60, fn() => ServiceCategory::with(['items' => function($q){ $q->where('is_active', true)->orderBy('sort_order'); }])->where('is_active', true)->orderBy('sort_order')->get());

        return view('public.services.index', compact('company','services'));
    }
}
