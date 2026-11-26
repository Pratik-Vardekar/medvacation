<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'Login') | Med Vacation Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Med Vacation - Your trusted medical tourism partner." />
        <meta name="keywords" content="medical tourism, healthcare, med vacation, admin" />
        <meta name="author" content="Med Vacation" />

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/favicon.png') }}">
        <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('frontend/css/new-style.css') }}" />
    </head>

    <body style="margin:0;background-color:#f8f4f5;">
        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        @stack('scripts')
    </body>
</html>
