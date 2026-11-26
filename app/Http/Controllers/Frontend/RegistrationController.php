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
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    private array $fileFields = [
        'pan_document',
        'aadhaar_document',
        'gst_document',
        'business_registration_document',
        'signature',
    ];

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => [
                'required',
                'regex:/^[6-9][0-9]{9}$/',
                Rule::unique('registrations', 'phone')->where(fn ($q) => $q->where('payment_status', 'paid')),
            ],
            'whatsapp' => 'nullable|regex:/^[6-9][0-9]{9}$/',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('registrations', 'email')->where(fn ($q) => $q->where('payment_status', 'paid')),
            ],
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
            'expertise' => 'nullable|string',
            'active_participation' => 'required|string',
            'leadership_interest' => 'required|string',
            'agree_code' => 'required|string',
            'declaration_agree' => 'required',
            'applicant_name' => 'required|string|max:255',
            'applicant_date' => 'required|date',
            'signature' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'place' => 'required|string|max:255',
            'utm_source' => 'nullable|string|max:255',
            'utm_medium' => 'nullable|string|max:255',
            'utm_campaign' => 'nullable|string|max:255',
            'utm_content' => 'nullable|string|max:255',
            'utm_term' => 'nullable|string|max:255',
            'campaign_id' => 'nullable|string|max:255',
            'adset_id' => 'nullable|string|max:255',
            'ad_id' => 'nullable|string|max:255',
            'placement' => 'nullable|string|max:255',
        ], [
            'email.unique' => 'This email is already registered.',
            'phone.unique' => 'This mobile number is already registered.',
        ]);

        $amount = (int) config('services.razorpay.amount', 15340);
        $folder = 'registrations/' . Str::uuid();
        $files = [];

        foreach ($this->fileFields as $field) {
            if ($request->hasFile($field)) {
                $files[$field] = $request->file($field)->store($folder, 'public');
            }
        }

        $order = Http::withBasicAuth(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        )->post('https://api.razorpay.com/v1/orders', [
            'amount' => $amount * 100,
            'currency' => 'INR',
            'receipt' => 'iraaya_' . substr(basename($folder), 0, 8),
            'payment_capture' => 1,
        ]);

        if (! $order->successful()) {
            Storage::disk('public')->deleteDirectory($folder);

            return response()->json([
                'message' => 'Unable to start payment. Please try again.',
            ], 422);
        }

        $this->forgetUnpaidAttempts($request->email, $request->phone);

        $data = $request->except(array_merge($this->fileFields, ['_token']));

        $registration = Registration::create(array_merge($data, $files, [
            'age' => Carbon::parse($data['date_of_birth'])->age . ' Years',
            'locality' => $data['preferred_location'] ?? $data['location'],
            'declaration_agree' => 1,
            'rating' => 0,
            'amount' => $amount,
            'razorpay_order_id' => $order['id'],
            'payment_status' => 'pending',
        ]));

        session([
            'pending_registration' => [
                'id' => $registration->id,
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

        $registration = Registration::query()
            ->where('id', $pending['id'])
            ->where('razorpay_order_id', $request->razorpay_order_id)
            ->first();

        if (! $registration) {
            return response()->json([
                'message' => 'Payment session expired. Please submit the form again.',
            ], 422);
        }

        if ($registration->payment_status === 'paid') {
            return response()->json([
                'redirect' => route('registration.thankyou'),
            ]);
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

        $registration->update([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
            'payment_status' => 'paid',
        ]);

        session()->forget('pending_registration');

        dispatch(function () use ($registration) {
            try {
                Mail::to('janvi@goyalinfotech.com')->send(new RegistrationAdminMail($registration));
                Mail::to($registration->email)->send(new RegistrationConfirmationMail($registration));
            } catch (\Exception $e) {
                Log::error('Registration mail error: ' . $e->getMessage());
            }
        })->afterResponse();

        return response()->json([
            'redirect' => route('registration.thankyou'),
        ]);
    }

    public function thankYou()
    {
        return view('frontend.thank-you');
    }

    private function forgetUnpaidAttempts(string $email, string $phone): void
    {
        $old = Registration::query()
            ->where('payment_status', 'pending')
            ->where(function ($q) use ($email, $phone) {
                $q->where('email', $email)
                    ->orWhere('phone', $phone);
            })
            ->get();

        foreach ($old as $registration) {
            foreach ($this->fileFields as $field) {
                if ($registration->{$field}) {
                    Storage::disk('public')->delete($registration->{$field});
                }
            }

            $registration->delete();
        }
    }
}
