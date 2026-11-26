<!doctype html>
<html lang="en">

<head>
    <title>Welcome to IRAAYA World Where Women Rise Together</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Iraaya is a premium women's community for ambition, connection, growth, and belonging.">
    <meta name="keywords"
        content="Iraaya, Iraaya World, IRAAYA, IRAAYA World, Women Rise Together, Women Empowerment, Women Leadership, Women Networking, Women Entrepreneurship">
    <meta name="author" content="Iraaya World">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    </noscript>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/new-style.css') }}">

    <!-- Meta Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2199769530924011');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=2199769530924011&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body>
    @include('partials.header')
    @yield('content')
    @include('partials.registration-popup')

    <div class="floatingSocial">
        <a href="https://wa.me/918433612576?text=Hi,%20I%20am%20interested%20in%20joining%20Iraaya%20World.%20Please%20share%20more%20details."
            class="whatsapp" target="_blank" rel="noopener noreferrer"
            aria-label="Chat with Iraaya World on WhatsApp">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
        </a>
        <a href="https://www.instagram.com/iraayaworld?igsh=dTh1NTl3Y2h3Ymo3" class="instagram" target="_blank"
            rel="noopener noreferrer" aria-label="Follow Iraaya World on Instagram">
            <i class="fa-brands fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="tel:+918433612576" class="call" aria-label="Call Iraaya World">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
        </a>
        <a href="mailto:connect@iraayaworld.com" class="email" aria-label="Email Iraaya World">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        </a>
    </div>

    <button id="backToTop" aria-label="Back to Top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/common.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("registrationForm");
            const popup = document.querySelector(".popup-overlay");

            if (form) {
                form.addEventListener("submit", function () {
                    if (typeof fbq !== "undefined") {
                        fbq("track", "Lead");
                    }
                });
            }

            @if (session('form_error') || $errors->any())
                if (popup) {
                    popup.classList.add("show");
                    document.body.style.overflow = "hidden";
                }
            @endif
        });
    </script>
    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] = c[a] || function () {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "xk9ee6iqfp");
    </script>
</body>

</html>
