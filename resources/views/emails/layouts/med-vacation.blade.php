<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Med Vacation')</title>
</head>
<body style="margin:0;padding:0;background-color:#eef5f8;font-family:'Poppins',Arial,Helvetica,sans-serif;">
@php
    $logoPath = public_path('frontend/images/logo.png');
    $logoUrl = file_exists($logoPath) && isset($message)
        ? $message->embed($logoPath)
        : asset('frontend/images/logo.png');
@endphp

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#eef5f8;padding:32px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:14px;overflow:hidden;box-shadow:0 6px 24px rgba(3,101,132,0.08);">

                <tr>
                    <td style="padding:26px 36px 22px;text-align:center;background-color:#ffffff;">
                        <img src="{{ $logoUrl }}" alt="Med Vacation" width="170" style="display:block;margin:0 auto;border:0;outline:none;max-width:170px;height:auto;">
                    </td>
                </tr>

                <tr>
                    <td height="4" style="height:4px;line-height:4px;font-size:0;background-color:#207e9c;background-image:linear-gradient(135deg,#6db030 0%,#207e9c 100%);">&nbsp;</td>
                </tr>

                @yield('content')

                <tr>
                    <td style="padding:24px 36px;background-color:#036584;text-align:center;">
                        <p style="margin:0 0 8px;font-size:13px;line-height:1.7;color:#ffffff;">
                            <a href="tel:+917208605067" style="color:#ffffff;text-decoration:none;">+91 72086 05067</a>
                            &nbsp;&middot;&nbsp;
                            <a href="mailto:info@medvacation.care" style="color:#ffffff;text-decoration:none;">info@medvacation.care</a>
                        </p>
                        <p style="margin:0;font-size:12px;line-height:1.6;color:#b9d9e4;">
                            &copy; {{ date('Y') }} Med Vacation. All rights reserved.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
