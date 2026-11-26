@extends('layouts.app')

@section('content')
<main class="pageWrapper" id="sticky-anchor">
    <section class="thank-you-section">
        <div class="thank-card">
            <span class="thank-badge">
                <div class="success-icon">✓</div>
                Registration Successful
            </span>

            <h1>Congratulations! 🎉</h1>

            <h2>Your Registration is Successful.</h2>

            <p>
                Thank you for registering with <strong>Iraaya World.</strong><br>
                Our Circle Director will get in touch with you shortly
            </p>

            <div class="thank-btns">
                <a href="{{ route('home') }}" class="home-btn">Back To Home</a>
            </div>
        </div>
    </section>
</main>

<div class="floatingSocial"></div>
<button id="backToTop" aria-label="Back to Top">
    <i class="fa-solid fa-arrow-up"></i>
</button>
@endsection
