@extends('emails.layouts.med-vacation')

@section('title', 'New Contact Enquiry - Med Vacation')

@section('content')
@php
    $rows = [
        'Full Name' => $enquiry->name,
        'Email'     => $enquiry->email,
        'Phone'     => $enquiry->phone,
        'Country'   => $enquiry->country ?: '—',
        'Service'   => $enquiry->service,
        'Received'  => $enquiry->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') . ' IST',
    ];
@endphp

<tr>
    <td style="padding:32px 36px 8px;">
        <span style="display:inline-block;padding:6px 14px;border-radius:999px;background-color:#eaf6df;color:#4f8a1f;font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;">
            New Enquiry
        </span>
        <h1 style="margin:16px 0 8px;font-size:24px;line-height:1.35;font-weight:600;color:#1e7d9b;">
            You have a new contact enquiry
        </h1>
        <p style="margin:0;font-size:14px;line-height:1.7;color:#555555;">
            Hi Team, a visitor has submitted the contact form on the Med Vacation website. Details are below.
        </p>
    </td>
</tr>

<tr>
    <td style="padding:20px 36px 8px;">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #dcebf0;border-radius:10px;border-collapse:separate;">
            @foreach ($rows as $label => $value)
                <tr>
                    <td style="width:35%;padding:12px 18px;font-size:13px;color:#7a8a90;{{ $loop->last ? '' : 'border-bottom:1px solid #eef4f6;' }}">{{ $label }}</td>
                    <td style="padding:12px 18px;font-size:14px;font-weight:500;color:#222222;{{ $loop->last ? '' : 'border-bottom:1px solid #eef4f6;' }}">{{ $value }}</td>
                </tr>
            @endforeach
        </table>
    </td>
</tr>

<tr>
    <td style="padding:16px 36px 8px;">
        <p style="margin:0 0 8px;font-size:13px;font-weight:600;color:#036584;text-transform:uppercase;letter-spacing:1px;">Message</p>
        <div style="padding:16px 18px;background-color:#f4f9fb;border-left:4px solid #6db030;border-radius:6px;font-size:14px;line-height:1.7;color:#333333;">
            {!! nl2br(e($enquiry->message)) !!}
        </div>
    </td>
</tr>

<tr>
    <td style="padding:24px 36px 32px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td style="border-radius:999px;background-color:#036584;">
                    <a href="mailto:{{ $enquiry->email }}" style="display:inline-block;padding:12px 24px;font-size:14px;font-weight:600;color:#ffffff;text-decoration:none;">Reply by Email</a>
                </td>
                <td width="10"></td>
                <td style="border-radius:999px;background-color:#68ad37;">
                    <a href="https://wa.me/91{{ $enquiry->phone }}" target="_blank" style="display:inline-block;padding:12px 24px;font-size:14px;font-weight:600;color:#ffffff;text-decoration:none;">WhatsApp</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
@endsection
