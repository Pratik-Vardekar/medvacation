<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [

        'first_name',
        'date_of_birth',
        'email',
        'phone',
        'whatsapp',
        'location',
        'age',
        'locality',
        'social_media',

        'business_name',
        'company_name',
        'business_category',
        'designation',
        'business_address',
        'website',
        'business_age',
        'business_description',
        'products_services',
        'target_audience',

        'pan',
        'aadhaar_last4',
        'gstin',
        'business_constitution',
        'registered_name',
        'registered_address',

        'pan_document',
        'aadhaar_document',
        'gst_document',
        'business_registration_document',

        'emergency_contact_name',
        'emergency_relationship',
        'emergency_contact',

        'preferred_circle',
        'preferred_location',
        'how_heard',
        'referred_by',
        'areas_of_interest',

        'expertise',
        'active_participation',
        'leadership_interest',
        'agree_code',

        'declaration_agree',

        'applicant_name',
        'applicant_date',
        'signature',
        'place',

        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'utm_term',
        'campaign_id',
        'adset_id',
        'ad_id',
        'placement',

        'rating',
        'amount',

        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',

        'payment_status',
        'lead_type',
    ];


    protected $casts = [
        'areas_of_interest' => 'array',
        'declaration_agree' => 'boolean',
        'date_of_birth' => 'date',
        'applicant_date' => 'date',
    ];
}