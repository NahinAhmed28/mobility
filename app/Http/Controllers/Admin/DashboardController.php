<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\ContactSetting;

class DashboardController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first();
        $contact = ContactSetting::first();
        return view('admin.dashboard', compact('company','contact'));
    }
}
