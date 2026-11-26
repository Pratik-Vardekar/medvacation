<footer class="site-footer">
    <div class="container">
        <!-- FOOTER MAIN -->
        <div class="footer-main">
            <!-- BRAND -->
            <div class="footer-brand reveal-left">
                <a href="#" class="footer-logo">
                    <img src="{{ asset('frontend/images/logo-white.png') }}" alt="Med Vacation" />
                </a>

                <div class="footer-social reveal-up reveal-delay-1">
                    <a href="https://www.linkedin.com/company/medvaction-llp/" target="_blank" aria-label="linkedin">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                    <!--<a href="#" aria-label="X">-->
                    <!--    <i class="fa-brands fa-x-twitter"></i>-->
                    <!--</a>-->

                    <!--<a href="#" aria-label="Instagram">-->
                    <!--    <i class="fa-brands fa-instagram"></i>-->
                    <!--</a>-->

                    <!--<a href="#" aria-label="YouTube">-->
                    <!--    <i class="fa-brands fa-youtube"></i>-->
                    <!--</a>-->
                </div>
            </div>

            <!-- NEWSLETTER + CONTACT -->
            <div class="footer-middle reveal-up reveal-delay-1">
                <!-- Newsletter -->
                <div class="footer-newsletter">
                    <h3>Subscribe to our newsletter</h3>

                    <form class="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST"
                        id="newsletterForm">
                        @csrf
                        <input type="email" name="email" id="newsletterEmail" placeholder="Enter your email address"
                            aria-label="Email Address" required value="{{ old('email') }}" />

                        <button type="submit" id="newsletterSubmitBtn" aria-label="Subscribe">
                            <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                        </button>
                    </form>

                    <div id="newsletterMessage" class="mt-2 small" style="display: none;"></div>

                    @if (session('newsletter_success'))
                        <div class="alert alert-success py-1 px-2 mt-2 small">
                            <i class="fa-solid fa-circle-check me-1"></i> {{ session('newsletter_success') }}
                        </div>
                    @elseif(session('newsletter_info'))
                        <div class="alert alert-info py-1 px-2 mt-2 small">
                            <i class="fa-solid fa-circle-info me-1"></i> {{ session('newsletter_info') }}
                        </div>
                    @elseif(session('newsletter_error'))
                        <div class="alert alert-danger py-1 px-2 mt-2 small">
                            <i class="fa-solid fa-triangle-exclamation me-1"></i> {{ session('newsletter_error') }}
                        </div>
                    @elseif(isset($errors) && $errors->newsletter && $errors->newsletter->any())
                        <div class="alert alert-danger py-1 px-2 mt-2 small">
                            {{ $errors->newsletter->first() }}
                        </div>
                    @endif
                </div>

                <!-- Contact -->
                <div class="footer-contact">
                    <h3>Contact on</h3>

                    <div class="footer-contact-grid">
                        <div class="footer-contact-details">
                            <a href="tel:+917208605067">
                                <i class="fa-solid fa-phone"></i>
                                <span>+91 7208605067</span>
                            </a>

                            <span class="contact-separator"> | </span>

                            <a href="tel:+917021562437">
                                <span>+91 7021562437</span>
                            </a>

                            <a href="mailto:info@medvacations.care">
                                <i class="fa-solid fa-envelope"></i>
                                <span>info@medvacations.care</span>
                            </a>
                        </div>

                        <div class="footer-location">
                            <i class="fa-solid fa-location-dot"></i>

                            <span>
                                Mumbai, India
                                <br />
                                India
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QUICK LINKS -->
            <div class="footer-links reveal-right reveal-delay-2">
                <h3>Quick Links</h3>

                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}">About Us</a>
                    </li>

                    <li>
                        <a href="{{ route('services') }}">Services</a>
                    </li>

                    <li>
                        <a href="{{ route('careers') }}">Careers</a>
                    </li>
                </ul>
            </div>

            <!-- USEFUL LINKS -->
            <div class="footer-links reveal-right reveal-delay-3">
                <h3>Useful Links</h3>

                <ul>
                    <li>
                        <a href="{{ route('testimonials') }}">Testimonial</a>
                    </li>

                    <li>
                        <a href="{{ route('affiliations') }}">Certificates &amp; Accreditations</a>
                    </li>

                    <li>
                        <a href="{{ route('faq') }}">FAQ</a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- COPYRIGHT -->
    <div class="footer-bottom">
        <p>
            Copyright © 2026 Med Vacation. All rights reserved. Designed by
            <a href="#">Goyal Infotech</a>
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('newsletterForm');
            const msgBox = document.getElementById('newsletterMessage');
            const submitBtn = document.getElementById('newsletterSubmitBtn');

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const emailInput = document.getElementById('newsletterEmail');
                    const email = emailInput ? emailInput.value.trim() : '';
                    if (!email) return;

                    const tokenInput = form.querySelector('input[name="_token"]');
                    const token = tokenInput ? tokenInput.value : '';

                    if (submitBtn) submitBtn.disabled = true;
                    if (msgBox) {
                        msgBox.style.display = 'block';
                        msgBox.className = 'mt-2 small text-muted';
                        msgBox.innerHTML =
                            '<i class="fa-solid fa-spinner fa-spin me-1"></i> Subscribing...';
                    }

                    fetch("{{ route('newsletter.subscribe') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify({
                                email: email
                            })
                        })
                        .then(function(res) {
                            return res.json().then(function(data) {
                                return {
                                    status: res.status,
                                    body: data
                                };
                            });
                        })
                        .then(function(result) {
                            if (submitBtn) submitBtn.disabled = false;
                            if (msgBox) {
                                if (result.body && result.body.success) {
                                    msgBox.className = 'mt-2 small text-success fw-semibold';
                                    msgBox.innerHTML =
                                        '<i class="fa-solid fa-circle-check me-1"></i> ' + result.body
                                        .message;
                                    if (emailInput) emailInput.value = '';
                                } else {
                                    msgBox.className = 'mt-2 small text-danger fw-semibold';
                                    msgBox.innerHTML =
                                        '<i class="fa-solid fa-triangle-exclamation me-1"></i> ' + ((
                                                result.body && result.body.message) ? result.body
                                            .message : 'Subscription failed. Please check your email.');
                                }
                            }
                        })
                        .catch(function(err) {
                            if (submitBtn) submitBtn.disabled = false;
                            if (msgBox) {
                                msgBox.className = 'mt-2 small text-danger fw-semibold';
                                msgBox.innerHTML =
                                    '<i class="fa-solid fa-triangle-exclamation me-1"></i> Something went wrong. Please try again.';
                            }
                        });
                });
            }
        });
    </script>
</footer>
