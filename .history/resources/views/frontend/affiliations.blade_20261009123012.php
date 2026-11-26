@extends('layouts.app')
@section('content')
<main>
    <section class="breadcrumb-hero">
            <div class="breadcrumb-hero-bg"></div>
    
            <div class="container">
              <div class="breadcrumb-hero-content reveal-up">
              <h1> Affiliations &amp; Accreditation </h1>
    
    
                <div class="about-breadcrumb">
                  <a href="index.html">Home</a>
    
                  <i class="fa-solid fa-chevron-right"></i>
    
                  <span>Affiliations & Accreditation</span>
                </div>
              </div>
            </div>
          </section>
          <!-- =========================================================
         AFFILIATIONS GALLERY
    ========================================================= -->
    
          <section class="affiliation-section">
            <div class="container">
              <div class="affiliation-heading reveal-up">
                <span class="section-label"> TRUSTED PARTNERS </span>
    
                <h2>
                  Our Affiliations &
                  <span>Accreditations</span>
                </h2>
    
                <p>
                  We work alongside trusted healthcare organizations, institutions,
                  and partners to provide international patients with reliable and
                  high-quality healthcare experiences.
                </p>
              </div>
    
            <div class="affiliation-gallery">
    
      <!-- IMAGE 01 -->
      <div class="affiliation-item affiliation-item-large reveal-up">
        <img
          src="images/affiliations/10.jpeg"
          alt="MED VACATION affiliation"
        />
      </div>
    
      <!-- IMAGE 02 -->
      <div class="affiliation-item reveal-up reveal-delay-1">
        <img
          src="images/affiliations/2.jpeg"
          alt="MED VACATION accreditation"
        />
      </div>
    
      <!-- IMAGE 03 -->
      <div class="affiliation-item reveal-up reveal-delay-2">
        <img
          src="images/affiliations/3.jpeg"
          alt="MED VACATION partner"
        />
      </div>
    
      <!-- IMAGE 04 -->
      <div class="affiliation-item affiliation-item-wide reveal-up">
        <img
          src="images/affiliations/4.jpeg"
          alt="MED VACATION affiliation"
        />
      </div>
    
      <!-- IMAGE 05 -->
      <div class="affiliation-item reveal-up reveal-delay-1">
        <img
          src="images/affiliations/5.jpeg"
          alt="MED VACATION accreditation"
        />
      </div>
    
      <!-- IMAGE 06 -->
      <div class="affiliation-item reveal-up reveal-delay-2">
        <img
          src="images/affiliations/6.jpeg"
          alt="MED VACATION affiliation"
        />
      </div>
    
      <!-- IMAGE 07 -->
      <div class="affiliation-item reveal-up">
        <img
          src="images/affiliations/7.jpeg"
          alt="MED VACATION partner"
        />
      </div>
    
      <!-- IMAGE 08 -->
      <div class="affiliation-item reveal-up reveal-delay-1">
        <img
          src="images/affiliations/8.jpeg"
          alt="MED VACATION accreditation"
        />
      </div>
    
      <!-- IMAGE 09 -->
      <div class="affiliation-item affiliation-item-wide reveal-up reveal-delay-2">
        <img
          src="images/affiliations/9.jpeg"
          alt="MED VACATION affiliation"
        />
      </div>
    
      <!-- IMAGE 10 -->
      <div class="affiliation-item reveal-up">
        <img
          src="images/affiliations/10.jpeg"
          alt="MED VACATION partner"
        />
      </div>
    
    </div>
    
    
    <!-- =========================================================
         PREMIUM LIGHTBOX
    ========================================================= -->
    
    <div
      class="affiliation-lightbox"
      id="affiliationLightbox"
      aria-hidden="true"
    >
    
      <!-- CLOSE -->
      <button
        class="lightbox-close"
        id="lightboxClose"
        type="button"
        aria-label="Close gallery"
      >
        &times;
      </button>
    
    
      <!-- PREVIOUS -->
      <button
        class="lightbox-prev"
        id="lightboxPrev"
        type="button"
        aria-label="Previous image"
      >
        &#10094;
      </button>
    
    
      <!-- IMAGE -->
      <div class="lightbox-content">
    
        <img
          id="lightboxImage"
          src=""
          alt="MED VACATION affiliation"
        />
    
      </div>
    
    
      <!-- NEXT -->
      <button
        class="lightbox-next"
        id="lightboxNext"
        type="button"
        aria-label="Next image"
      >
        &#10095;
      </button>
    
    
      <!-- COUNTER -->
      <div
        class="lightbox-counter"
        id="lightboxCounter"
      >
        1 / 10
      </div>
    
    </div>
            </div>
          </section>
          <!-- =========================================================
         FOOTER
    ========================================================= -->
    
          <footer class="site-footer">
            <div class="container">
              <!-- FOOTER MAIN -->
              <div class="footer-main">
                <!-- BRAND -->
                <div class="footer-brand reveal-left">
                  <a href="#" class="footer-logo">
                    <img src="images/logo-white.png" alt="Med Vacation" />
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
                      <input
                        type="email"
                        name="email"
                        placeholder="Enter your email address"
                        aria-label="Email Address"
                        required
                      />
    
                      <button type="submit" aria-label="Subscribe">
                        <img src="images/icons/arrow.png" alt="" />
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
                      <a href="index.html">Home</a>
                    </li>
    
                    <li>
                      <a href="about-us.html">About Us</a>
                    </li>
    
                    <li>
                      <a href="services.html">Services</a>
                    </li>
    
                    <li>
                      <a href="career.html">Careers</a>
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
        </main>
@endsection