<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    public function index()
    {
        $company = Cache::remember('company_profile', 60, fn() => CompanyProfile::first());
        return view('public.about', compact('company'));
    }
}
