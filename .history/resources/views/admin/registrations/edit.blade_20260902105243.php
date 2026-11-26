@extends('layouts.admin')

@section('title', 'Registration Details')

@section('content')
@php
    $docs = [
        'pan_document' => 'PAN Card',
        'aadhaar_document' => 'Aadhaar / ID',
        'gst_document' => 'GST Certificate',
        'business_registration_document' => 'Business Registration',
        'signature' => 'Signature',
    ];
@endphp
<div class="container-fluid">
    <div class="page-title-head d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-2 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Registration Details</h4>
            <p class="text-muted mb-0">{{ $registration->first_name }} &middot; {{ $registration->email }}</p>
        </div>
        <a href="{{ route('admin.registrations.index') }}" class="btn btn-iraaya-outline">
            <i class="ti ti-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3"><h5 class="mb-0 fw-semibold">Personal</h5></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 text-muted">Name</dt><dd class="col-sm-8">{{ $registration->first_name }}</dd>
                        <dt class="col-sm-4 text-muted">Date of Birth</dt><dd class="col-sm-8">{{ optional($registration->date_of_birth)->format('d M Y') ?: '—' }} ({{ $registration->age }})</dd>
                        <dt class="col-sm-4 text-muted">Email</dt><dd class="col-sm-8">{{ $registration->email }}</dd>
                        <dt class="col-sm-4 text-muted">Phone</dt><dd class="col-sm-8">{{ $registration->phone }}</dd>
                        <dt class="col-sm-4 text-muted">WhatsApp</dt><dd class="col-sm-8">{{ $registration->whatsapp ?: '—' }}</dd>
                        <dt class="col-sm-4 text-muted">City</dt><dd class="col-sm-8">{{ $registration->location }}</dd>
                        <dt class="col-sm-4 text-muted">Social</dt><dd class="col-sm-8">{{ $registration->social_media ?: '—' }}</dd>
                    </dl>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3"><h5 class="mb-0 fw-semibold">Business</h5></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 text-muted">Business Name</dt><dd class="col-sm-8">{{ $registration->business_name }}</dd>
                        <dt class="col-sm-4 text-muted">Company / Brand</dt><dd class="col-sm-8">{{ $registration->company_name ?: '—' }}</dd>
                        <dt class="col-sm-4 text-muted">Category</dt><dd class="col-sm-8">{{ $registration->business_category }}</dd>
                        <dt class="col-sm-4 text-muted">Designation</dt><dd class="col-sm-8">{{ $registration->designation }}</dd>
                        <dt class="col-sm-4 text-muted">Years in Business</dt><dd class="col-sm-8">{{ $registration->business_age }}</dd>
                        <dt class="col-sm-4 text-muted">Website</dt><dd class="col-sm-8">{{ $registration->website ?: '—' }}</dd>
                        <dt class="col-sm-4 text-muted">Address</dt><dd class="col-sm-8">{{ $registration->business_address }}</dd>
                        <dt class="col-sm-4 text-muted">Description</dt><dd class="col-sm-8">{{ $registration->business_description }}</dd>
                        <dt class="col-sm-4 text-muted">Products / Services</dt><dd class="col-sm-8">{{ $registration->products_services }}</dd>
                        <dt class="col-sm-4 text-muted">Target Audience</dt><dd class="col-sm-8">{{ $registration->target_audience }}</dd>
                    </dl>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3"><h5 class="mb-0 fw-semibold">KYC</h5></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 text-muted">PAN</dt><dd class="col-sm-8">{{ $registration->pan }}</dd>
                        <dt class="col-sm-4 text-muted">Aadhaar (last 4)</dt><dd class="col-sm-8">{{ $registration->aadhaar_last4 }}</dd>
                        <dt class="col-sm-4 text-muted">GSTIN</dt><dd class="col-sm-8">{{ $registration->gstin ?: '—' }}</dd>
                        <dt class="col-sm-4 text-muted">Constitution</dt><dd class="col-sm-8">{{ $registration->business_constitution }}</dd>
                        <dt class="col-sm-4 text-muted">Registered Name</dt><dd class="col-sm-8">{{ $registration->registered_name }}</dd>
                        <dt class="col-sm-4 text-muted">Registered Address</dt><dd class="col-sm-8">{{ $registration->registered_address }}</dd>
                        <dt class="col-sm-4 text-muted">Emergency Contact</dt>
                        <dd class="col-sm-8">{{ $registration->emergency_contact_name }} ({{ $registration->emergency_relationship }}) — {{ $registration->emergency_contact }}</dd>
                    </dl>
                    <hr>
                    <h6 class="fw-semibold">Documents</h6>
                    @foreach ($docs as $field => $label)
                        <div class="mb-1">
                            {{ $label }}:
                            @if ($registration->$field)
                                <a href="{{ $registration->documentUrl($registration->$field) }}" target="_blank">View</a>
                            @else
                                —
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3"><h5 class="mb-0 fw-semibold">Membership</h5></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 text-muted">Preferred Circle</dt><dd class="col-sm-8">{{ $registration->preferred_circle }}</dd>
                        <dt class="col-sm-4 text-muted">Preferred Location</dt><dd class="col-sm-8">{{ $registration->preferred_location }}</dd>
                        <dt class="col-sm-4 text-muted">How heard</dt><dd class="col-sm-8">{{ $registration->how_heard }}</dd>
                        <dt class="col-sm-4 text-muted">Referred By</dt><dd class="col-sm-8">{{ $registration->referred_by ?: '—' }}</dd>
                        <dt class="col-sm-4 text-muted">Interests</dt><dd class="col-sm-8">{{ is_array($registration->areas_of_interest) ? implode(', ', $registration->areas_of_interest) : '—' }}</dd>
                        <dt class="col-sm-4 text-muted">Expertise</dt><dd class="col-sm-8">{{ $registration->expertise }}</dd>
                        <dt class="col-sm-4 text-muted">Active participation</dt><dd class="col-sm-8">{{ $registration->active_participation }}</dd>
                        <dt class="col-sm-4 text-muted">Leadership interest</dt><dd class="col-sm-8">{{ $registration->leadership_interest }}</dd>
                        <dt class="col-sm-4 text-muted">Code of conduct</dt><dd class="col-sm-8">{{ $registration->agree_code }}</dd>
                        <dt class="col-sm-4 text-muted">Applicant</dt><dd class="col-sm-8">{{ $registration->applicant_name }}, {{ optional($registration->applicant_date)->format('d M Y') }}, {{ $registration->place }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3"><h5 class="mb-0 fw-semibold">Payment</h5></div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-5 text-muted">Amount</dt><dd class="col-7">₹{{ number_format($registration->amount) }}</dd>
                        <dt class="col-5 text-muted">Status</dt>
                        <dd class="col-7">
                            @if($registration->payment_status === 'paid')
                                <span class="badge bg-success">Paid</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ ucfirst($registration->payment_status) }}</span>
                            @endif
                        </dd>
                        <dt class="col-5 text-muted">Order ID</dt><dd class="col-7"><small>{{ $registration->razorpay_order_id ?: '—' }}</small></dd>
                        <dt class="col-5 text-muted">Payment ID</dt><dd class="col-7"><small>{{ $registration->razorpay_payment_id ?: '—' }}</small></dd>
                        <dt class="col-5 text-muted">Date</dt><dd class="col-7">{{ $registration->created_at->format('d M Y, h:i A') }}</dd>
                    </dl>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-0 py-3"><h5 class="mb-0 fw-semibold">Update Status</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.registrations.update', $registration) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Payment Status</label>
                            <select name="payment_status" class="form-select" required>
                                <option value="pending" @selected($registration->payment_status === 'pending')>Pending</option>
                                <option value="paid" @selected($registration->payment_status === 'paid')>Paid</option>
                                <option value="failed" @selected($registration->payment_status === 'failed')>Failed</option>
                                <option value="refunded" @selected($registration->payment_status === 'refunded')>Refunded</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Lead Type</label>
                            <select name="lead_type" class="form-select" required>
                                <option value="warm" @selected($registration->lead_type === 'warm')>Warm</option>
                                <option value="hot" @selected($registration->lead_type === 'hot')>Hot</option>
                                <option value="cold" @selected($registration->lead_type === 'cold')>Cold</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-iraaya">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
