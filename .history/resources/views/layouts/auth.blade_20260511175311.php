<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Panel Login | Tarkash - Real Estate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Paces is a modern, responsive admin dashboard available on ThemeForest. Ideal for building CRM, CMS, project management tools, and custom web applications with a clean UI, flexible layouts, and rich features." />
        <meta name="keywords" content="Paces, admin dashboard, ThemeForest, Bootstrap 5 admin, responsive admin, CRM dashboard, CMS admin, web app UI, admin theme, premium admin template" />
        <meta name="author" content="Coderthemes" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('public/assets/images/logo.png')}}" />
 <!-- Theme Config Js -->
<script src="{{asset('public/admin/assets/js/config.js')}}"></script>

<!-- Vendor css -->
<link href="{{asset('public/admin/assets/css/vendors.min.css')}}" rel="stylesheet" type="text/css" />

<!-- App css -->
<link id="app-style" href="{{asset('public/admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body style="background-color: #ffffda;">
        {{-- <div class="position-absolute top-0 end-0">
            <img src="assets/images/auth-card-bg.svg')}}" class="auth-card-bg-img" alt="auth-card-bg" />
        </div>
        <div class="position-absolute bottom-0 start-0" style="transform: rotate(180deg)">
            <img src="{{asset('admin/assets/images/auth-card-bg.svg')}}" class="auth-card-bg-img" alt="auth-card-bg" />
        </div> --}}
       @yield('content')
        <!-- end auth-fluid-->

        <!-- Vendor js -->
        <script src="{{asset('public/admin/assets/js/vendors.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('public/admin/assets/js/app.js')}}"></script>


        <!-- Password Suggestion Js -->
        <script src="{{asset('public/admin/assets/js/pages/auth-password.js')}}"></script>
    </body>
</html>
