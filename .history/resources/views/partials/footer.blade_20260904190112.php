{{-- FOOTER --}}

<footer class="footer-section">

    <div class="container">

        <div class="row justify-content-between">

            <div class="col-xl-9 col-lg-8 col-md-12">

                <h3 class="footer-title title">
                    Subscribe to our Newsletter!
                </h3>

               <form action="{{ route('newsletter.subscribe') }}" method="POST">
    @csrf

    <div class="newsletter-box">

        <input type="email"
               name="email"
               placeholder="Enter your email address"
               required>

        <button type="submit" class="arrow-btn">

            <img src="{{ asset('public/assets/images/icons/btn-arrow.png') }}"
                 class="img"
                 alt="btn arrow">

        </button>

    </div>

</form>

                <div class="row mt-4 footer-contact">

                    <div class="col-xl-4 col-lg-5 col-md-6">

                        <h6>Location</h6>

                        <p>
                            {{ $contact->address }}
                        </p>

                    </div>

                    <div class="col-xl-4 col-lg-5 col-md-6">

                        <h6>Email</h6>

                        <p>

                            <a href="mailto:{{ $contact->email }}">
                                {{ $contact->email }}
                            </a>

                            <br>

                            <a href="mailto:{{ $contact->secondary_email }}">
                                {{ $contact->secondary_email }}
                            </a>

                        </p>

                    </div>

                    <div class="col-xl-4 col-lg-3 col-md-12">

                        <h6>Call Us</h6>

                        <p>

                            <a href="tel:{{ $contact->phone }}">
                                {{ $contact->phone }}
                            </a>

                        </p>

                        <p class="color-5d4037">
                            ( 24 Hours )
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-12">

                <div class="row">

                    <div class="col-lg-6 col-md-6 col-6 mb-4">

                        <ul class="footer-links">

                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                            <li>
                                <a href="{{ route('about') }}">About Us</a>
                            </li>

                            <li>
                                <a href="{{ route('sale') }}">For Sale</a>
                            </li>

                            <li>
                                <a href="{{ route('buy') }}">Buy</a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('privacy') }}">Privacy Policy</a>
                            </li>

                            <li>
                                <a href="{{ route('terms') }}">Terms &amp; Conditions</a>
                            </li>

                            <li>
                                <a href="{{ route('refund') }}">Refund Policy</a>
                            </li>

                        </ul>

                    </div>

                    <div class="col-lg-6 col-md-6 col-6 mb-4 d-flex justify-content-end">

                        <ul class="footer-links social-link">

                            <li>
                                <a href="{{ $contact->facebook }}">
                                    Facebook
                                </a>
                            </li>

                            <li>
                                <a href="{{ $contact->instagram }}">
                                    Instagram
                                </a>
                            </li>

                            <li>
                                <a href="{{ $contact->youtube }}">
                                    Youtube
                                </a>
                            </li>

                            <li>
                                <a href="{{ $contact->linkedin }}">
                                    LinkedIn
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="footer-bottom mt-4">

            <p>
                Copyright © 2026 Tarkash - Real Estate.
                All rights reserved.
                Designed by
                <span>Goyal Infotech</span>
            </p>

        </div>

    </div>

</footer>