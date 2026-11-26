<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            // Personal
            'first_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => 'required|regex:/^[6-9][0-9]{9}$/',
            'whatsapp' => 'nullable|regex:/^[6-9][0-9]{9}$/',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'social_media' => 'nullable|string|max:255',

            // Business
            'business_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'business_category' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'business_address' => 'required|string',
            'website' => 'nullable|string|max:255',
            'business_age' => 'required|string|max:255',
            'business_description' => 'required|string',
            'products_services' => 'required|string',
            'target_audience' => 'required|string',

            // KYC
            'pan' => 'required|string|max:10',
            'aadhaar_last4' => 'required|digits:4',
            'gstin' => 'nullable|string|max:15',
            'business_constitution' => 'required|string|max:255',
            'registered_name' => 'required|string|max:255',
            'registered_address' => 'required|string',

            'pan_document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'aadhaar_document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'gst_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'business_registration_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',

            // Emergency
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_relationship' => 'required|string|max:255',
            'emergency_contact' => 'required|regex:/^[6-9][0-9]{9}$/',

            // Membership
            'preferred_circle' => 'required|string|max:255',
            'preferred_location' => 'required|string|max:255',
            'how_heard' => 'required|string|max:255',
            'referred_by' => 'nullable|string|max:255',
            'areas_of_interest' => 'required|array',

            // Profile
            'expertise' => 'required|string',
            'active_participation' => 'required|string',
            'leadership_interest' => 'required|string',
            'agree_code' => 'required|string',

            // Declaration
            'declaration_agree' => 'required',

            // Confirmation
            'applicant_name' => 'required|string|max:255',
            'applicant_date' => 'required|date',
            'signature' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'place' => 'required|string|max:255',
        ]);


        // Upload files
        $panDocument = $request->file('pan_document')
            ->store('registrations', 'public');

        $aadhaarDocument = $request->file('aadhaar_document')
            ->store('registrations', 'public');

        $gstDocument = null;

        if ($request->hasFile('gst_document')) {
            $gstDocument = $request->file('gst_document')
                ->store('registrations', 'public');
        }

        $businessRegistrationDocument = null;

        if ($request->hasFile('business_registration_document')) {
            $businessRegistrationDocument = $request->file('business_registration_document')
                ->store('registrations', 'public');
        }

        $signature = null;

        if ($request->hasFile('signature')) {
            $signature = $request->file('signature')
                ->store('registrations', 'public');
        }


        // Create registration
        $registration = Registration::create([

            // Personal
            'first_name' => $request->first_name,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'location' => $request->location,

            'age' => Carbon::parse($request->date_of_birth)->age . ' Years',

            'locality' => $request->preferred_location ?? $request->location,

            'social_media' => $request->social_media,

            // Business
            'business_name' => $request->business_name,
            'company_name' => $request->company_name,
            'business_category' => $request->business_category,
            'designation' => $request->designation,
            'business_address' => $request->business_address,
            'website' => $request->website,
            'business_age' => $request->business_age,
            'business_description' => $request->business_description,
            'products_services' => $request->products_services,
            'target_audience' => $request->target_audience,

            // KYC
            'pan' => $request->pan,
            'aadhaar_last4' => $request->aadhaar_last4,
            'gstin' => $request->gstin,
            'business_constitution' => $request->business_constitution,
            'registered_name' => $request->registered_name,
            'registered_address' => $request->registered_address,

            'pan_document' => $panDocument,
            'aadhaar_document' => $aadhaarDocument,
            'gst_document' => $gstDocument,
            'business_registration_document' => $businessRegistrationDocument,

            // Emergency
            'emergency_contact_name' => $request->emergency_contact_name,
            'emergency_relationship' => $request->emergency_relationship,
            'emergency_contact' => $request->emergency_contact,

            // Membership
            'preferred_circle' => $request->preferred_circle,
            'preferred_location' => $request->preferred_location,
            'how_heard' => $request->how_heard,
            'referred_by' => $request->referred_by,
            'areas_of_interest' => $request->areas_of_interest,

            // Profile
            'expertise' => $request->expertise,
            'active_participation' => $request->active_participation,
            'leadership_interest' => $request->leadership_interest,
            'agree_code' => $request->agree_code,

            // Declaration
            'declaration_agree' => 1,

            // Confirmation
            'applicant_name' => $request->applicant_name,
            'applicant_date' => $request->applicant_date,
            'signature' => $signature,
            'place' => $request->place,

            // Default
            'rating' => 0,
            'amount' => 11000,
            'payment_status' => 'pending',
            'lead_type' => 'warm',
        ]);


        // Razorpay order
        $order = Http::withBasicAuth(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        )->post('https://api.razorpay.com/v1/orders', [

            'amount' => 11000 * 100,

            'currency' => 'INR',

            'receipt' => 'iraaya_' . $registration->id,

            'payment_capture' => 1,
        ]);


        if (!$order->successful()) {

            return response()->json([
                'message' => 'Registration saved but payment could not be started.'
            ], 422);
        }


        // Save Razorpay order ID
        $registration->update([
            'razorpay_order_id' => $order['id']
        ]);


        // Save registration ID in session
        session([
            'registration_id' => $registration->id
        ]);


        return response()->json([

            'key' => config('services.razorpay.key'),

            'order_id' => $order['id'],

            'amount' => 11000 * 100,

            'name' => $registration->first_name,

            'email' => $registration->email,

            'contact' => $registration->phone,
        ]);
    }


    public function verify(Request $request)
    {
        $request->validate([
            'razorpay_order_id' => 'required',
            'razorpay_payment_id' => 'required',
            'razorpay_signature' => 'required',
        ]);


        $registration = Registration::find(
            session('registration_id')
        );


        if (!$registration) {

            return response()->json([
                'message' => 'Registration not found.'
            ], 422);
        }


        // Verify Razorpay signature
        $signature = hash_hmac(
            'sha256',
            $request->razorpay_order_id . '|' . $request->razorpay_payment_id,
            config('services.razorpay.secret')
        );


        if (!hash_equals(
            $signature,
            $request->razorpay_signature
        )) {

            return response()->json([
                'message' => 'Payment verification failed.'
            ], 422);
        }


        // Payment successful
        $registration->update([

            'razorpay_order_id' => $request->razorpay_order_id,

            'razorpay_payment_id' => $request->razorpay_payment_id,

            'razorpay_signature' => $request->razorpay_signature,

            'payment_status' => 'paid',
        ]);


        session()->forget('registration_id');


        // Emails
        try {

            Mail::to('janvi@goyalinfotech.com')
                ->send(new \App\Mail\RegistrationAdminMail($registration));

            Mail::to($registration->email)
                ->send(new \App\Mail\RegistrationConfirmationMail($registration));

        } catch (\Exception $e) {

            Log::error(
                'Registration mail error: ' . $e->getMessage()
            );
        }


        return response()->json([

            'redirect' => route('registration.thankyou')

        ]);
    }


    public function thankYou()
    {
        return view('frontend.thank-you');
    }
}