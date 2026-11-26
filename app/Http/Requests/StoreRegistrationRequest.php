<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $file = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120';
        $requiredFile = 'required|file|mimes:jpg,jpeg,png,pdf|max:5120';

        return [
            'first_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before_or_equal:' . now()->subYears(18)->toDateString(),
            'phone' => 'required|string|regex:/^[6-9][0-9]{9}$/',
            'whatsapp' => 'nullable|string|regex:/^[6-9][0-9]{9}$/',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'social_media' => 'nullable|string|max:255',

            'business_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'business_category' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'business_address' => 'required|string|max:2000',
            'website' => 'nullable|string|max:500',
            'business_age' => 'required|string|max:255',
            'business_description' => 'required|string|max:5000',
            'products_services' => 'required|string|max:5000',
            'target_audience' => 'required|string|max:2000',

            'pan' => 'required|string|regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/',
            'aadhaar_last4' => 'required|digits:4',
            'gstin' => 'nullable|string|max:15',
            'business_constitution' => 'required|string|max:255',
            'registered_name' => 'required|string|max:255',
            'registered_address' => 'required|string|max:2000',
            'pan_document' => $requiredFile,
            'aadhaar_document' => $requiredFile,
            'gst_document' => $file,
            'business_registration_document' => $file,
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_relationship' => 'required|string|max:255',
            'emergency_contact' => 'required|string|regex:/^[6-9][0-9]{9}$/',

            'preferred_circle' => 'required|string|max:255',
            'preferred_location' => 'required|string|max:255',
            'how_heard' => 'required|string|max:255',
            'referred_by' => 'nullable|string|max:255',
            'areas_of_interest' => 'required|array|min:1',
            'areas_of_interest.*' => 'string|max:255',

            'expertise' => 'nullable|string|max:5000',
            'active_participation' => 'required|in:Yes,No',
            'leadership_interest' => 'required|in:Yes,Maybe,No',
            'agree_code' => 'required|in:Yes,No',
            'declaration_agree' => 'accepted',

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
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('pan')) {
            $this->merge(['pan' => strtoupper(preg_replace('/\s+/', '', (string) $this->pan))]);
        }

        if ($this->filled('gstin')) {
            $this->merge(['gstin' => strtoupper(preg_replace('/\s+/', '', (string) $this->gstin))]);
        }
    }

    public function messages(): array
    {
        return [
            'date_of_birth.before_or_equal' => 'You must be at least 18 years old to apply.',
            'areas_of_interest.required' => 'Please select at least one area of interest.',
            'declaration_agree.accepted' => 'Please accept the membership declaration to continue.',
            'pan.regex' => 'Enter a valid PAN (e.g. ABCDE1234F).',
        ];
    }
}
