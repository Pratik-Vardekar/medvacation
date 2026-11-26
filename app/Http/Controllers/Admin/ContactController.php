<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|digits:10',
            'country' => 'nullable|string|max:255',
            'service' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $data['form_type'] = 'contact_page';

        $enquiry = ContactEnquiry::create($data);

        defer(function () use ($enquiry) {
            try {
                Mail::to(config('mail.admin_address'))->send(new ContactAdminMail($enquiry));
                Mail::to($enquiry->email, $enquiry->name)->send(new ContactUserMail($enquiry));
            } catch (\Exception $e) {
                Log::error('Contact mail failed: ' . $e->getMessage());
            }
        });

        return back()->with('success', 'Thank you for contacting Med Vacation. Our team will get back to you shortly.');
    }

    public function index()
    {
        $enquiries = ContactEnquiry::latest()->get();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function contactEnquiries()
    {
        $enquiries = ContactEnquiry::where('form_type', 'contact_page')
            ->latest()
            ->get();

        return view('admin.enquiries.contact', compact('enquiries'));
    }

    public function appraisalEnquiries()
    {
        $enquiries = ContactEnquiry::where('form_type', 'free_appraisal')
            ->latest()
            ->get();

        return view('admin.enquiries.appraisal', compact('enquiries'));
    }

    public function propertyEnquiries()
    {
        $enquiries = ContactEnquiry::where('form_type', 'property_enquiry')
            ->latest()
            ->get();

        return view('admin.enquiries.property', compact('enquiries'));
    }

    public function delete($id)
    {
        $enquiry = ContactEnquiry::findOrFail($id);

        $enquiry->delete();

        return back()->with(
            'success',
            'Enquiry deleted successfully.'
        );
    }
}
