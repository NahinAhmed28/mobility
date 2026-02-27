<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\ContactSetting;
use App\Models\ServiceCategory;
use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $company = Cache::remember('company_profile', 3600, fn() => CompanyProfile::first());
        $contact = Cache::remember('contact_settings', 3600, fn() => ContactSetting::first());

        $services = Cache::remember('public_service_categories', 3600, fn() => ServiceCategory::with(['items' => function($q){ $q->where('is_active', true)->orderBy('sort_order'); }])->where('is_active', true)->orderBy('sort_order')->get());

        // Featured services
        $featuredServices = $services->flatMap->items->where('is_featured', true)->take(6);

        // Featured projects
        $featuredProjects = Cache::remember('public_featured_projects', 3600, function() {
            return Project::with('serviceCategory', 'images')
                ->where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('sort_order')
                ->take(6)
                ->get();
        });

        return view('public.home', compact('company','contact','services','featuredServices','featuredProjects'));
    }
}
