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
                src="{{ asset('frontend/images/services/medical-tourism.jpg') }}"
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
                src="{{ asset('frontend/images/services/treatment-coordination.jpg') }}"
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
                src="{{ asset('frontend/images/services/travel-arrangements.jpg') }}"
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
                src="{{ asset('frontend/images/services/personalized-care-packages.jpg') }}"
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
                src="{{ asset('frontend/images/services/cultural-experiences.jpg') }}"
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
                src="{{ asset('frontend/images/services/post-treatment-care.jpg') }}"
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
                src="{{ asset('frontend/images/services/logistical-support.jpg') }}"
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
 
 
@endsection 