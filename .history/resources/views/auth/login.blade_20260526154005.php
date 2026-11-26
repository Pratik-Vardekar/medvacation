@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<div class="min-vh-100 d-flex align-items-center justify-content-center position-relative overflow-hidden"
    style="
        background: url('{{ asset('public/assets/images/about-us.jpg') }}') center center/cover no-repeat;
    ">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
        style="background: rgba(0,0,0,0.55);"></div>

    <div class="container position-relative">
        <div class="row justify-content-center align-items-center">

            <!-- Left Content -->
            <div class="col-lg-6 d-none d-lg-block text-white pe-5">
                <h1 class="fw-bold display-4 mb-3">
                    Welcome Back
                </h1>

                <p class="fs-5 text-light">
                    Access your dashboard, manage your properties,
                    and stay connected with your clients easily.
                </p>
            </div>

            <!-- Login Form -->
            <div class="col-lg-4 col-md-7 col-sm-10">
                <div class="card border-0 shadow-lg rounded-4 p-4"
                    style="backdrop-filter: blur(8px); background: rgba(255,255,255,0.95);">

                    <div class="text-center mb-4">
                        <img src="{{ asset('public/assets/images/logo.png') }}"
                            alt="Logo"
                            style="max-height:70px;">

                        <h3 class="fw-bold text-dark mt-3">
                            Sign In
                        </h3>

                        <p class="text-muted mb-0">
                            Enter your credentials to continue
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control py-2"
                                placeholder="you@example.com"
                                value="{{ old('email') }}"
                                required>
                        </div>

                       <div class="mb-3">
    <label class="form-label fw-semibold">
        Password
    </label>

    <div class="position-relative">
        <input
            type="password"
            name="password"
            id="password"
            class="form-control py-2 pe-5"
            placeholder="••••••••"
            required>

        <span
            onclick="togglePassword()"
            class="position-absolute top-50 end-0 translate-middle-y me-3"
            style="cursor:pointer;">
            
            <i class="fa fa-eye" id="toggleIcon"></i>
        </span>
    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

                       

                        <div class="d-grid">
                            <button type="submit"
                                class="btn btn-primary py-2 fw-semibold rounded-3">
                                Login
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection