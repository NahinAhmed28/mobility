<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ServiceCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'is_featured' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $project = Project::create($data);
        \Illuminate\Support\Facades\Cache::forget('public_project_categories');

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
            'is_featured' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $project->update($data);
        \Illuminate\Support\Facades\Cache::forget('public_project_categories');

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        \Illuminate\Support\Facades\Cache::forget('public_project_categories');

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }

    public function uploadImage(Request $request, Project $project)
    {
        $request->validate([
            'image' => 'required|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/projects');
            $project->images()->create([
                'image_path' => Storage::url($path),
            ]);
            \Illuminate\Support\Facades\Cache::forget('public_project_categories');
        }

        return redirect()->back()->with('success', 'Image uploaded successfully');
    }

    public function destroyImage(ProjectImage $image)
    {
        $image->delete();
        \Illuminate\Support\Facades\Cache::forget('public_project_categories');

        return redirect()->back()->with('success', 'Image removed successfully');
    }
}
