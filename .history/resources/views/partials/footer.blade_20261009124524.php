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
                    <a href="#" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="X">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <a href="#" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- NEWSLETTER + CONTACT -->
            <div class="footer-middle reveal-up reveal-delay-1">
                <!-- Newsletter -->
                <div class="footer-newsletter">
                    <h3>Subscribe to our newsletter</h3>

                    <form class="newsletter-form" action="#" method="post">
                        <input type="email" name="email" placeholder="Enter your email address"
                            aria-label="Email Address" required />

                        <button type="submit" aria-label="Subscribe">
                            <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                        </button>
                    </form>
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
                        <a href="testimonials.html">Testimonial</a>
                    </li>

                    <li>
                        <a href="affiliations.html">Certificates &amp; Accreditations</a>
                    </li>

                    <li>
                        <a href="#">FAQ</a>
                    </li>

                    <li>
                        <a href="contact-us.html">Contact Us</a>
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
</footer>