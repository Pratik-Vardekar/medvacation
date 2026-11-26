<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Med Vacation - Your trusted medical tourism partner." />
    <meta name="keywords" content="medical tourism, healthcare, medical vacation, hospitals, treatment" />
    <meta name="author" content="Med Vacation" />
    <title>Medical Tourism in India | Med Vacation</title>
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <!-- =========================================
         GOOGLE FONTS
    ========================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/animation.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/new-style.css') }}">
</head>

<body @if (request()->routeIs('registration.join') || request()->has('register') || request()->get('open') === 'register') style="overflow:hidden" @endif>
    @include('partials.header')
    @yield('content')
    @include('partials.registration-popup')

    <div class="floatingSocial">
        <a href="https://wa.me/918433612576?text=Hi,%20I%20am%20interested%20in%20joining%20Iraaya%20World.%20Please%20share%20more%20details."
            class="whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Chat with Iraaya World on WhatsApp">
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
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script defer src="{{ asset('assets/js/registration.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const popup = document.querySelector(".popup-overlay");
            @if (session('form_error') || $errors->any())
                if (popup) {
                    popup.classList.add("show");
                    document.body.style.overflow = "hidden";
                }
            @endif
        });
        @if (request()->routeIs('registration.join') || request()->has('register') || request()->get('open') === 'register')
            window.addEventListener("load", function() {
                const popup = document.querySelector(".popup-overlay");
                if (!popup) return;
                popup.classList.add("show");
                document.body.style.overflow = "hidden";
            });
        @endif
    </script>
    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
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
