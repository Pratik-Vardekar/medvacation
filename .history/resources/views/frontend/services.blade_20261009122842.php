@extends('layouts.app')
@section('content')

    <!-- =========================================================
   SERVICES HERO
========================================================= -->
<section class="breadcrumb-hero">
      <div class="breadcrumb-hero-bg"></div>

      <div class="container">
        <div class="breadcrumb-hero-content reveal-up">
        <h1> Our Services </h1>


          <div class="about-breadcrumb">
            <a href="index.html">Home</a>

            <i class="fa-solid fa-chevron-right"></i>

            <span>Our Services</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================
   SERVICES
========================================================= -->

    <section class="services-page-section">
      <div class="container">
        <div class="services-page-heading reveal-up">
          <span class="section-label"> WHAT WE OFFER </span>

          <h2>
            Our
            <span>Services</span>
          </h2>

          <p>
            From medical treatment coordination to travel and post-treatment
            support, we take care of every important detail of your journey.
          </p>
        </div>

        <div class="services-page-grid">
          <!-- SERVICE 01 -->
          <a href="#" class="services-page-card reveal-up">
            <div class="services-page-image">
              <img
                src="images/services/medical-tourism.jpg"
                alt="Medical Tourism"
              />

              <span class="services-page-number"> 01 </span>

              <span class="services-page-arrow">
               <i class="fa-solid fa-arrow-right"></i>
              </span>

            </div>

            <div class="services-page-content">
              <h3>Medical Tourism</h3>

              <p>
                Connecting patients with top medical facilities and
                specialists worldwide.
              </p>
            </div>
          </a>

          <!-- SERVICE 02 -->
          <a href="#" class="services-page-card reveal-up reveal-delay-1">
            <div class="services-page-image">
              <img
                src="images/services/treatment-coordination.jpg"
                alt="Treatment Coordination"
              />

              <span class="services-page-number"> 02 </span>

              <span class="services-page-arrow">
               <i class="fa-solid fa-arrow-right"></i>
              </span>

            </div>

            <div class="services-page-content">
              <h3>Treatment Coordination</h3>

              <p>
                Managing medical appointments, procedures, and follow-up care.
              </p>
            </div>
          </a>

          <!-- SERVICE 03 -->
          <a href="#" class="services-page-card reveal-up reveal-delay-2">
            <div class="services-page-image">
              <img
                src="images/services/travel-arrangements.jpg"
                alt="Travel Arrangements"
              />

              <span class="services-page-number"> 03 </span>

              <span class="services-page-arrow">
               <i class="fa-solid fa-arrow-right"></i>
              </span>

            </div>

            <div class="services-page-content">
              <h3>Travel Arrangements</h3>

              <p>Booking flights, accommodations, and transportation.</p>
            </div>
          </a>

          <!-- SERVICE 04 -->
          <a href="#" class="services-page-card reveal-up reveal-delay-3">
            <div class="services-page-image">
              <img
                src="images/services/personalized-care-packages.jpg"
                alt="Personalized Care Packages"
              />

              <span class="services-page-number"> 04 </span>

              <span class="services-page-arrow">
               <i class="fa-solid fa-arrow-right"></i>
              </span>

            </div>

            <div class="services-page-content">
              <h3>Personalized Care Packages</h3>

              <p>Tailored services for individual client needs.</p>
            </div>
          </a>

          <!-- SERVICE 05 -->
          <a href="#" class="services-page-card reveal-up">
            <div class="services-page-image">
              <img
                src="images/services/cultural-experiences.jpg"
                alt="Cultural Experiences"
              />

              <span class="services-page-number"> 05 </span>

              <span class="services-page-arrow">
               <i class="fa-solid fa-arrow-right"></i>
              </span>

            </div>

            <div class="services-page-content">
              <h3>Cultural Experiences</h3>

              <p>Curated local experiences, tours, and activities.</p>
            </div>
          </a>

          <!-- SERVICE 06 -->
          <a href="#" class="services-page-card reveal-up reveal-delay-1">
            <div class="services-page-image">
              <img
                src="images/services/post-treatment-care.jpg"
                alt="Post-Treatment Care"
              />

              <span class="services-page-number"> 06 </span>

              <span class="services-page-arrow">
               <i class="fa-solid fa-arrow-right"></i>
              </span>

            </div>

            <div class="services-page-content">
              <h3>Post-Treatment Care</h3>

              <p>Ensuring smooth recovery and follow-up care.</p>
            </div>
          </a>

          <!-- SERVICE 07 -->
          <a href="#" class="services-page-card reveal-up reveal-delay-2">
            <div class="services-page-image">
              <img
                src="images/services/logistical-support.jpg"
                alt="Logistical Support"
              />

              <span class="services-page-number"> 07 </span>

              <span class="services-page-arrow">
               <i class="fa-solid fa-arrow-right"></i>
              </span>

            </div>

            <div class="services-page-content">
              <h3>Logistical Support</h3>

              <p>
                Handling documentation, insurance, and other administrative
                tasks.
              </p>
            </div>
          </a>
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
 
@endsection 