<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::first();
        return view('admin.company.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'tagline' => 'nullable|string',
            'intro' => 'nullable|string',
            'about_html' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'hero_image' => 'nullable|image|max:4096',
        ]);

        $profile = CompanyProfile::first();
        if (! $profile) $profile = new CompanyProfile();

        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('media', 'public');
        }
        if ($request->hasFile('hero_image')) {
            $data['hero_image_path'] = $request->file('hero_image')->store('media', 'public');
        }

        $profile->fill($data);
        $profile->save();

        \Illuminate\Support\Facades\Cache::forget('company_profile');

        return redirect()->route('admin.company.edit')->with('success','Company profile updated successfully');
    }
}
