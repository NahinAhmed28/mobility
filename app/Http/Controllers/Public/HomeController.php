<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\ContactSetting;
use App\Models\ServiceCategory;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $company = Cache::remember('company_profile', 60, fn() => CompanyProfile::first());
        $contact = Cache::remember('contact_settings', 60, fn() => ContactSetting::first());

        $services = Cache::remember('public_service_categories', 60, fn() => ServiceCategory::with(['items' => function($q){ $q->where('is_active', true)->orderBy('sort_order'); }])->where('is_active', true)->orderBy('sort_order')->get());

        $projects = Cache::remember('public_project_categories', 60, fn() => ProjectCategory::with(['projects' => function($q){ $q->where('is_active', true)->orderBy('sort_order'); }])->where('is_active', true)->orderBy('sort_order')->get());

        // Featured services and projects
        $featuredServices = $services->flatMap->items->where('is_featured', true)->take(6);
        $featuredProjects = $projects->flatMap->projects->where('is_featured', true)->take(6);

        return view('public.home', compact('company','contact','services','featuredServices','featuredProjects','projects'));
    }
}
