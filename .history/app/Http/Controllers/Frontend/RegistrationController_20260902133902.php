<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationAdminMail;
use App\Mail\RegistrationConfirmationMail;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => 'required|regex:/^[6-9][0-9]{9}$/',
            'whatsapp' => 'nullable|regex:/^[6-9][0-9]{9}$/',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'social_media' => 'nullable|string|max:255',
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
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_relationship' => 'required|string|max:255',
            'emergency_contact' => 'required|regex:/^[6-9][0-9]{9}$/',
            'preferred_circle' => 'required|string|max:255',
            'preferred_location' => 'required|string|max:255',
            'how_heard' => 'required|string|max:255',
            'referred_by' => 'nullable|string|max:255',
            'areas_of_interest' => 'required|array',
            'expertise' => 'required|string',
            'active_participation' => 'required|string',
            'leadership_interest' => 'required|string',
            'agree_code' => 'required|string',
            'declaration_agree' => 'required',
            'applicant_name' => 'required|string|max:255',
            'applicant_date' => 'required|date',
            'signature' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'place' => 'required|string|max:255',
        ]);

        $amount = (int) config('services.razorpay.amount', 11000);
        $tempId = (string) Str::uuid();
        $files = [];

        foreach ([
            'pan_document',
            'aadhaar_document',
            'gst_document',
            'business_registration_document',
            'signature',
        ] as $field) {
            if ($request->hasFile($field)) {
                $files[$field] = $request->file($field)->store('tmp/registrations/' . $tempId, 'local');
            }
        }

        $order = Http::withBasicAuth(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        )->post('https://api.razorpay.com/v1/orders', [
            'amount' => $amount * 100,
            'currency' => 'INR',
            'receipt' => 'iraaya_' . substr($tempId, 0, 8),
            'payment_capture' => 1,
        ]);

        if (! $order->successful()) {
            return response()->json([
                'message' => 'Unable to start payment. Please try again.',
            ], 422);
        }

        session([
            'pending_registration' => [
                'data' => $request->except([
                    'pan_document',
                    'aadhaar_document',
                    'gst_document',
                    'business_registration_document',
                    'signature',
                    '_token',
                ]),
                'files' => $files,
                'temp_id' => $tempId,
                'amount' => $amount,
                'order_id' => $order['id'],
            ],
        ]);

        return response()->json([
            'key' => config('services.razorpay.key'),
            'order_id' => $order['id'],
            'amount' => $amount * 100,
            'name' => $request->first_name,
            'email' => $request->email,
            'contact' => $request->phone,
        ]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'razorpay_order_id' => 'required',
            'razorpay_payment_id' => 'required',
            'razorpay_signature' => 'required',
        ]);

        $pending = session('pending_registration');

        if (! $pending || $pending['order_id'] !== $request->razorpay_order_id) {
            return response()->json([
                'message' => 'Payment session expired. Please submit the form again.',
            ], 422);
        }

        $expected = hash_hmac(
            'sha256',
            $request->razorpay_order_id . '|' . $request->razorpay_payment_id,
            config('services.razorpay.secret')
        );

        if (! hash_equals($expected, $request->razorpay_signature)) {
            return response()->json([
                'message' => 'Payment verification failed.',
            ], 422);
        }

        $savedFiles = [];
        foreach ($pending['files'] as $field => $path) {
            $dest = 'registrations/' . $pending['temp_id'] . '/' . basename($path);
            Storage::disk('public')->put($dest, Storage::disk('local')->get($path));
            Storage::disk('local')->delete($path);
            $savedFiles[$field] = $dest;
        }

        $data = $pending['data'];

        $registration = Registration::create(array_merge($data, $savedFiles, [
            'age' => Carbon::parse($data['date_of_birth'])->age . ' Years',
            'locality' => $data['preferred_location'] ?? $data['location'],
            'declaration_agree' => 1,
            'rating' => 0,
            'amount' => $pending['amount'],
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
            'payment_status' => 'paid',
            'lead_type' => 'hot',
        ]));

        session()->forget('pending_registration');

        try {
            Mail::to('janvi@goyalinfotech.com')->send(new RegistrationAdminMail($registration));
            Mail::to($registration->email)->send(new RegistrationConfirmationMail($registration));
        } catch (\Exception $e) {
            Log::error('Registration mail error: ' . $e->getMessage());
        }

        return response()->json([
            'redirect' => route('registration.thankyou'),
        ]);
    }

    public function thankYou()
    {
        return view('frontend.thank-you');
    }
}
