<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactDetail;

class ContactDetailController extends Controller
{
    public function edit()
    {
        $contact = ContactDetail::first();

        return view('admin.contact-details.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone'            => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255',
            'secondary_email'  => 'nullable|email|max:255',
            'address'          => 'nullable|string',
            'facebook'         => 'nullable|string|max:255',
            'instagram'        => 'nullable|string|max:255',
            'youtube'          => 'nullable|string|max:255',
            'linkedin'         => 'nullable|string|max:255',
            'map_url'          => 'nullable|string|max:255',
        ]);

        $contact = ContactDetail::first();

        if (!$contact) {
            $contact = new ContactDetail();
        }

        $contact->phone           = $request->phone;
        $contact->email           = $request->email;
        $contact->secondary_email = $request->secondary_email;
        $contact->address         = $request->address;
        $contact->facebook        = $request->facebook;
        $contact->instagram       = $request->instagram;
        $contact->youtube         = $request->youtube;
        $contact->linkedin        = $request->linkedin;
        $contact->map_url         = $request->map_url;

        $contact->save();

        return redirect()
            ->back()
            ->with('success', 'Contact details updated successfully.');
    }
}