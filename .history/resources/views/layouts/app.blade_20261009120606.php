<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Med Vacation - Your trusted medical tourism partner." />
    <meta name="keywords" content="medical tourism, healthcare, medical vacation, hospitals, treatment" />
    <meta name="author" content="Med Vacation" />
    <title>Medical Tourism in India | Med Vacation</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.png') }}" />
    <!-- =========================================
         GOOGLE FONTS
    ========================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}" />
</head>

<body>
   @include('partials.header')
    <!-- =========================================
         MAIN CONTENT
    ========================================== -->
    <main>
      @yield('content')
        <!-- =========================================================
     FOOTER
========================================================= -->

     @include('partials.footer')
    </main>
    <!-- =========================================
         JAVASCRIPT
    ========================================== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
