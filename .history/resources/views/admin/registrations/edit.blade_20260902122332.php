@extends('layouts.admin')

@section('title', 'Edit Registration')

@section('content')

<div class="container-fluid px-2 px-md-3 py-3">

    {{-- PAGE HEADER --}}
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2 mb-3">
        <div>
            <h4 class="fw-bold mb-1">Edit Registration</h4>
            <div class="text-muted small text-break">
                {{ $registration->first_name }} · {{ $registration->email }}
            </div>
        </div>

        <a href="{{ route('admin.registrations.show', $registration) }}"
           class="btn btn-iraaya-outline">
            <i class="ti ti-arrow-left me-1"></i>
            Back to Details
        </a>
    </div>

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="alert alert-danger rounded-3 mb-3">
            <strong>Please fix the following:</strong>
            <ul class="mb-0 mt-1 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.registrations.update', $registration) }}">
        @csrf
        @method('PUT')

        <div class="edit-registration">

            {{-- PERSONAL DETAILS --}}
            <div class="edit-card">
                <div class="edit-card-header">
                    <div class="section-icon">
                        <i class="ti ti-user"></i>
                    </div>
                    <div>
                        <h5>Personal Details</h5>
                        <small>Basic applicant information</small>
                    </div>
                </div>

                <div class="edit-card-body">
                    <div class="row gx-3 gy-2">

                        <div class="col-12 col-md-6">
                            <label class="form-label">Name <span>*</span></label>
                            <input type="text"
                                   name="first_name"
                                   class="form-control"
                                   value="{{ old('first_name', $registration->first_name) }}"
                                   required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Email <span>*</span></label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', $registration->email) }}"
                                   required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Phone <span>*</span></label>
                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   value="{{ old('phone', $registration->phone) }}"
                                   required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">WhatsApp</label>
                            <input type="text"
                                   name="whatsapp"
                                   class="form-control"
                                   value="{{ old('whatsapp', $registration->whatsapp) }}">
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Date of Birth</label>
                            <input type="date"
                                   name="date_of_birth"
                                   class="form-control"
                                   value="{{ old('date_of_birth', optional($registration->date_of_birth)->format('Y-m-d')) }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">City / Location</label>
                            <input type="text"
                                   name="location"
                                   class="form-control"
                                   value="{{ old('location', $registration->location) }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Social Media</label>
                            <input type="text"
                                   name="social_media"
                                   class="form-control"
                                   value="{{ old('social_media', $registration->social_media) }}">
                        </div>

                    </div>
                </div>
            </div>


            {{-- BUSINESS DETAILS --}}
            <div class="edit-card">
                <div class="edit-card-header">
                    <div class="section-icon">
                        <i class="ti ti-building-store"></i>
                    </div>
                    <div>
                        <h5>Business Details</h5>
                        <small>Business and professional information</small>
                    </div>
                </div>

                <div class="edit-card-body">
                    <div class="row gx-3 gy-2">

                        <div class="col-12 col-md-6">
                            <label class="form-label">Business Name</label>
                            <input type="text"
                                   name="business_name"
                                   class="form-control"
                                   value="{{ old('business_name', $registration->business_name) }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Company / Brand</label>
                            <input type="text"
                                   name="company_name"
                                   class="form-control"
                                   value="{{ old('company_name', $registration->company_name) }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Business Category</label>
                            <input type="text"
                                   name="business_category"
                                   class="form-control"
                                   value="{{ old('business_category', $registration->business_category) }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Designation</label>
                            <input type="text"
                                   name="designation"
                                   class="form-control"
                                   value="{{ old('designation', $registration->designation) }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Business Address</label>
                            <textarea name="business_address"
                                      class="form-control"
                                      rows="2">{{ old('business_address', $registration->business_address) }}</textarea>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Website</label>
                            <input type="text"
                                   name="website"
                                   class="form-control"
                                   value="{{ old('website', $registration->website) }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Years in Business</label>
                            <input type="text"
                                   name="business_age"
                                   class="form-control"
                                   value="{{ old('business_age', $registration->business_age) }}">
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Business Description</label>
                            <textarea name="business_description"
                                      class="form-control"
                                      rows="3">{{ old('business_description', $registration->business_description) }}</textarea>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Products / Services</label>
                            <textarea name="products_services"
                                      class="form-control"
                                      rows="3">{{ old('products_services', $registration->products_services) }}</textarea>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Target Audience</label>
                            <textarea name="target_audience"
                                      class="form-control"
                                      rows="3">{{ old('target_audience', $registration->target_audience) }}</textarea>
                        </div>

                    </div>
                </div>
            </div>


            {{-- KYC + EMERGENCY --}}
            <div class="row gx-3 gy-3">

                {{-- KYC --}}
                <div class="col-12 col-xl-7">
                    <div class="edit-card h-100">

                        <div class="edit-card-header">
                            <div class="section-icon">
                                <i class="ti ti-id"></i>
                            </div>
                            <div>
                                <h5>KYC Details</h5>
                                <small>Identity and registration information</small>
                            </div>
                        </div>

                        <div class="edit-card-body">
                            <div class="row gx-3 gy-2">

                                <div class="col-12 col-md-6">
                                    <label class="form-label">PAN</label>
                                    <input type="text"
                                           name="pan"
                                           class="form-control"
                                           value="{{ old('pan', $registration->pan) }}">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Aadhaar Last 4 Digits</label>
                                    <input type="text"
                                           name="aadhaar_last4"
                                           maxlength="4"
                                           class="form-control"
                                           value="{{ old('aadhaar_last4', $registration->aadhaar_last4) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">GSTIN</label>
                                    <input type="text"
                                           name="gstin"
                                           class="form-control"
                                           value="{{ old('gstin', $registration->gstin) }}">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Business Constitution</label>
                                    <input type="text"
                                           name="business_constitution"
                                           class="form-control"
                                           value="{{ old('business_constitution', $registration->business_constitution) }}">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Registered Name</label>
                                    <input type="text"
                                           name="registered_name"
                                           class="form-control"
                                           value="{{ old('registered_name', $registration->registered_name) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Registered Address</label>
                                    <textarea name="registered_address"
                                              class="form-control"
                                              rows="2">{{ old('registered_address', $registration->registered_address) }}</textarea>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


                {{-- EMERGENCY --}}
                <div class="col-12 col-xl-5">
                    <div class="edit-card h-100">

                        <div class="edit-card-header">
                            <div class="section-icon">
                                <i class="ti ti-phone"></i>
                            </div>
                            <div>
                                <h5>Emergency Contact</h5>
                                <small>Emergency contact information</small>
                            </div>
                        </div>

                        <div class="edit-card-body">
                            <div class="row gx-3 gy-2">

                                <div class="col-12">
                                    <label class="form-label">Contact Name</label>
                                    <input type="text"
                                           name="emergency_contact_name"
                                           class="form-control"
                                           value="{{ old('emergency_contact_name', $registration->emergency_contact_name) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Relationship</label>
                                    <input type="text"
                                           name="emergency_relationship"
                                           class="form-control"
                                           value="{{ old('emergency_relationship', $registration->emergency_relationship) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text"
                                           name="emergency_contact"
                                           class="form-control"
                                           value="{{ old('emergency_contact', $registration->emergency_contact) }}">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>


            {{-- MEMBERSHIP + PROFILE --}}
            <div class="row gx-3 gy-3">

                {{-- MEMBERSHIP --}}
                <div class="col-12 col-xl-6">
                    <div class="edit-card h-100">

                        <div class="edit-card-header">
                            <div class="section-icon">
                                <i class="ti ti-users"></i>
                            </div>
                            <div>
                                <h5>Membership Details</h5>
                                <small>Circle and membership preferences</small>
                            </div>
                        </div>

                        <div class="edit-card-body">
                            <div class="row gx-3 gy-2">

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Preferred Circle</label>
                                    <input type="text"
                                           name="preferred_circle"
                                           class="form-control"
                                           value="{{ old('preferred_circle', $registration->preferred_circle) }}">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Preferred Location</label>
                                    <input type="text"
                                           name="preferred_location"
                                           class="form-control"
                                           value="{{ old('preferred_location', $registration->preferred_location) }}">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">How Did You Hear About Us?</label>
                                    <input type="text"
                                           name="how_heard"
                                           class="form-control"
                                           value="{{ old('how_heard', $registration->how_heard) }}">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label">Referred By</label>
                                    <input type="text"
                                           name="referred_by"
                                           class="form-control"
                                           value="{{ old('referred_by', $registration->referred_by) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Areas of Interest</label>
                                    <textarea name="areas_of_interest"
                                              class="form-control"
                                              rows="2">{{ old('areas_of_interest', is_array($registration->areas_of_interest) ? implode(', ', $registration->areas_of_interest) : $registration->areas_of_interest) }}</textarea>
                                    <small class="text-muted">
                                        Separate multiple interests with commas.
                                    </small>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>


                {{-- PROFILE --}}
                <div class="col-12 col-xl-6">
                    <div class="edit-card h-100">

                        <div class="edit-card-header">
                            <div class="section-icon">
                                <i class="ti ti-user-star"></i>
                            </div>
                            <div>
                                <h5>Profile & Participation</h5>
                                <small>Expertise and participation preferences</small>
                            </div>
                        </div>

                        <div class="edit-card-body">
                            <div class="row gx-3 gy-2">

                                <div class="col-12">
                                    <label class="form-label">Expertise</label>
                                    <textarea name="expertise"
                                              class="form-control"
                                              rows="2">{{ old('expertise', $registration->expertise) }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Active Participation</label>
                                    <textarea name="active_participation"
                                              class="form-control"
                                              rows="2">{{ old('active_participation', $registration->active_participation) }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Leadership Interest</label>
                                    <textarea name="leadership_interest"
                                              class="form-control"
                                              rows="2">{{ old('leadership_interest', $registration->leadership_interest) }}</textarea>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Code of Conduct</label>
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
                </div>

            </div>


            {{-- DECLARATION --}}
            <div class="edit-card">

                <div class="edit-card-header">
                    <div class="section-icon">
                        <i class="ti ti-file-check"></i>
                    </div>
                    <div>
                        <h5>Declaration & Confirmation</h5>
                        <small>Applicant declaration details</small>
                    </div>
                </div>

                <div class="edit-card-body">
                    <div class="row gx-3 gy-2">

                        <div class="col-12 col-md-4">
                            <label class="form-label">Declaration Agreement</label>
                            <select name="declaration_agree" class="form-select">
                                <option value="1" @selected($registration->declaration_agree)>
                                    Agreed
                                </option>
                                <option value="0" @selected(!$registration->declaration_agree)>
                                    Not Agreed
                                </option>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Applicant Name</label>
                            <input type="text"
                                   name="applicant_name"
                                   class="form-control"
                                   value="{{ old('applicant_name', $registration->applicant_name) }}">
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Applicant Date</label>
                            <input type="date"
                                   name="applicant_date"
                                   class="form-control"
                                   value="{{ old('applicant_date', optional($registration->applicant_date)->format('Y-m-d')) }}">
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">Place</label>
                            <input type="text"
                                   name="place"
                                   class="form-control"
                                   value="{{ old('place', $registration->place) }}">
                        </div>

                    </div>
                </div>

            </div>


            {{-- PAYMENT --}}
            <div class="edit-card">

                <div class="edit-card-header">
                    <div class="section-icon">
                        <i class="ti ti-credit-card"></i>
                    </div>
                    <div>
                        <h5>Payment</h5>
                        <small>Membership payment information</small>
                    </div>
                </div>

                <div class="edit-card-body">

                    <div class="row gx-3 gy-2">

                        <div class="col-12 col-md-4">
                            <label class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number"
                                       name="amount"
                                       class="form-control"
                                       value="{{ old('amount', $registration->amount ?: 11000) }}"
                                       min="0">
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Payment Status</label>
                            <select name="payment_status"
                                    class="form-select"
                                    required>
                                <option value="pending"
                                    @selected($registration->payment_status === 'pending')>
                                    Pending
                                </option>

                                <option value="paid"
                                    @selected($registration->payment_status === 'paid')>
                                    Paid
                                </option>

                                <option value="failed"
                                    @selected($registration->payment_status === 'failed')>
                                    Failed
                                </option>

                                <option value="refunded"
                                    @selected($registration->payment_status === 'refunded')>
                                    Refunded
                                </option>
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label class="form-label">Rating</label>
                            <input type="number"
                                   name="rating"
                                   class="form-control"
                                   value="{{ old('rating', $registration->rating) }}"
                                   min="0"
                                   max="5"
                                   step="0.1">
                        </div>

                    </div>

                    <div class="payment-info mt-3">
                        <div>
                            <span>Razorpay Order ID</span>
                            <strong>{{ $registration->razorpay_order_id ?: '—' }}</strong>
                        </div>

                        <div>
                            <span>Razorpay Payment ID</span>
                            <strong>{{ $registration->razorpay_payment_id ?: '—' }}</strong>
                        </div>
                    </div>

                </div>

            </div>


            {{-- DOCUMENTS --}}
            <div class="edit-card">

                <div class="edit-card-header">
                    <div class="section-icon">
                        <i class="ti ti-file"></i>
                    </div>
                    <div>
                        <h5>Uploaded Documents</h5>
                        <small>Existing uploaded documents</small>
                    </div>
                </div>

                <div class="edit-card-body">

                    <div class="row gx-3 gy-3">

                        @foreach([
                            'pan_document' => 'PAN Card',
                            'aadhaar_document' => 'Aadhaar / ID',
                            'gst_document' => 'GST Certificate',
                            'business_registration_document' => 'Business Registration',
                            'signature' => 'Signature'
                        ] as $field => $label)

                            <div class="col-12 col-sm-6 col-md-4 col-xl">
                                <div class="document-box">

                                    <div class="document-icon">
                                        <i class="ti ti-file-description"></i>
                                    </div>

                                    <div class="document-title">
                                        {{ $label }}
                                    </div>

                                    @if($registration->$field)

                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($registration->$field) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-iraaya-outline w-100">
                                            <i class="ti ti-eye me-1"></i>
                                            View
                                        </a>

                                    @else

                                        <span class="text-muted small">
                                            Not uploaded
                                        </span>

                                    @endif

                                </div>
                            </div>

                        @endforeach

                    </div>

                    <div class="text-muted small mt-3">
                        Uploaded documents cannot be replaced from this page.
                    </div>

                </div>

            </div>


            {{-- ACTION BAR --}}
            <div class="edit-actions">

                <a href="{{ route('admin.registrations.show', $registration) }}"
                   class="btn btn-light border">
                    Cancel
                </a>

                <button type="submit"
                        class="btn btn-iraaya">
                    <i class="ti ti-device-floppy me-1"></i>
                    Update Registration
                </button>

            </div>

        </div>

    </form>
</div>


<style>

.edit-registration {
    max-width: 1400px;
    margin: 0 auto;
}

.edit-card {
    background: #fff;
    border: 1px solid #edf0f3;
    border-radius: 12px;
    margin-bottom: 14px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
}

.edit-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 16px;
    border-bottom: 1px solid #edf0f3;
    background: #fff;
}

.edit-card-header h5 {
    margin: 0;
    font-size: 15px;
    font-weight: 700;
}

.edit-card-header small {
    display: block;
    margin-top: 2px;
    color: #8a929d;
    font-size: 11px;
}

.section-icon {
    width: 34px;
    height: 34px;
    min-width: 34px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f7f9;
    font-size: 17px;
}

.edit-card-body {
    padding: 15px 16px;
}

.form-label {
    font-size: 12px;
    font-weight: 600;
    color: #3f4650;
    margin-bottom: 5px;
}

.form-label span {
    color: #dc3545;
}

.form-control,
.form-select {
    min-height: 39px;
    border-radius: 7px;
    border-color: #dfe3e8;
    font-size: 13px;
    padding: 8px 11px;
}

textarea.form-control {
    min-height: auto;
    resize: vertical;
}

.form-control:focus,
.form-select:focus {
    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.04);
}

.input-group-text {
    font-size: 13px;
    border-color: #dfe3e8;
    background: #f8f9fa;
}

.payment-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    padding: 11px 13px;
    background: #f8f9fa;
    border: 1px solid #edf0f3;
    border-radius: 8px;
}

.payment-info span {
    display: block;
    color: #8a929d;
    font-size: 11px;
    margin-bottom: 3px;
}

.payment-info strong {
    display: block;
    font-size: 12px;
    font-weight: 600;
    word-break: break-all;
}

.document-box {
    height: 100%;
    min-height: 135px;
    padding: 13px;
    border: 1px solid #e8ebee;
    border-radius: 9px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.document-icon {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: #f5f7f9;
    margin-bottom: 7px;
}

.document-title {
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 9px;
}

.edit-actions {
    position: sticky;
    bottom: 0;
    z-index: 10;
    display: flex;
    justify-content: flex-end;
    gap: 8px;
    padding: 12px 0 2px;
    background: rgba(255, 255, 255, 0.96);
    border-top: 1px solid #edf0f3;
}

.edit-actions .btn {
    min-height: 39px;
    padding: 8px 17px;
    border-radius: 7px;
    font-size: 13px;
}

@media (max-width: 767.98px) {

    .container-fluid {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    .edit-card {
        margin-bottom: 10px;
        border-radius: 9px;
    }

    .edit-card-header {
        padding: 11px 12px;
        gap: 9px;
    }

    .edit-card-body {
        padding: 12px;
    }

    .section-icon {
        width: 30px;
        height: 30px;
        min-width: 30px;
        font-size: 15px;
    }

    .edit-card-header h5 {
        font-size: 14px;
    }

    .edit-card-header small {
        font-size: 10px;
    }

    .payment-info {
        grid-template-columns: 1fr;
    }

    .edit-actions {
        flex-direction: column-reverse;
        padding: 10px 0;
    }

    .edit-actions .btn {
        width: 100%;
    }

}

@media (min-width: 1200px) {
    .col-xl {
        flex: 1 0 0%;
        width: auto;
    }
}

</style>

@endsection

