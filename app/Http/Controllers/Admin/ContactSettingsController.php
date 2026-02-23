<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactSettingsController extends Controller
{
    public function edit()
    {
        $contact = ContactSetting::first();
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'qr_image' => 'nullable|image|max:2048',
        ]);

        $contact = ContactSetting::first();
        if (! $contact) $contact = new ContactSetting();

        if ($request->hasFile('qr_image')) {
            $path = $request->file('qr_image')->store('public/media');
            $data['qr_image_path'] = Storage::url($path);
        }

        $contact->fill($data);
        $contact->save();

        \Illuminate\Support\Facades\Cache::forget('contact_settings');

        return redirect()->route('admin.contact.edit')->with('success','Contact settings updated successfully');
    }
}
