@extends('layouts.app')

@section('title', 'About Us')

@section('content')

      <!-- =========================================================
     ABOUT HERO
========================================================= -->

<section class="breadcrumb-hero">
    <div class="breadcrumb-hero-bg"></div>

    <div class="container">
      <div class="breadcrumb-hero-content reveal-up">
      <h1> About Us </h1>


        <div class="about-breadcrumb">
          <a href="index.html">Home</a>

          <i class="fa-solid fa-chevron-right"></i>

          <span>About Us</span>
        </div>
      </div>
    </div>
  </section>
  <!-- ========================================================     ABOUT CONTENT ========================================================= -->

  <section class="about-content-section">
    <div class="container">
      <div class="about-content-grid">
        <!-- IMAGE -->
        <div class="about-content-image reveal-left">
          <img
            src="{{ asset('frontend/images/about-pg.jpg') }}"
            alt="About MED VACATION"
          />
        </div>

        <!-- CONTENT -->
        <div class="about-content-text reveal-right">
          <span class="section-label"> ABOUT MED VACATION </span>

          <h2>
            Connecting the World to
            <span>India's Healthcare Excellence.</span>
          </h2>

          <p>
            MED VACATION is a Medical Value Tourism company dedicated to
            connecting international patients with India's exceptional
            doctors, hospitals, and healthcare facilities.
          </p>

          <p>
            We combine India's medical expertise with global patient needs
            to deliver world-class treatments at the most affordable prices,
            while ensuring a seamless and personalized healthcare journey.
          </p>

          <p>
            From identifying the right medical specialists and healthcare
            facilities to coordinating the patient's journey, our focus is
            to make medical travel simple, reliable, and comfortable.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- =========================================================
 VISION & MISSION
========================================================= -->

  <section class="vision-mission-section">
    <div class="container">
      <div class="vm-heading reveal-up">
        <span class="section-label"> OUR PURPOSE </span>

        <h2>Vision & <span>Mission</span></h2>
      </div>

      <div class="vm-grid">
        <!-- VISION -->
        <div class="vm-card vision-card reveal-left">
          <div class="vm-icon">
            <i class="fa-solid fa-eye"></i>
          </div>

          <div class="vm-content">
            <span class="vm-number"> 01 </span>

            <h3>Our Vision</h3>

            <p>
              To be India’s leading Medical Value Tourism company,
              connecting the world to the country’s exceptional doctors and
              healthcare facilities.
            </p>

            <p>
              We aim to combine India’s medical expertise with global
              patient needs, delivering world-class treatments at the most
              affordable prices.
            </p>
          </div>
        </div>

        <!-- MISSION -->
        <div class="vm-card mission-card reveal-right">
          <div class="vm-icon">
            <i class="fa-solid fa-bullseye"></i>
          </div>

          <div class="vm-content">
            <span class="vm-number"> 02 </span>

            <h3>Our Mission</h3>

            <ul>
              <li>
                To ensure uncompromising quality in every aspect of the
                patient’s medical journey.
              </li>

              <li>
                To provide a hassle-free, end-to-end experience, from the
                patient’s home country to India and back.
              </li>

              <li>
                To identify and collaborate with top doctors and healthcare
                facilities, continuously expanding our network.
              </li>

              <li>
                To integrate these medical experts into a well-organized
                system that elevates the overall standard of care for
                international patients.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="founders-section">
    <div class="container">
      <div class="founders-heading reveal-up">
        <span class="section-label"> OUR LEADERSHIP </span>

        <h2>
          Meet Our
          <span>Founders</span>
        </h2>

        <p>
          Meet the experienced professionals driving MED VACATION towards a
          more connected and patient-focused healthcare experience.
        </p>
      </div>

      <div class="founders-grid">
        <article class="founder-card reveal-up">
          <div class="founder-image">
            <img
              src="{{ asset('frontend/images/profile/swati.webp') }}"
              alt="Swati Lodha"
            />
          </div>

          <div class="founder-content">
            <h3>Swati Lodha</h3>
            <span>Vice President</span>
          </div>
        </article>

        <article class="founder-card reveal-up reveal-delay-1">
          <div class="founder-image">
            <img
              src="{{ asset('frontend/images/profile/anita.webp') }}"
              alt="Anita Bajaj"
            />
          </div>

          <div class="founder-content">
            <h3>Anita Bajaj</h3>
            <span>Chief Coordinator Global Sales</span>
          </div>
        </article>

        <article class="founder-card reveal-up reveal-delay-2">
          <div class="founder-image">
            <img
              src="{{ asset('frontend/images/profile/tejas.webp') }}"
              alt="Tejes Vani"
            />
          </div>

          <div class="founder-content">
            <h3>Tejes Vani</h3>
            <span>Chief Coordinator Global Sales</span>
          </div>
        </article>

        <article class="founder-card reveal-up reveal-delay-3">
          <div class="founder-image">
            <img
                        src="{{ asset('frontend/images/profile/ramanand.webp') }}"
              alt="Dr. Ramanand Yadaw"
            />
          </div>

          <div class="founder-content">
            <h3>Dr. Ramanand Yadaw</h3>
            <span> Chief Medical Strategy and Alliance Officer </span>
          </div>
        </article>

        <article class="founder-card reveal-up">
          <div class="founder-image">
            <img
                    src="{{ asset('frontend/images/profile/gaurav.webp') }}"
              alt="Dr. Gaurav Jain"
            />
          </div>

          <div class="founder-content">
            <h3>Dr. Gaurav Jain</h3>
            <span> Chief Medical Strategy and Alliance Officer </span>
          </div>
        </article>

        <article class="founder-card reveal-up reveal-delay-1">
          <div class="founder-image">
            <img
              src="{{ asset('frontend/images/profile/user.jpg') }}"
              alt="Deepak Singhania"
            />
          </div>

          <div class="founder-content">
            <h3>Deepak Singhania</h3>
            <span> CFO / Chief Financial Officer </span>
          </div>
        </article>

        <article class="founder-card reveal-up reveal-delay-2">
          <div class="founder-image">
            <img
              src="{{ asset('frontend/images/profile/mahip.webp') }}"
              alt="Mahip Agarwal"
            />
          </div>

          <div class="founder-content">
            <h3>Mahip Agarwal</h3>
            <span> Travel Agent - International </span>
          </div>
        </article>
      </div>
    </div>
  </section>
@endsection