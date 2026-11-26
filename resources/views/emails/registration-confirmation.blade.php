<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment received - Iraaya World</title>
</head>
<body style="margin:0;padding:0;background-color:#f3efe8;font-family:Arial,Helvetica,sans-serif;">
@php
    $logoPath = public_path('assets/images/light-new-logo.png');
    $logoUrl = file_exists($logoPath) && isset($message)
        ? $message->embed($logoPath)
        : asset('assets/images/light-new-logo.png');
    $firstName = $registration->first_name;
    $amount = number_format((int) $registration->amount);
    $registrationFee = 2000;
    $annualFee = 11000;
    $subtotal = $registrationFee + $annualFee;
    $gst = (int) round($subtotal * 0.18);
    $invoiceNo = 'IW-' . str_pad((string) $registration->id, 5, '0', STR_PAD_LEFT);
    $paidOn = optional($registration->created_at)->timezone('Asia/Kolkata')->format('d M Y, h:i A') . ' IST';
    $whatsappUrl = 'https://wa.me/918433612576?text=' . urlencode('Hi, I just completed my Iraaya World membership payment. Payment ID: ' . $registration->razorpay_payment_id);
@endphp

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f3efe8;padding:24px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="max-width:600px;width:100%;background-color:#ffffff;border:1px solid #e8e0d6;">
                <tr>
                    <td style="background-color:#faf7f2;padding:18px 28px;border-bottom:1px solid #e8e0d6;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td style="font-family:Georgia,'Times New Roman',serif;font-size:18px;letter-spacing:1px;color:#2f2119;">
                                    IRAAYA <span style="color:#c9a24d;">WORLD</span>
                                </td>
                                <td align="right" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;letter-spacing:2px;color:#1f4f48;text-transform:uppercase;">
                                    Payment received
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:32px 36px 8px;text-align:center;">
                        <img src="{{ $logoUrl }}" alt="Iraaya World" width="140" height="auto" style="display:block;margin:0 auto 18px;border:0;outline:none;text-decoration:none;max-width:140px;height:auto;">
                        <h1 style="margin:0 0 12px;font-family:Georgia,'Times New Roman',serif;font-size:30px;line-height:1.3;font-weight:400;color:#2f2119;">
                            Thank you, <span style="color:#cf2030;">{{ $firstName }}</span>.
                        </h1>
                        <p style="margin:0 auto 18px;max-width:480px;font-size:15px;line-height:1.7;color:#5f5550;">
                            Your payment has been received successfully. Your Iraaya World membership application is confirmed.
                        </p>
                        <div style="display:inline-block;background-color:#e7f2ef;border-radius:999px;padding:10px 18px;font-size:13px;color:#1f4f48;">
                            &#10003; Payment of ₹{{ $amount }} received
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="padding:28px 36px;">
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #ece4da;border-radius:8px;">
                            <tr>
                                <td colspan="2" style="background:#faf7f2;padding:14px 18px;border-bottom:1px solid #ece4da;">
                                    <strong style="font-family:Georgia,'Times New Roman',serif;font-size:18px;color:#2f2119;">Membership Invoice</strong>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:12px 18px;font-size:13px;color:#8a817a;">Invoice no.</td>
                                <td style="padding:12px 18px;font-size:13px;color:#2f2119;text-align:right;">{{ $invoiceNo }}</td>
                            </tr>
                            <tr>
                                <td style="padding:0 18px 12px;font-size:13px;color:#8a817a;">Date</td>
                                <td style="padding:0 18px 12px;font-size:13px;color:#2f2119;text-align:right;">{{ $paidOn }}</td>
                            </tr>
                            <tr>
                                <td style="padding:0 18px 12px;font-size:13px;color:#8a817a;">Billed to</td>
                                <td style="padding:0 18px 12px;font-size:13px;color:#2f2119;text-align:right;">{{ $registration->first_name }}<br>{{ $registration->email }}<br>{{ $registration->phone }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding:0 18px;">
                                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top:1px solid #ece4da;">
                                        <tr>
                                            <td style="padding:14px 0 8px;font-size:14px;color:#2f2119;">One Time Registration Fee</td>
                                            <td style="padding:14px 0 8px;font-size:14px;color:#2f2119;text-align:right;">₹{{ number_format($registrationFee) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 0 8px;font-size:14px;color:#2f2119;">Annual membership fee</td>
                                            <td style="padding:0 0 8px;font-size:14px;color:#2f2119;text-align:right;">₹{{ number_format($annualFee) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 0 8px;font-size:14px;color:#2f2119;">Subtotal</td>
                                            <td style="padding:0 0 8px;font-size:14px;color:#2f2119;text-align:right;">₹{{ number_format($subtotal) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 0 14px;font-size:14px;color:#2f2119;">GST (18%)</td>
                                            <td style="padding:0 0 14px;font-size:14px;color:#2f2119;text-align:right;">₹{{ number_format($gst) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 0 14px;font-size:16px;font-weight:700;color:#2f2119;">Amount paid</td>
                                            <td style="padding:0 0 14px;font-size:16px;font-weight:700;color:#cf2030;text-align:right;">₹{{ $amount }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0 18px 12px;font-size:13px;color:#8a817a;">Payment status</td>
                                <td style="padding:0 18px 12px;font-size:13px;color:#1f4f48;text-align:right;font-weight:700;">PAID</td>
                            </tr>
                            <tr>
                                <td style="padding:0 18px 16px;font-size:13px;color:#8a817a;">Razorpay payment ID</td>
                                <td style="padding:0 18px 16px;font-size:12px;color:#2f2119;text-align:right;">{{ $registration->razorpay_payment_id }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:0 36px 28px;">
                        <p style="margin:0 0 16px;font-size:15px;line-height:1.7;color:#5f5550;">
                            Keep this email as your receipt. Our Circle Director will contact you shortly.
                        </p>
                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td align="center" style="border-radius:999px;background-color:#cf2030;">
                                    <a href="{{ $whatsappUrl }}" target="_blank" style="display:block;padding:14px 24px;font-size:15px;font-weight:700;color:#ffffff;text-decoration:none;">
                                        Message us on WhatsApp
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:20px 36px 28px;border-top:1px solid #ece4da;text-align:center;">
                        <p style="margin:0;font-size:12px;line-height:1.6;color:#8a817a;">
                            Iraaya World &middot; This is a payment confirmation invoice.<br>
                            &copy; {{ date('Y') }} Iraaya World. All rights reserved.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
