{{-- CONTACT PAGE --}}

@extends('layouts.app')

@section('title', 'Home')

@section('content')
<main>
    <!-- =========================================================
   CONTACT HERO
========================================================= -->

<section class="breadcrumb-hero">
      <div class="breadcrumb-hero-bg"></div>

      <div class="container">
        <div class="breadcrumb-hero-content reveal-up">
        <h1> Contact Us </h1>


          <div class="about-breadcrumb">
            <a href="index.html">Home</a>

            <i class="fa-solid fa-chevron-right"></i>

            <span>Contact Us</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================
   CONTACT SECTION
========================================================= -->

    <section class="contact-section">
      <div class="container">
        <div class="contact-grid">
          <!-- =================================================
               CONTACT INFORMATION
          ================================================== -->

          <div class="contact-info reveal-left">
            <span class="section-label"> CONTACT US </span>

            <h2>
              Let’s Start Your
              <span>Healthcare Journey.</span>
            </h2>

            <p class="contact-intro">
              Whether you are looking for medical treatment, specialist
              consultation, travel assistance, or complete medical tourism
              support, our team is ready to assist you.
            </p>

            <!-- ADDRESS -->

            <div class="contact-info-item reveal-up">
              <div class="contact-icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>

              <div>
                <span>Our Office</span>

                <p>India</p>
              </div>
            </div>

            <!-- PHONE -->

            <div class="contact-info-item reveal-up reveal-delay-1">
              <div class="contact-icon">
                <i class="fa-solid fa-phone"></i>
              </div>

              <div>
                <span>Call Us</span>

                <p>
                  <a href="tel:+917208605067"> +91 72086 05067 </a>
                </p>
              </div>
            </div>

            <!-- EMAIL -->

            <div class="contact-info-item reveal-up reveal-delay-2">
              <div class="contact-icon">
                <i class="fa-solid fa-envelope"></i>
              </div>

              <div>
                <span>Email Us</span>

                <p>
                  <a href="mailto:info@medvacation.care">
                    info@medvacation.care
                  </a>
                </p>
              </div>
            </div>

            <!-- WHATSAPP -->

            <div class="contact-info-item reveal-up reveal-delay-3">
              <div class="contact-icon">
                <i class="fa-brands fa-whatsapp"></i>
              </div>

              <div>
                <span>WhatsApp</span>

                <p>
                  <a href="https://wa.me/+917208605067" target="_blank">
                    Chat With Our Team
                  </a>
                </p>
              </div>
            </div>
          </div>

          <!-- =================================================
               CONTACT FORM
          ================================================== -->

          <div class="contact-form-wrapper reveal-right">
            <div class="contact-form-header">
              <span class="section-label"> SEND AN ENQUIRY </span>

              <h3>
                How Can We
                <span>Help You?</span>
              </h3>

              <p>
                Fill in the details below and our team will get back to you
                shortly.
              </p>
            </div>

            <form class="contact-form" action="#" method="post">
              <div class="form-row">
                <div class="form-group">
                  <label for="contact-name"> Full Name </label>

                  <input
                    type="text"
                    id="contact-name"
                    name="name"
                    placeholder="Enter your name"
                    required
                  />
                </div>

                <div class="form-group">
                  <label for="contact-email"> Email Address </label>

                  <input
                    type="email"
                    id="contact-email"
                    name="email"
                    placeholder="Enter your email"
                    required
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="contact-phone"> Phone Number </label>

                  <input
                    type="tel"
                    id="contact-phone"
                    name="phone"
                    placeholder="Enter your phone number"
                    pattern="[6-9][0-9]{9}"
                    maxlength="10"
                    required
                  />
                </div>

                <div class="form-group">
                  <label for="contact-country"> Country </label>

                  <input
                    type="text"
                    id="contact-country"
                    name="country"
                    placeholder="Enter your country"
                  />
                </div>
              </div>

              <div class="form-group">
                <label for="contact-service"> Service Required </label>

                <select id="contact-service" name="service" required>
                  <option value="">Select a service</option>

                  <option value="medical-tourism">Medical Tourism</option>

                  <option value="treatment-coordination">
                    Treatment Coordination
                  </option>

                  <option value="travel-arrangements">
                    Travel Arrangements
                  </option>

                  <option value="personalized-care">
                    Personalized Care Packages
                  </option>

                  <option value="post-treatment-care">
                    Post-Treatment Care
                  </option>

                  <option value="other">Other</option>
                </select>
              </div>

              <div class="form-group">
                <label for="contact-message"> Message </label>

                <textarea
                  id="contact-message"
                  name="message"
                  rows="5"
                  placeholder="Tell us how we can help you..."
                  required
                ></textarea>
              </div>
<a href="contact-us.html" class="side-consultation-btn">
              <span> Send Enquiry </span>

              <img src="images/icons/arrow.png" alt="" />
            </a>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- =========================================================
   QUICK HELP SECTION
========================================================= -->

    <section class="contact-help-section">
      <div class="container">
        <div class="contact-help-content reveal-up">
          <span class="section-label"> WE ARE HERE FOR YOU </span>

          <h2>
            Need Help Planning Your
            <span>Medical Journey?</span>
          </h2>

          <p>
            From finding the right specialist to coordinating treatment,
            travel, and post-treatment care, MED VACATION is here to support
            you every step of the way.
          </p>

          <div class="contact-help-buttons">
            <a href="tel:+917208605067" class="contact-btn primary">
              <i class="fa-solid fa-phone"></i>
              Call Us
            </a>

            <a
              href="https://wa.me/917208605067"
              target="_blank"
              class="contact-btn secondary"
            >
              <i class="fa-brands fa-whatsapp"></i>
              WhatsApp Us
            </a>
          </div>
        </div>
      </div>
    </section>

 
  </main>

@endsection