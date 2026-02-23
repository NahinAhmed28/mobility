<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Models\CompanyProfile;
use App\Models\ContactMessage;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $company = Cache::remember('company_profile', 60, fn() => CompanyProfile::first());
        $contact = Cache::remember('contact_settings', 60, fn() => ContactSetting::first());
        return view('public.contact', compact('company','contact'));
    }

    public function store(ContactFormRequest $request)
    {
        $data = $request->validated();
        ContactMessage::create($data);

        // Try to notify site owner if email configured
        try {
            $to = optional(ContactSetting::first())->email ?? config('mail.from.address');
            if ($to) {
                Mail::raw("New contact from {$data['name']} ({$data['email']}):\n\n{$data['message']}", function($m) use ($to){
                    $m->to($to)->subject('New contact message');
                });
            }
        } catch (\Throwable $e) {
            // swallow; email is optional
        }

        return redirect()->route('contact')->with('success','Your message has been received.');
    }
}
