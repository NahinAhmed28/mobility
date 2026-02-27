<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Project;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $company = Cache::remember('company_profile', 3600, fn() => CompanyProfile::first());

        // Fetch service categories that have projects
        $categories = Cache::remember('public_service_projects', 3600, function() {
            return ServiceCategory::with(['projects' => function($q) {
                $q->where('is_active', true)->orderBy('sort_order');
            }, 'projects.images'])
            ->where('is_active', true)
            ->whereHas('projects', function($q) {
                $q->where('is_active', true);
            })
            ->orderBy('sort_order')
            ->get();
        });

        $active = $request->query('category');
        $selected = null;
        if ($active) {
            $selected = $categories->firstWhere('slug', $active);
        }

        return view('public.projects.index', compact('company','categories','selected'));
    }

    public function show(Project $project)
    {
        $project->load('images', 'serviceCategory');
        $company = Cache::remember('company_profile', 3600, fn() => CompanyProfile::first());
        return view('public.projects.show', compact('company','project'));
    }
}
