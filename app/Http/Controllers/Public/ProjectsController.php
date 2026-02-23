<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Models\Project;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $company = Cache::remember('company_profile', 60, fn() => CompanyProfile::first());

        $categories = Cache::remember('public_project_categories', 60, fn() => ProjectCategory::with(['projects' => function($q){ $q->where('is_active', true)->orderBy('sort_order'); }])->where('is_active', true)->orderBy('sort_order')->get());

        $active = $request->query('category');
        $selected = null;
        if ($active) {
            $selected = $categories->firstWhere('slug', $active);
        }

        return view('public.projects.index', compact('company','categories','selected'));
    }

    public function show(Project $project)
    {
        $company = Cache::remember('company_profile', 60, fn() => CompanyProfile::first());
        return view('public.projects.show', compact('company','project'));
    }
}
