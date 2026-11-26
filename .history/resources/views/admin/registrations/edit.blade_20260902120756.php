@extends('layouts.admin')

@section('title', 'Edit Registration')
@php
use Illuminate\Support\Facades\Storage;
@endphp
@section('content')

<div class="container-fluid">

<div class="page-title-head d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-2 mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Registration</h4>
        <p class="text-muted mb-0">
            {{ $registration->first_name }} &middot; {{ $registration->email }}
        </p>
    </div>

    <a href="{{ route('admin.registrations.edit', $registration) }}"
       class="btn btn-iraaya-outline">
        <i class="ti ti-arrow-left me-1"></i>
        Back to Details
    </a>
</div>

<form method="POST"
      action="{{ route('admin.registrations.update', $registration) }}">
    @csrf
    @method('PUT')

    <div class="row g-4">

        {{-- PERSONAL DETAILS --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Personal Details</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text"
                               name="first_name"
                               class="form-control"
                               value="{{ old('first_name', $registration->first_name) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date of Birth</label>
                        <input type="date"
                               name="date_of_birth"
                               class="form-control"
                               value="{{ old('date_of_birth', optional($registration->date_of_birth)->format('Y-m-d')) }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   value="{{ old('phone', $registration->phone) }}"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">WhatsApp</label>
                            <input type="text"
                                   name="whatsapp"
                                   class="form-control"
                                   value="{{ old('whatsapp', $registration->whatsapp) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $registration->email) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">City / Location</label>
                        <input type="text"
                               name="location"
                               class="form-control"
                               value="{{ old('location', $registration->location) }}">
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Social Media</label>
                        <input type="text"
                               name="social_media"
                               class="form-control"
                               value="{{ old('social_media', $registration->social_media) }}">
                    </div>

                </div>
            </div>
        </div>


        {{-- BUSINESS DETAILS --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Business Details</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Business Name</label>
                        <input type="text"
                               name="business_name"
                               class="form-control"
                               value="{{ old('business_name', $registration->business_name) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Company / Brand</label>
                        <input type="text"
                               name="company_name"
                               class="form-control"
                               value="{{ old('company_name', $registration->company_name) }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Business Category</label>
                            <input type="text"
                                   name="business_category"
                                   class="form-control"
                                   value="{{ old('business_category', $registration->business_category) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Designation</label>
                            <input type="text"
                                   name="designation"
                                   class="form-control"
                                   value="{{ old('designation', $registration->designation) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Business Address</label>
                        <textarea name="business_address"
                                  class="form-control"
                                  rows="2">{{ old('business_address', $registration->business_address) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Website</label>
                            <input type="text"
                                   name="website"
                                   class="form-control"
                                   value="{{ old('website', $registration->website) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Years in Business</label>
                            <input type="text"
                                   name="business_age"
                                   class="form-control"
                                   value="{{ old('business_age', $registration->business_age) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Business Description</label>
                        <textarea name="business_description"
                                  class="form-control"
                                  rows="3">{{ old('business_description', $registration->business_description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Products / Services</label>
                        <textarea name="products_services"
                                  class="form-control"
                                  rows="3">{{ old('products_services', $registration->products_services) }}</textarea>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Target Audience</label>
                        <textarea name="target_audience"
                                  class="form-control"
                                  rows="3">{{ old('target_audience', $registration->target_audience) }}</textarea>
                    </div>

                </div>
            </div>
        </div>


        {{-- KYC --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">KYC Details</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">PAN</label>
                        <input type="text"
                               name="pan"
                               class="form-control"
                               value="{{ old('pan', $registration->pan) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Aadhaar Last 4 Digits</label>
                        <input type="text"
                               name="aadhaar_last4"
                               maxlength="4"
                               class="form-control"
                               value="{{ old('aadhaar_last4', $registration->aadhaar_last4) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">GSTIN</label>
                        <input type="text"
                               name="gstin"
                               class="form-control"
                               value="{{ old('gstin', $registration->gstin) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Business Constitution</label>
                        <input type="text"
                               name="business_constitution"
                               class="form-control"
                               value="{{ old('business_constitution', $registration->business_constitution) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Registered Name</label>
                        <input type="text"
                               name="registered_name"
                               class="form-control"
                               value="{{ old('registered_name', $registration->registered_name) }}">
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Registered Address</label>
                        <textarea name="registered_address"
                                  class="form-control"
                                  rows="3">{{ old('registered_address', $registration->registered_address) }}</textarea>
                    </div>

                </div>
            </div>
        </div>


        {{-- EMERGENCY CONTACT --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Emergency Contact</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contact Name</label>
                        <input type="text"
                               name="emergency_contact_name"
                               class="form-control"
                               value="{{ old('emergency_contact_name', $registration->emergency_contact_name) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Relationship</label>
                        <input type="text"
                               name="emergency_relationship"
                               class="form-control"
                               value="{{ old('emergency_relationship', $registration->emergency_relationship) }}">
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Contact Number</label>
                        <input type="text"
                               name="emergency_contact"
                               class="form-control"
                               value="{{ old('emergency_contact', $registration->emergency_contact) }}">
                    </div>

                </div>
            </div>
        </div>


        {{-- MEMBERSHIP --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Membership Details</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preferred Circle</label>
                        <input type="text"
                               name="preferred_circle"
                               class="form-control"
                               value="{{ old('preferred_circle', $registration->preferred_circle) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preferred Location</label>
                        <input type="text"
                               name="preferred_location"
                               class="form-control"
                               value="{{ old('preferred_location', $registration->preferred_location) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">How Did You Hear About Us?</label>
                        <input type="text"
                               name="how_heard"
                               class="form-control"
                               value="{{ old('how_heard', $registration->how_heard) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Referred By</label>
                        <input type="text"
                               name="referred_by"
                               class="form-control"
                               value="{{ old('referred_by', $registration->referred_by) }}">
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Areas of Interest</label>
                        <textarea name="areas_of_interest"
                                  class="form-control"
                                  rows="3">{{ old('areas_of_interest', is_array($registration->areas_of_interest) ? implode(', ', $registration->areas_of_interest) : $registration->areas_of_interest) }}</textarea>
                        <small class="text-muted">
                            Separate multiple interests with commas.
                        </small>
                    </div>

                </div>
            </div>
        </div>


        {{-- PROFILE --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Profile & Participation</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Expertise</label>
                        <textarea name="expertise"
                                  class="form-control"
                                  rows="3">{{ old('expertise', $registration->expertise) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Active Participation</label>
                        <textarea name="active_participation"
                                  class="form-control"
                                  rows="3">{{ old('active_participation', $registration->active_participation) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Leadership Interest</label>
                        <textarea name="leadership_interest"
                                  class="form-control"
                                  rows="3">{{ old('leadership_interest', $registration->leadership_interest) }}</textarea>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Code of Conduct</label>
                        <select name="agree_code" class="form-select">
                            <option value="yes" @selected($registration->agree_code === 'yes')>
                                Yes
                            </option>
                            <option value="no" @selected($registration->agree_code === 'no')>
                                No
                            </option>
                        </select>
                    </div>

                </div>
            </div>
        </div>


        {{-- DECLARATION --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Declaration & Confirmation</h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Declaration Agreement</label>
                        <select name="declaration_agree" class="form-select">
                            <option value="1" @selected($registration->declaration_agree)>
                                Agreed
                            </option>
                            <option value="0" @selected(!$registration->declaration_agree)>
                                Not Agreed
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Applicant Name</label>
                        <input type="text"
                               name="applicant_name"
                               class="form-control"
                               value="{{ old('applicant_name', $registration->applicant_name) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Applicant Date</label>
                        <input type="date"
                               name="applicant_date"
                               class="form-control"
                               value="{{ old('applicant_date', optional($registration->applicant_date)->format('Y-m-d')) }}">
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Place</label>
                        <input type="text"
                               name="place"
                               class="form-control"
                               value="{{ old('place', $registration->place) }}">
                    </div>

                </div>
            </div>
        </div>


        {{-- PAYMENT --}}
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Payment</h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">
                                Amount
                            </label>

                            <input type="number"
                                   name="amount"
                                   class="form-control"
                                   value="{{ old('amount', $registration->amount ?: 11000) }}"
                                   min="0">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">
                                Payment Status
                            </label>

                            <select name="payment_status"
                                    class="form-select"
                                    required>

                                <option value="pending"
                                    @selected($registration->payment_status === 'pending')}>
                                    Pending
                                </option>

                                <option value="paid"
                                    @selected($registration->payment_status === 'paid')}>
                                    Paid
                                </option>

                                <option value="failed"
                                    @selected($registration->payment_status === 'failed')}>
                                    Failed
                                </option>

                                <option value="refunded"
                                    @selected($registration->payment_status === 'refunded')}>
                                    Refunded
                                </option>

                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">
                                Rating
                            </label>

                            <input type="number"
                                   name="rating"
                                   class="form-control"
                                   value="{{ old('rating', $registration->rating) }}"
                                   min="0"
                                   max="5"
                                   step="0.1">
                        </div>

                    </div>

                    <div class="alert alert-light border mb-0">
                        <strong>Razorpay Order ID:</strong>
                        {{ $registration->razorpay_order_id ?: '—' }}
                        <br>

                        <strong>Razorpay Payment ID:</strong>
                        {{ $registration->razorpay_payment_id ?: '—' }}
                    </div>

                </div>
            </div>
        </div>


        {{-- DOCUMENT INFORMATION --}}
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-semibold">Uploaded Documents</h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        @foreach([
                            'pan_document' => 'PAN Card',
                            'aadhaar_document' => 'Aadhaar / ID',
                            'gst_document' => 'GST Certificate',
                            'business_registration_document' => 'Business Registration',
                            'signature' => 'Signature'
                        ] as $field => $label)

                            <div class="col-md-4 col-lg-2 mb-3">
                                <div class="border rounded-3 p-3 text-center">

                                    <div class="fw-semibold mb-2">
                                        {{ $label }}
                                    </div>

                                    @if($registration->$field)

                                        <a href="{{ $registration->documentUrl($registration->$field) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-iraaya-outline">
                                            <i class="ti ti-eye me-1"></i>
                                            View
                                        </a>

                                    @else
                                        <span class="text-muted">Not uploaded</span>
                                    @endif

                                </div>
                            </div>

                        @endforeach

                    </div>

                    <small class="text-muted">
                        Uploaded documents are not replaced from this page.
                        Use the existing document links to view them.
                    </small>

                </div>
            </div>
        </div>


        {{-- ACTIONS --}}
        <div class="col-12">
            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('admin.registrations.edit', $registration) }}"
                   class="btn btn-light border">
                    Cancel
                </a>

                <button type="submit" class="btn btn-iraaya">
                    <i class="ti ti-device-floppy me-1"></i>
                    Update Registration
                </button>

            </div>
        </div>

    </div>

</form>


</div>

@endsection
