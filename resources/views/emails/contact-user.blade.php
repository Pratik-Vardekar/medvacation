@extends('emails.layouts.med-vacation')

@section('title', 'We received your enquiry - Med Vacation')

@section('content')
<tr>
    <td style="padding:36px 36px 8px;text-align:center;">
        <div style="display:inline-block;width:56px;height:56px;line-height:56px;border-radius:50%;background-color:#eaf6df;color:#6db030;font-size:28px;font-weight:700;">&#10003;</div>
        <h1 style="margin:18px 0 10px;font-size:26px;line-height:1.35;font-weight:600;color:#1e7d9b;">
            Thank you, <span style="font-family:Georgia,'Times New Roman',serif;font-style:italic;font-weight:400;color:#6db030;">{{ $enquiry->name }}</span>
        </h1>
        <p style="margin:0 auto;max-width:460px;font-size:15px;line-height:1.7;color:#555555;">
            We have received your enquiry. Our care team will review your request and get back to you within 24 hours.
        </p>
    </td>
</tr>

<tr>
    <td style="padding:28px 36px 8px;">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #dcebf0;border-radius:10px;border-collapse:separate;">
            <tr>
                <td colspan="2" style="padding:14px 18px;background-color:#f4f9fb;border-bottom:1px solid #dcebf0;border-radius:10px 10px 0 0;font-size:13px;font-weight:600;color:#036584;text-transform:uppercase;letter-spacing:1px;">
                    Your Enquiry Summary
                </td>
            </tr>
            <tr>
                <td style="width:35%;padding:12px 18px 6px;font-size:13px;color:#7a8a90;">Service</td>
                <td style="padding:12px 18px 6px;font-size:14px;font-weight:500;color:#222222;">{{ $enquiry->service }}</td>
            </tr>
            <tr>
                <td style="padding:6px 18px;font-size:13px;color:#7a8a90;">Phone</td>
                <td style="padding:6px 18px;font-size:14px;font-weight:500;color:#222222;">{{ $enquiry->phone }}</td>
            </tr>
            @if ($enquiry->country)
                <tr>
                    <td style="padding:6px 18px;font-size:13px;color:#7a8a90;">Country</td>
                    <td style="padding:6px 18px;font-size:14px;font-weight:500;color:#222222;">{{ $enquiry->country }}</td>
                </tr>
            @endif
            <tr>
                <td style="padding:6px 18px 14px;font-size:13px;color:#7a8a90;vertical-align:top;">Message</td>
                <td style="padding:6px 18px 14px;font-size:14px;line-height:1.6;color:#333333;">{!! nl2br(e($enquiry->message)) !!}</td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td style="padding:24px 36px 8px;">
        <p style="margin:0 0 12px;font-size:13px;font-weight:600;color:#036584;text-transform:uppercase;letter-spacing:1px;">What happens next?</p>
        @foreach ([
            'Our medical coordinator reviews your requirements.',
            'We connect you with the right hospital and specialist.',
            'You receive a personalised treatment & travel plan.',
        ] as $step)
            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:10px;">
                <tr>
                    <td width="32" valign="top">
                        <div style="width:24px;height:24px;line-height:24px;border-radius:50%;background-color:#1e7d9b;color:#ffffff;font-size:12px;font-weight:600;text-align:center;">{{ $loop->iteration }}</div>
                    </td>
                    <td style="font-size:14px;line-height:24px;color:#444444;">{{ $step }}</td>
                </tr>
            </table>
        @endforeach
    </td>
</tr>

<tr>
    <td style="padding:20px 36px 36px;text-align:center;">
        <p style="margin:0 0 16px;font-size:14px;line-height:1.7;color:#555555;">Need urgent help? Chat with our team directly.</p>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
            <tr>
                <td style="border-radius:999px;background-color:#68ad37;">
                    <a href="https://wa.me/917208605067" target="_blank" style="display:inline-block;padding:13px 30px;font-size:14px;font-weight:600;color:#ffffff;text-decoration:none;">Chat on WhatsApp</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
@endsection
