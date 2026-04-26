<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ServiceCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('serviceCategory')->orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'location' => 'nullable|string',
            'client' => 'nullable|string',
            'year' => 'nullable|string',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer|min:1',
            'is_featured' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);

        // Handle display_order conflict resolution
        if (!empty($data['display_order'])) {
            $this->resolveDisplayOrderConflict($data['display_order']);
        }

        $project = Project::create($data);
        Cache::forget('public_project_categories');
        Cache::forget('public_service_projects');
        Cache::forget('public_recent_projects');

        return redirect()->route('admin.projects.edit', $project)->with('success', 'Project created. You can now add images.');
    }

    public function edit(Project $project)
    {
        $categories = ServiceCategory::all();
        $project->load('images');
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'location' => 'nullable|string',
            'client' => 'nullable|string',
            'year' => 'nullable|string',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer|min:1',
            'is_featured' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);

        // Handle display_order conflict resolution (exclude current project)
        if (!empty($data['display_order'])) {
            $this->resolveDisplayOrderConflict($data['display_order'], $project->id);
        } else {
            $data['display_order'] = null;
        }

        $project->update($data);
        Cache::forget('public_service_projects');
        Cache::forget('public_recent_projects');

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        Cache::forget('public_service_projects');
        Cache::forget('public_recent_projects');

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }

    public function uploadImage(Request $request, Project $project)
    {
        $request->validate([
            'image' => 'required|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $project->images()->create([
                'image_path' => $path,
            ]);
            Cache::forget('public_project_categories');
            Cache::forget('public_recent_projects');
        }

        return redirect()->back()->with('success', 'Image uploaded successfully');
    }

    public function destroyImage(ProjectImage $image)
    {
        $image->delete();
        Cache::forget('public_project_categories');
        Cache::forget('public_recent_projects');

        return redirect()->back()->with('success', 'Image removed successfully');
    }

    /**
     * If the given display_order value is already taken by another project,
     * shift all projects with display_order >= the given value down by 1
     * (i.e. increment their display_order).
     */
    private function resolveDisplayOrderConflict(int $order, ?int $excludeProjectId = null): void
    {
        $query = Project::where('display_order', $order);
        if ($excludeProjectId) {
            $query->where('id', '!=', $excludeProjectId);
        }

        if ($query->exists()) {
            // Increment display_order for all projects at or below the given position
            // We process from the bottom up to avoid unique constraint violations
            $conflicting = Project::whereNotNull('display_order')
                ->where('display_order', '>=', $order);

            if ($excludeProjectId) {
                $conflicting->where('id', '!=', $excludeProjectId);
            }

            // Get them ordered descending so we shift from bottom up
            $projects = $conflicting->orderBy('display_order', 'desc')->get();

            foreach ($projects as $p) {
                // Temporarily remove unique constraint issue by using DB raw
                DB::table('projects')
                    ->where('id', $p->id)
                    ->update(['display_order' => $p->display_order + 1]);
            }
        }
    }
}
