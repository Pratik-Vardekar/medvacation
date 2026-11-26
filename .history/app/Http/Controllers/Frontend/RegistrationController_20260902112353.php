<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Mail\RegistrationAdminMail;
use App\Mail\RegistrationConfirmationMail;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function store(StoreRegistrationRequest $request)
    {
        $data = $request->validated();

        // Remove uploaded files from normal data
        $files = [
            'pan_document',
            'aadhaar_document',
            'gst_document',
            'business_registration_document',
            'signature',
        ];

        foreach ($files as $file) {
            unset($data[$file]);
        }

        // Calculate age
        $data['age'] = Carbon::parse($request->date_of_birth)->age . ' Years';

        // Other default values
        $data['locality'] = $request->preferred_location ?? $request->location;
        $data['rating'] = 0;
        $data['payment_status'] = 'pending';
        $data['lead_type'] = 'hot';
        $data['declaration_agree'] = $request->has('declaration_agree');

        // Convert checkbox array to JSON
        if ($request->has('areas_of_interest')) {
            $data['areas_of_interest'] = $request->areas_of_interest;
        }

        // Upload documents
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)
                    ->store('registrations', 'public');
            }
        }

        // SAVE REGISTRATION IN DATABASE
        $registration = Registration::create($data);

        // Razorpay amount
        $amount = $this->payableAmount();

        // Create Razorpay order
        $order = Http::withBasicAuth(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        )->post('https://api.razorpay.com/v1/orders', [
            'amount' => $amount * 100,
            'currency' => 'INR',
            'receipt' => 'iraaya_' . $registration->id,
            'payment_capture' => 1,
        ]);

        if (!$order->successful()) {
            return response()->json([
                'message' => 'Registration saved, but payment could not be started.'
            ], 422);
        }

        // Save Razorpay order ID
        $registration->update([
            'amount' => $amount,
            'razorpay_order_id' => $order['id'],
        ]);

        // Store registration ID
        session([
            'registration_id' => $registration->id
        ]);

        return response()->json([
            'key' => config('services.razorpay.key'),
            'order_id' => $order['id'],
            'amount' => $amount * 100,
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

        // Get registration
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

        if (!hash_equals($signature, $request->razorpay_signature)) {
            return response()->json([
                'message' => 'Payment verification failed.'
            ], 422);
        }

        // Update payment details
        $registration->update([
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
            'payment_status' => 'paid',
        ]);

        // Clear session
        session()->forget('registration_id');

        // Send emails
        try {
            Mail::to('janvi@goyalinfotech.com', 'Iraaya World')
                ->send(new RegistrationAdminMail($registration));

            Mail::to($registration->email, $registration->first_name)
                ->send(new RegistrationConfirmationMail($registration));

        } catch (\Exception $e) {
            Log::error('Registration mail error: ' . $e->getMessage());
        }

        return response()->json([
            'redirect' => route('registration.thankyou')
        ]);
    }


    public function thankYou()
    {
        return view('frontend.thank-you');
    }


    private function payableAmount(): int
    {
        $base = (int) config('services.razorpay.amount');
        $gst = (int) config('services.razorpay.gst_percent');

        return (int) round(
            $base + ($base * $gst / 100)
        );
    }
}