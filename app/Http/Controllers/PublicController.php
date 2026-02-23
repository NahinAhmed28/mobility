<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\ContactSetting;
use App\Models\ServiceCategory;
use App\Models\ProjectCategory;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $company = CompanyProfile::first();
        $services = ServiceCategory::with('items')->where('is_active', true)->orderBy('sort_order')->get();
        $projects = ProjectCategory::with('projects')->where('is_active', true)->orderBy('sort_order')->get();
        $contact = ContactSetting::first();

        return view('public.home', compact('company','services','projects','contact'));
    }

    public function services()
    {
        $services = ServiceCategory::with('items')->where('is_active', true)->orderBy('sort_order')->get();
        $company = CompanyProfile::first();
        return view('public.services', compact('services','company'));
    }

    public function projects()
    {
        $projects = ProjectCategory::with('projects')->where('is_active', true)->orderBy('sort_order')->get();
        $company = CompanyProfile::first();
        return view('public.projects', compact('projects','company'));
    }

    public function about()
    {
        $company = CompanyProfile::first();
        return view('public.about', compact('company'));
    }

    public function contact()
    {
        $contact = ContactSetting::first();
        $company = CompanyProfile::first();
        return view('public.contact', compact('contact','company'));
    }

    public function contactStore(\App\Http\Requests\ContactFormRequest $request)
    {
        $data = $request->validated();
        ContactMessage::create($data);

        // optionally send email - left as TODO but keep simple
        return redirect()->route('contact')->with('success','Your message has been received.');
    }
}
