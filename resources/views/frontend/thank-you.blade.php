@extends('layouts.app')

@section('content')
<main class="pageWrapper" id="sticky-anchor">
    <section class="thank-you-section">
        <div class="thank-card">
            <span class="thank-badge">
                <div class="success-icon">✓</div>
                Payment received
            </span>

            <h1>Congratulations! 🎉</h1>

            <h2>Your payment has been received.</h2>

            <p>
                Thank you for registering with <strong>Iraaya World.</strong><br>
                Your membership payment was successful. A confirmation invoice has been sent to your email.<br>
                Our Circle Director will get in touch with you shortly.
            </p>

            <div class="thank-btns">
                <a href="{{ route('home') }}" class="home-btn">Back To Home</a>
            </div>
        </div>
    </section>
</main>
@endsection
