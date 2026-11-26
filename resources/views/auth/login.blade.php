@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="heroSection auth-hero-section" style="min-height:100vh;padding:1rem;">
        <div class="heroPanel d-flex align-items-center" style="min-height:calc(100vh - 2rem);">
            <div class="container position-relative" style="z-index:2;">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-4 col-md-7 col-sm-10">
                        <div class="card border-0 shadow-lg rounded-4 p-4" style="background:rgba(241, 241, 241, 0.97);">

                            <div class="text-center mb-4">
                                <img src="{{ asset('frontend/images/logo.png') }}" alt="Med Vacation"
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

                                    <input type="email" name="email" class="form-control py-2"
                                        placeholder="admin@medvacation.care" value="{{ old('email') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Password
                                    </label>

                                    <div class="position-relative">
                                        <input type="password" name="password" id="password" class="form-control py-2 pe-5"
                                            placeholder="••••••••" required>

                                        <span onclick="togglePassword()"
                                            class="position-absolute top-50 end-0 translate-middle-y me-3"
                                            style="cursor:pointer;">
                                            <i class="fa fa-eye" id="toggleIcon"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="auth-login-btn btn w-100 py-2 fw-semibold">
                                        Login
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .auth-hero-section .heroPanel {
            min-height: calc(100vh - 2rem);
        }

        .auth-login-btn {
            background: #036584;
            border: 1px solid #036584;
            color: #fff;
            border-radius: 12px;
            animation: none;
            text-transform: none;
            letter-spacing: 0;
        }

        .auth-login-btn:hover {
            background: #024b62;
            border-color: #024b62;
            color: #fff;
        }
    </style>
@endsection

@push('scripts')
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
@endpush
