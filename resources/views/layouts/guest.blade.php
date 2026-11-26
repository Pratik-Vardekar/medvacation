<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Bootstrap & FontAwesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/new-style.css') }}">
</head>

<body>

    {{-- Optional: include your header --}}
    @include('partials.header')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card p-4 shadow">

                    <div class="text-center mb-3">
                        <img src="{{ asset('assets/images/logo.png') }}" width="120">
                        <h4 class="mt-2">Login</h4>
                    </div>

                    {{ $slot }}

                </div>

            </div>
        </div>
    </div>

    {{-- Optional footer --}}
    @include('partials.footer')

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
