<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard') | Med Vacation Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Med Vacation admin panel - Medical Tourism in India" />
    <meta name="keywords" content="Med Vacation, Medical Tourism, Admin, Enquiries" />
    <meta name="author" content="Med Vacation" />

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('admin/assets/plugins/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <link href="{{ asset('admin/assets/css/vendors.min.css') }}" rel="stylesheet" type="text/css" />
    <link id="app-style" href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        :root {
            --iraaya-red: #cf2030;
            --iraaya-red-dark: #b71c2a;
            --iraaya-gold: #b8960b;
            --iraaya-ink: #20181b;
            --iraaya-soft: #f8f4f5;
        }

        body {
            background-color: var(--iraaya-soft) !important;
        }

        .btn-primary,
        .btn-iraaya {
            background-color: var(--iraaya-red) !important;
            border-color: var(--iraaya-red) !important;
            color: #fff !important;
        }

        .btn-primary:hover,
        .btn-iraaya:hover {
            background-color: var(--iraaya-red-dark) !important;
            border-color: var(--iraaya-red-dark) !important;
            color: #fff !important;
        }

        .btn-iraaya-outline {
            background: #fff !important;
            border: 1px solid var(--iraaya-red) !important;
            color: var(--iraaya-red) !important;
        }

        .btn-iraaya-outline:hover {
            background: var(--iraaya-red) !important;
            color: #fff !important;
        }

        .sidenav-toggle-button {
            background-color: #0dcaf0 !important;
            border-color: #0dcaf0 !important;
            color: #fff !important;
        }

        .sidenav-toggle-button:hover,
        .sidenav-toggle-button:focus {
            background-color: #0baccc !important;
            border-color: #0baccc !important;
            color: #fff !important;
        }

        .sidenav-menu {
            background: #ffffff !important;
            border-right: 1px solid #ece4da;
        }

        .sidenav-menu .logo-light,
        .sidenav-menu .logo-sm {
            display: none !important;
        }

        .sidenav-menu>a.iraaya-sidebar-logo {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            width: 100% !important;
            padding: 0.75rem 0.75rem 0.75rem 0.75rem !important;
            margin: 0 !important;
            line-height: normal !important;
            position: relative !important;
        }

        .sidenav-menu .iraaya-sidebar-logo-img {
            height: 80px !important;
            width: auto !important;
            max-width: 88% !important;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }

        html[data-sidenav-size=condensed] .sidenav-menu .iraaya-sidebar-logo-img,
        html[data-sidenav-size=on-hover] .sidenav-menu:not(:hover) .iraaya-sidebar-logo-img {
            height: 36px !important;
            max-width: 42px !important;
        }

        .iraaya-sidenav-user {
            background: var(--iraaya-soft) !important;
            border: 1px solid #ece4da;
            border-radius: 12px;
            margin: 12px;
            padding: 12px !important;
        }

        .iraaya-sidenav-user .sidenav-user-name,
        .iraaya-sidenav-user .fs-12,
        .iraaya-sidenav-user .link-reset {
            color: var(--iraaya-ink) !important;
        }

        .side-nav>.side-nav-item.active>a,
        .side-nav>.side-nav-item.active>button {
            color: var(--iraaya-ink) !important;
            background-color: #6db4e3 !important;
        }

        .side-nav .side-nav-link,
        .side-nav .side-nav-link .menu-text,
        .side-nav .side-nav-link .menu-icon,
        .side-nav .side-nav-link .menu-icon i {
            color: var(--iraaya-ink) !important;
        }

        .side-nav .side-nav-link:hover,
        .side-nav>.side-nav-item.active>.side-nav-link,
        .side-nav .side-nav-link.active {
            color: var(--iraaya-ink) !important;
            background: #91e2f3 !important;
            font-weight: 600;
        }

        .side-nav .side-nav-link:hover .menu-text,
        .side-nav .side-nav-link:hover .menu-icon,
        .side-nav .side-nav-link:hover .menu-icon i,
        .side-nav>.side-nav-item.active>.side-nav-link .menu-text,
        .side-nav>.side-nav-item.active>.side-nav-link .menu-icon,
        .side-nav>.side-nav-item.active>.side-nav-link .menu-icon i,
        .side-nav .side-nav-link.active .menu-text,
        .side-nav .side-nav-link.active .menu-icon,
        .side-nav .side-nav-link.active .menu-icon i {
            color: var(--iraaya-ink) !important;
        }

        .side-nav-title {
            color: black;
        }

        .sidenav-menu .button-close-offcanvas,
        .sidenav-menu .button-on-hover {
            color: var(--iraaya-ink) !important;
        }

        .iraaya-sidebar-note {
            margin: 18px 12px 24px;
            padding: 14px 14px 12px;
            border-radius: 12px;
            background: linear-gradient(135deg, #fff5f6 0%, #faf7f2 100%);
            border: 1px solid #ece4da;
        }

        .iraaya-sidebar-note span {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--iraaya-ink);
        }

        .iraaya-sidebar-note small {
            display: block;
            margin-top: 4px;
            font-size: 11px;
            color: #8a817a;
        }

        .app-topbar {
            background: linear-gradient(120deg,
                    #405c67 0%,
                    #518897 55%,
                    #73a7b4 100%) !important;
            border-bottom: 1px solid #0E7490;
            color: #fff !important;
        }

        .app-topbar a,
        .app-topbar i,
        .app-topbar .nav-link {
            color: #fff !important;
        }

        .page-title-head h4,
        .card-header h5 {
            color: var(--iraaya-ink);
        }

        .iraaya-stat-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg,
                    #37525c 0%,
                    #036584 55%,
                    #56b810 100%);
            color: #fff !important;
            border: 0;
            border-radius: 1.25rem;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            box-shadow: 0 10px 30px rgba(14, 116, 144, 0.20);
        }

        .iraaya-stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 35px rgba(14, 116, 144, 0.30);
        }

        .iraaya-stat-card .stat-icon {
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
            border-radius: 16px;
        }

        .iraaya-stat-card::before {
            content: "";
            position: absolute;
            top: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.12);
        }

        .iraaya-stat-card::after {
            content: "";
            position: absolute;
            bottom: -40px;
            left: -20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .iraaya-stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(207, 32, 48, 0.28);
        }

        .iraaya-stat-card.gold {
            background: linear-gradient(120deg,
                    #14532D 0%,
                    #047857 55%,
                    #34A78A 100%);
            box-shadow: 0 10px 30px rgba(4, 120, 87, 0.22);
        }

        .iraaya-stat-card.gold:hover {
            box-shadow: 0 16px 40px rgba(184, 150, 11, 0.28);
        }

        .iraaya-stat-card.green {
            background: linear-gradient(135deg, #2a6b62 0%, #1f4f48 55%, #163b36 100%);
            box-shadow: 0 10px 30px rgba(31, 79, 72, 0.22);
        }

        .iraaya-stat-card.green:hover {
            box-shadow: 0 16px 40px rgba(31, 79, 72, 0.28);
        }

        .iraaya-stat-card .card-body {
            position: relative;
            z-index: 1;
            color: #dde2e3 !important;
        }

        .iraaya-stat-card h2,
        .iraaya-stat-card p,
        .iraaya-stat-card .fw-bold,
        .iraaya-stat-card .stat-label {
            color: #fff !important;
        }

        .iraaya-stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.18);
            font-size: 1.5rem;
            margin-bottom: 1rem;
            backdrop-filter: blur(4px);
        }

        .iraaya-stat-card a {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .dashboard-welcome {
            background: linear-gradient(135deg, #fff 0%, #faf7f2 100%);
            border: 1px solid #ece4da;
            border-left: 4px solid var(--iraaya-red);
        }

        .iraaya-badge-warm {
            background-color: #f6e8c8 !important;
            color: #8a6a12 !important;
        }

        .iraaya-badge-hot {
            background-color: #fde8eb !important;
            color: var(--iraaya-red) !important;
        }

        .breadcrumb-item.active {
            color: #070707;
        }

        .page-title-head {
            gap: 0.75rem;
            margin: 0 !important;
            padding: 0 !important;
            min-height: auto;
        }

        .content-page>.container-fluid {
            padding-top: 1.25rem;
        }

        .page-title-head .breadcrumb {
            flex-wrap: wrap;
        }

        .btn-iraaya,
        .btn-iraaya-outline {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            animation: none !important;
            text-transform: none !important;
            letter-spacing: 0 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px !important;
            white-space: nowrap;
            line-height: 1.2 !important;
        }

        .btn-admin-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            padding: 0 !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 8px !important;
        }

        .admin-action-btns {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            flex-wrap: nowrap;
        }

        .admin-alert-bar,
        .admin-card-header {
            gap: 0.75rem;
        }

        .admin-filter-form .form-label {
            margin-bottom: 0.25rem;
        }

        .admin-filter-actions .btn {
            min-width: 120px;
        }

        @media (max-width: 767.98px) {
            .page-title-head {
                flex-direction: column !important;
                align-items: flex-start !important;
            }

            .page-title-head .breadcrumb {
                width: 100%;
                font-size: 0.875rem;
            }

            .page-title-head h4 {
                font-size: 1.25rem;
            }

            .page-title-head .btn,
            .page-title-head a.btn {
                width: 100%;
            }

            .admin-alert-bar {
                flex-direction: column !important;
                align-items: flex-start !important;
            }

            .admin-alert-bar a {
                margin-left: 0 !important;
                width: 100%;
            }

            .admin-card-header {
                flex-direction: column !important;
                align-items: flex-start !important;
            }

            .admin-card-header a {
                margin-left: 0 !important;
            }

            .admin-table th,
            .admin-table td {
                font-size: 0.875rem;
                padding: 0.45rem 0.35rem;
            }

            .content-page>.container-fluid {
                padding-top: 0.75rem;
                padding-left: 0.625rem;
                padding-right: 0.625rem;
            }

            .content-page .container-fluid .container-fluid {
                padding-left: 0;
                padding-right: 0;
            }

            .admin-table-card .card-body {
                padding: 0.5rem 0.35rem;
                background: #0dcaf0;
            }

            .admin-table-card .card-header {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .table-responsive {
                margin: 0;
            }

            .admin-form-actions {
                flex-direction: column;
            }

            .admin-form-actions .btn {
                width: 100%;
            }

            .admin-filter-actions .btn {
                width: 100%;
                min-width: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="wrapper">
        @include('admin.partials.header')
        @include('admin.partials.sidebar')

        <div class="content-page">
            <div class="container-fluid">
                @yield('content')
            </div>
            @include('admin.partials.footer')
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    @stack('scripts')

    @yield('page-scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: @json(session('success')),
                confirmButtonColor: '#cf2030'
            });
        </script>
    @endif
</body>

</html>
