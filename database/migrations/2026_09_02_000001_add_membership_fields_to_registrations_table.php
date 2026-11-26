<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->after('first_name');
            $table->string('whatsapp')->nullable()->after('phone');
            $table->string('social_media')->nullable()->after('locality');
            $table->string('company_name')->nullable()->after('business_name');
            $table->string('business_category')->nullable()->after('company_name');
            $table->string('designation')->nullable()->after('business_category');
            $table->text('business_address')->nullable()->after('designation');
            $table->text('business_description')->nullable()->after('business_age');
            $table->text('products_services')->nullable()->after('business_description');
            $table->text('target_audience')->nullable()->after('products_services');
            $table->string('pan')->nullable()->after('website');
            $table->string('aadhaar_last4', 4)->nullable()->after('pan');
            $table->string('gstin')->nullable()->after('aadhaar_last4');
            $table->string('business_constitution')->nullable()->after('gstin');
            $table->string('registered_name')->nullable()->after('business_constitution');
            $table->text('registered_address')->nullable()->after('registered_name');
            $table->string('pan_document')->nullable()->after('registered_address');
            $table->string('aadhaar_document')->nullable()->after('pan_document');
            $table->string('gst_document')->nullable()->after('aadhaar_document');
            $table->string('business_registration_document')->nullable()->after('gst_document');
            $table->string('emergency_contact_name')->nullable()->after('business_registration_document');
            $table->string('emergency_relationship')->nullable()->after('emergency_contact_name');
            $table->string('emergency_contact')->nullable()->after('emergency_relationship');
            $table->string('preferred_circle')->nullable()->after('emergency_contact');
            $table->string('preferred_location')->nullable()->after('preferred_circle');
            $table->string('how_heard')->nullable()->after('preferred_location');
            $table->string('referred_by')->nullable()->after('how_heard');
            $table->json('areas_of_interest')->nullable()->after('referred_by');
            $table->text('expertise')->nullable()->after('areas_of_interest');
            $table->string('active_participation')->nullable()->after('expertise');
            $table->string('leadership_interest')->nullable()->after('active_participation');
            $table->string('agree_code')->nullable()->after('leadership_interest');
            $table->boolean('declaration_agree')->default(false)->after('agree_code');
            $table->string('applicant_name')->nullable()->after('declaration_agree');
            $table->date('applicant_date')->nullable()->after('applicant_name');
            $table->string('signature')->nullable()->after('applicant_date');
            $table->string('place')->nullable()->after('signature');
            $table->unsignedInteger('amount')->nullable()->after('rating');
            $table->string('razorpay_order_id')->nullable()->after('amount');
            $table->string('razorpay_payment_id')->nullable()->after('razorpay_order_id');
            $table->string('razorpay_signature')->nullable()->after('razorpay_payment_id');
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('campaign_id')->nullable();
            $table->string('adset_id')->nullable();
            $table->string('ad_id')->nullable();
            $table->string('placement')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_birth',
                'whatsapp',
                'social_media',
                'company_name',
                'business_category',
                'designation',
                'business_address',
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
                'amount',
                'razorpay_order_id',
                'razorpay_payment_id',
                'razorpay_signature',
                'utm_source',
                'utm_medium',
                'utm_campaign',
                'utm_content',
                'utm_term',
                'campaign_id',
                'adset_id',
                'ad_id',
                'placement',
            ]);
        });
    }
};
