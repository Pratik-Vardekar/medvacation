@extends('layouts.app')
@section('content')
  <!-- =========================================
         MAIN CONTENT
    ========================================== -->

        <!-- =========================================================
       SERVICES HERO
  ========================================================= -->
  <section class="breadcrumb-hero">
          <div class="breadcrumb-hero-bg"></div>
  
          <div class="container">
            <div class="breadcrumb-hero-content reveal-up">
            <h1> Career </h1>
  
  
              <div class="about-breadcrumb">
                <a href="{{ route('home') }}">Home</a>
  
                <i class="fa-solid fa-chevron-right"></i>
  
                <span>Career</span>
              </div>
            </div>
          </div>
        </section>
  
  
  
  <!-- =========================================
       TESTIMONIALS
  ========================================= -->
  
  <section class="testimonials-section">
    <div class="container">
           <div class="services-page-heading reveal-up">
              <span class="section-label"> Join Our Team </span>
  
              <h2>
                Build a Career <br>
                <span>That Makes a Difference</span>
              </h2>
  
              <p> At Med Vacation, we’re always looking for passionate and dedicated professionals who want to make a meaningful difference in the healthcare and tourism industry.</p>
            </div>
  <div class="careers-grid">
  
      <!-- 01 -->
      <article class="career-card">
          <div class="career-image">
              <img src="https://www.medvacation.care/img/caree1.webp" alt="Medical Tourism Coordinator">
              <span class="career-number">01</span>
          </div>
  
          <div class="career-content">
              <h3>Medical Tourism Coordinator</h3>
  
              <h4>Manage. Coordinate. Care.</h4>
  
              <p>
                  Manage travel, treatment, and logistical arrangements for international patients.
                  You’ll work closely with patients, hospitals, and service providers to ensure a
                  smooth and well-coordinated medical journey.
              </p>
  
              <span class="career-meta">
                  <strong>Preferred:</strong> Background in healthcare, hospitality, or medical tourism.
              </span>
  
              <a href="mailto:info@medvacations.care?subject=Application - Medical Tourism Coordinator"
                 class="consultation-btn">
                  <span>Apply Now</span>
                  <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="">
              </a>
          </div>
      </article>
  
  
      <!-- 02 -->
      <article class="career-card">
          <div class="career-image">
              <img src="https://www.medvacation.care/img/Travel-agent.jpg" alt="Travel Consultant">
              <span class="career-number">02</span>
          </div>
  
          <div class="career-content">
              <h3>Travel Consultant</h3>
  
              <h4>Plan Experiences. Create Journeys.</h4>
  
              <p>
                  Design wellness-focused travel experiences tailored to individual client needs.
                  From accommodation and transportation to local experiences, help create
                  comfortable and memorable journeys for our clients.
              </p>
  
              <span class="career-meta">
                  <strong>Required:</strong> Experience in tourism, travel agencies, or hospitality.
              </span>
  
              <a href="mailto:info@medvacations.care?subject=Application - Travel Consultant"
                 class="consultation-btn">
                  <span>Apply Now</span>
                  <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="">
              </a>
          </div>
      </article>
  
  
      <!-- 03 -->
      <article class="career-card">
          <div class="career-image">
              <img src="https://www.medvacation.care/img/Travel%20Consultant.jpg" alt="Senior Travel Consultant">
              <span class="career-number">03</span>
          </div>
  
          <div class="career-content">
              <h3>Senior Travel Consultant</h3>
  
              <h4>Lead. Mentor. Deliver Excellence.</h4>
  
              <p>
                  Lead premium wellness and medical travel planning while managing complex
                  itineraries and client requirements. You’ll also mentor junior consultants
                  and help maintain the high level of service our clients expect.
              </p>
  
              <span class="career-meta">
                  <strong>Required:</strong> Strong experience in luxury tourism, travel planning,
                  or premium hospitality.
              </span>
  
              <a href="mailto:info@medvacations.care?subject=Application - Senior Travel Consultant"
                 class="consultation-btn">
                  <span>Apply Now</span>
                  <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="">
              </a>
          </div>
      </article>
  
  </div>
  
  
  <!-- WHY JOIN -->
  <div class="careers-benefits">
  
      <div class="careers-benefits-heading">
          <span class="section-label">WHY JOIN US</span>
          <h2>Why Join <span>Med Vacation?</span></h2>
      </div>
  
      <div class="benefits-grid">
  
          <div class="benefit-item">
              <span class="benefit-number">01</span>
              <h3>Meaningful Work</h3>
              <p>Be part of journeys that can genuinely change lives.</p>
          </div>
  
          <div class="benefit-item">
              <span class="benefit-number">02</span>
              <h3>Professional Growth</h3>
              <p>Develop your skills across healthcare, tourism, and international patient services.</p>
          </div>
  
          <div class="benefit-item">
              <span class="benefit-number">03</span>
              <h3>People-First Culture</h3>
              <p>Work with a team that values empathy, professionalism, and collaboration.</p>
          </div>
  
          <div class="benefit-item">
              <span class="benefit-number">04</span>
              <h3>Global Exposure</h3>
              <p>Interact with international patients, healthcare providers, and travel partners.</p>
          </div>
  
      </div>
  </div>
  
  
    </div>
  </section>
  
@endsection