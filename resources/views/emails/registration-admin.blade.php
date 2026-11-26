<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; }
        .container { max-width: 640px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 8px; }
        h2 { color: #c0392b; border-bottom: 2px solid #c0392b; padding-bottom: 10px; }
        h3 { color: #c0392b; font-size: 16px; margin: 24px 0 10px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 8px 0; border-bottom: 1px solid #f0f0f0; font-size: 14px; vertical-align: top; }
        td.label { width: 42%; font-weight: bold; color: #333; }
        td.value { color: #555; }
        .highlight td { font-weight: 700; color: #2f2119; }
        .highlight td.value { color: #2f2119; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; color: #888; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
@php
    $val = function ($value) {
        if (is_array($value)) {
            $value = implode(', ', $value);
        }
        $value = is_string($value) ? trim($value) : $value;
        return ($value === null || $value === '') ? '—' : $value;
    };
    $areas = $val($registration->areas_of_interest);
    $logoPath = public_path('assets/images/light-new-logo.png');
    $logoUrl = file_exists($logoPath) && isset($message)
        ? $message->embed($logoPath)
        : asset('assets/images/light-new-logo.png');
    $registrationFee = 2000;
    $annualFee = 11000;
    $subtotal = $registrationFee + $annualFee;
    $gst = (int) round($subtotal * 0.18);
@endphp
    <div class="container">
        <p style="text-align:center;margin:0 0 16px;">
            <img src="{{ $logoUrl }}" alt="Iraaya World" width="140" style="display:block;margin:0 auto;border:0;max-width:140px;height:auto;">
        </p>
        <h2>New Registration - Iraaya World</h2>
        <p>Hi Janvi,</p>
        <p>A new member has paid and registered successfully.</p>

        <h3>Personal Details</h3>
        <table>
            <tr><td class="label">Full Name</td><td class="value">{{ $val($registration->first_name) }}</td></tr>
            <tr><td class="label">Date of Birth</td><td class="value">{{ optional($registration->date_of_birth)->format('d M Y') ?: '—' }}</td></tr>
            <tr><td class="label">Age</td><td class="value">{{ $val($registration->age) }}</td></tr>
            <tr><td class="label">Email</td><td class="value">{{ $val($registration->email) }}</td></tr>
            <tr><td class="label">Phone</td><td class="value">{{ $val($registration->phone) }}</td></tr>
            <tr><td class="label">WhatsApp</td><td class="value">{{ $val($registration->whatsapp) }}</td></tr>
            <tr><td class="label">Residential Area / City</td><td class="value">{{ $val($registration->location) }}</td></tr>
            <tr><td class="label">Instagram / LinkedIn</td><td class="value">{{ $val($registration->social_media) }}</td></tr>
        </table>

        <h3>Professional / Business Details</h3>
        <table>
            <tr><td class="label">Business / Profession Name</td><td class="value">{{ $val($registration->business_name) }}</td></tr>
            <tr><td class="label">Company / Brand Name</td><td class="value">{{ $val($registration->company_name) }}</td></tr>
            <tr><td class="label">Business Category / Profession</td><td class="value">{{ $val($registration->business_category) }}</td></tr>
            <tr><td class="label">Designation</td><td class="value">{{ $val($registration->designation) }}</td></tr>
            <tr><td class="label">Business Address</td><td class="value">{{ $val($registration->business_address) }}</td></tr>
            <tr><td class="label">Website / Social Media</td><td class="value">{{ $val($registration->website) }}</td></tr>
            <tr><td class="label">Years in Business</td><td class="value">{{ $val($registration->business_age) }}</td></tr>
            <tr><td class="label">Business Description</td><td class="value">{{ $val($registration->business_description) }}</td></tr>
            <tr><td class="label">Products / Services</td><td class="value">{{ $val($registration->products_services) }}</td></tr>
            <tr><td class="label">Ideal Client / Target Audience</td><td class="value">{{ $val($registration->target_audience) }}</td></tr>
        </table>

        <h3>KYC Details</h3>
        <table>
            <tr><td class="label">PAN Number</td><td class="value">{{ $val($registration->pan) }}</td></tr>
            <tr><td class="label">Aadhaar (Last 4 Digits)</td><td class="value">{{ $val($registration->aadhaar_last4) }}</td></tr>
            <tr><td class="label">GSTIN</td><td class="value">{{ $val($registration->gstin) }}</td></tr>
            <tr><td class="label">Business Constitution</td><td class="value">{{ $val($registration->business_constitution) }}</td></tr>
            <tr><td class="label">Registered Name</td><td class="value">{{ $val($registration->registered_name) }}</td></tr>
            <tr><td class="label">Registered Address</td><td class="value">{{ $val($registration->registered_address) }}</td></tr>
        </table>

        <h3>Emergency Contact</h3>
        <table>
            <tr><td class="label">Name</td><td class="value">{{ $val($registration->emergency_contact_name) }}</td></tr>
            <tr><td class="label">Relationship</td><td class="value">{{ $val($registration->emergency_relationship) }}</td></tr>
            <tr><td class="label">Contact No.</td><td class="value">{{ $val($registration->emergency_contact) }}</td></tr>
        </table>

        <h3>Membership Details</h3>
        <table>
            <tr><td class="label">Preferred Circle</td><td class="value">{{ $val($registration->preferred_circle) }}</td></tr>
            <tr><td class="label">Preferred Location / Area</td><td class="value">{{ $val($registration->preferred_location) }}</td></tr>
            <tr><td class="label">How did you hear about us?</td><td class="value">{{ $val($registration->how_heard) }}</td></tr>
            <tr><td class="label">Referred By</td><td class="value">{{ $val($registration->referred_by) }}</td></tr>
            <tr><td class="label">Areas of Interest</td><td class="value">{{ $areas }}</td></tr>
        </table>

        <h3>Member Profile &amp; Commitment</h3>
        <table>
            <tr><td class="label">Expertise / Value</td><td class="value">{{ $val($registration->expertise) }}</td></tr>
            <tr><td class="label">Active participation</td><td class="value">{{ $val($registration->active_participation) }}</td></tr>
            <tr><td class="label">Leadership interest</td><td class="value">{{ $val($registration->leadership_interest) }}</td></tr>
            <tr><td class="label">Code of conduct</td><td class="value">{{ $val($registration->agree_code) }}</td></tr>
        </table>

        <h3>Declaration</h3>
        <table>
            <tr><td class="label">Declaration agreed</td><td class="value">{{ $registration->declaration_agree ? 'Yes' : 'No' }}</td></tr>
            <tr><td class="label">Applicant Name</td><td class="value">{{ $val($registration->applicant_name) }}</td></tr>
            <tr><td class="label">Date</td><td class="value">{{ optional($registration->applicant_date)->format('d M Y') ?: '—' }}</td></tr>
            <tr><td class="label">Place</td><td class="value">{{ $val($registration->place) }}</td></tr>
        </table>

        <h3>Payment</h3>
        <table>
            <tr><td class="label">One Time Registration Fee</td><td class="value">₹{{ number_format($registrationFee) }}</td></tr>
            <tr><td class="label">Annual membership fee</td><td class="value">₹{{ number_format($annualFee) }}</td></tr>
            <tr class="highlight"><td class="label">Subtotal</td><td class="value">₹{{ number_format($subtotal) }}</td></tr>
            <tr class="highlight"><td class="label">GST (18%)</td><td class="value">₹{{ number_format($gst) }}</td></tr>
            <tr><td class="label">Total Amount</td><td class="value">₹{{ number_format((int) $registration->amount) }}</td></tr>
            <tr><td class="label">Payment Status</td><td class="value">{{ ucfirst($registration->payment_status) }}</td></tr>
            <tr><td class="label">Razorpay Payment ID</td><td class="value">{{ $val($registration->razorpay_payment_id) }}</td></tr>
            <tr><td class="label">Razorpay Order ID</td><td class="value">{{ $val($registration->razorpay_order_id) }}</td></tr>
            <tr><td class="label">Registration Date</td><td class="value">{{ optional($registration->created_at)->timezone('Asia/Kolkata')->format('d M Y, h:i A') }} IST</td></tr>
        </table>

        <div class="footer">
            <p>This is an automated notification from Iraaya World Registration System.</p>
            <p>&copy; {{ date('Y') }} Iraaya World. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
