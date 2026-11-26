@extends('layouts.app')

@section('content')
  <!-- =========================================
     HERO / BANNER
========================================= -->

<section class="hero-section reveal-up">
    <!-- Background -->
    <div class="hero-bg')}}"></div>

    <div class="container">
        <div class="hero-content">
            <!-- HERO TITLE -->
            <h1 class="hero-title reveal-down text-center">
                Connecting
                <span class="curtainLeft reveal-left">international patients</span>
                with

                <br class="desktop-break" />

                India's trusted healthcare excellence.
            </h1>

            <!-- HERO DESCRIPTION -->
            <p class="hero-description reveal-up reveal-delay-1 text-center">
                From expert consultations to complete medical travel assistance,
                we ensure every patient<br class="desktop-break" />
                receives trusted care, personalized support, and a seamless
                treatment journey in India.
            </p>

            <!-- HERO BUTTONS -->
            <div
                class="hero-buttons d-flex align-items-center justify-content-center reveal-up reveal-delay-2">
                <a href="#" class="hero-btn hero-btn-green">
                    <span>Get Free Consultation</span>
                    <img src="{{asset('frontend/images/icons/arrow.png')}}" alt="" />
                </a>

                <a href="{{ route('services') }}" class="hero-btn hero-btn-blue">
                    <span>Explore Treatment</span>
                    <img src="{{asset('frontend/images/icons/arrow.png')}}" alt="" />
                </a>
            </div>

            <!-- HERO IMAGE -->
            <div class="hero-image-wrapper reveal-up reveal-delay-3">
                <div class="hero-image">
                    <img src="{{asset('frontend/images/banner.jpg')}}" alt="International patients receiving healthcare in India" />

                    <div class="hero-image-overlay"></div>

                    <!-- HERO FEATURES -->
                    <div class="hero-features">
                        <div class="hero-feature reveal-left reveal-delay-1">
                            <div class="hero-feature-icon">
                                <img src="{{asset('frontend/images/icons/doctors.png')}}" class="img-fluid" alt="" />
                            </div>

                            <div class="hero-feature-content">
                                <strong>Top Doctors</strong>
                                <span>Expert Medical Care</span>
                            </div>
                        </div>

                        <div class="hero-feature reveal-left reveal-delay-2">
                            <div class="hero-feature-icon">
                                <img src="{{asset('frontend/images/icons/hospital.png')}}" class="img-fluid" alt="" />
                            </div>

                            <div class="hero-feature-content">
                                <strong>Trusted Hospitals</strong>
                                <span>World-Class Facilities</span>
                            </div>
                        </div>

                        <div class="hero-feature reveal-right reveal-delay-2">
                            <div class="hero-feature-icon">
                                <img src="{{asset('frontend/images/icons/travel.png')}}" class="img-fluid" alt="" />
                            </div>

                            <div class="hero-feature-content">
                                <strong>Complete Travel</strong>
                                <span>Hassle-Free Assistance</span>
                            </div>
                        </div>

                        <div class="hero-feature reveal-right reveal-delay-3">
                            <div class="hero-feature-icon">
                                <img src="{{asset('frontend/images/icons/care.png')}}" class="img-fluid" alt="" />
                            </div>

                            <div class="hero-feature-content">
                                <strong>Personalized Care</strong>
                                <span>Support Throughout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
ABOUT US SECTION
========================================================= -->

<section class="about-section">
    <div class="container">
        <div class="about-wrapper">
            <!-- LEFT IMAGE -->
            <div class="about-image-area reveal-left">
                <div class="about-image">
                    <img src="{{asset('frontend/images/about-globe.png')}}" alt="Medical tourism healthcare" />
                </div>

                <!-- Experience Badge -->
                <div class="experience-badge reveal-scale">
                    <div class="experience-badge-inner">
                        <svg class="experience-svg" viewBox="0 0 160 160">
                            <defs>
                                <path id="experience-circle" d="M 80,80
          m -60,0
          a 60,60 0 1,1 120,0
          a 60,60 0 1,1 -120,0" />
                            </defs>

                            <text class="experience-text">
                                <textPath href="#experience-circle" startOffset="0%">
                                    EXPERIENCE · 10+ YEARS OF TRUSTED EXPERIENCE · 10+ YEARS
                                    OF TRUSTED
                                </textPath>
                            </text>
                        </svg>

                        <strong>+</strong>
                    </div>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="about-content reveal-right">
                <span class="section-label reveal-down"> ABOUT US </span>

                <h2 class="about-title reveal-right reveal-delay-1">
                    Connecting
                    <span>international</span>
                    patients with India's leading hospitals and specialists, we
                    deliver personalized healthcare solutions with complete medical
                    travel support—from consultation to recovery.
                </h2>

                <p class="about-description reveal-right reveal-delay-2">
                    MED VACATION is a leading medical tourism company linking global
                    patients with India's premier medical facilities and
                    specialists. We provide bespoke healthcare solutions, seamlessly
                    integrating top-notch medical care with exceptional travel
                    experiences. Our mission is to deliver accessible, affordable
                    &amp; high-quality medical treatment, ensuring a smooth &amp;
                    supportive journey for our clients from consultation to
                    recovery, and culminating in rejuvenating wellness vacations and
                    holidays.
                </p>

                <a href="{{ route('about') }}" class="about-button reveal-up reveal-delay-3">
                    <span>Explore More</span>
                    <img src="{{asset('frontend/images/icons/arrow.png')}}" alt="" />
                </a>
            </div>
        </div>

        <!-- STATS -->
        <div class="stats-section">
            <div class="stat-item reveal-up">
                <strong class="counter" data-target="300" data-suffix="+">0</strong>
                <span>Top Hospitals</span>
            </div>

            <div class="stat-item reveal-up reveal-delay-1">
                <strong class="counter" data-target="300" data-suffix="+">0</strong>
                <span>Specialist Doctors</span>
            </div>

            <div class="stat-item reveal-up reveal-delay-2">
                <strong class="counter" data-target="120" data-suffix="+">0</strong>
                <span>Medical Treatments</span>
            </div>

            <div class="stat-item reveal-up reveal-delay-3">
                <strong class="counter" data-target="98" data-suffix="%">0</strong>
                <span>Patient Satisfaction</span>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
TRAVEL EXPERIENCE SECTION
========================================================= -->
<section class="travel-section">
    <div class="travel-background reveal-scale">
        <img src="{{asset('frontend/images/travel-experience.jpg')}}" alt="Medical travel experience" />
    </div>

    <div class="container">
        <div class="travel-content">
            <div class="travel-title-area reveal-left">
                <h2 class="div-title">
                    We Provide Tailored Medical &amp;
                    <br />
                    Travel Experiences
                </h2>
            </div>

            <div class="travel-description-area reveal-right reveal-delay-1">
                <div class="travel-text-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <p>
                                MED VACATION is dedicated to offering personalized
                                healthcare and travel services for a seamless and
                                meaningful journey.
                            </p>
                        </div>

                        <div class="swiper-slide">
                            <p>
                                We connect international patients with trusted doctors and
                                leading healthcare facilities across India.
                            </p>
                        </div>

                        <div class="swiper-slide">
                            <p>
                                From treatment coordination to travel arrangements, we
                                make your healthcare journey simple and comfortable.
                            </p>
                        </div>

                        <div class="swiper-slide">
                            <p>
                                Our team provides personalized support throughout your
                                medical journey, from consultation to post-treatment care.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="travel-arrows reveal-up reveal-delay-2">
                    <button type="button" class="travel-arrow travel-arrow-prev">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>

                    <button type="button" class="travel-arrow travel-arrow-next">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================================
TRAVEL EXPERIENCES SECTION
========================================================= -->

<section class="experience-section">
    <!-- BACKGROUND -->
    <div class="experience-bg reveal-scale">
        <img src="{{asset('frontend/images/why-us-bg.jpg')}}" alt="Medical travel experience" />
    </div>

    <!-- EXPERIENCE SLIDER -->
    <div class="experience-slider swiper">
        <div class="experience-cards swiper-wrapper">
            <!-- CARD 1 -->
            <a href="{{ url('personalized-treatment') }}" class="experience-card swiper-slide reveal-up">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/personalized-treatment.jpg')}}"
                        alt="Personalized treatment plans" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Personalized Treatment
                        <br />
                        Plans
                    </h3>

                    <p>
                        Receive customized medical plans tailored to your health
                        needs, preferences, and medical history.
                    </p>
                </div>
            </a>

            <!-- CARD 2 -->
            <a href="{{ route('services') }}" class="experience-card swiper-slide reveal-up reveal-delay-1">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/travel-packages.jpg')}}" alt="Customizable travel packages" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Customizable Travel
                        <br />
                        Packages
                    </h3>

                    <p>Flexible travel arrangements to suit client requirements.</p>
                </div>
            </a>

            <!-- CARD 3 -->
            <a href="{{ route('cultural-immersion') }}" class="experience-card swiper-slide reveal-up reveal-delay-2">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/cultural-immersion.jpg')}}" alt="Cultural immersion programs" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Cultural Immersion
                        <br />
                        Programs
                    </h3>

                    <p>
                        Unique local experiences, such as cooking classes, local
                        tours, and cultural events.
                    </p>
                </div>
            </a>

            <!-- CARD 4 -->
            <a href="{{ route('case-managers') }}" class="experience-card swiper-slide reveal-up reveal-delay-3">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/case-manager.jpg')}}" alt="Dedicated case managers" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Dedicated Case
                        <br />
                        Managers
                    </h3>

                    <p>
                        Assigned case managers for personalized support throughout the
                        journey.
                    </p>
                </div>
            </a>
            <!-- CARD 1 -->
            <a href="{{ route('personalized-treatment') }}" class="experience-card swiper-slide reveal-up">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/personalized-treatment.jpg')}}"
                        alt="Personalized treatment plans" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Personalized Treatment
                        <br />
                        Plans
                    </h3>

                    <p>
                        Receive customized medical plans tailored to your health
                        needs, preferences, and medical history.
                    </p>
                </div>
            </a>

            <!-- CARD 2 -->
            <a href="{{ route('services') }}" class="experience-card swiper-slide reveal-up reveal-delay-1">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/travel-packages.jpg')}}" alt="Customizable travel packages" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Customizable Travel
                        <br />
                        Packages
                    </h3>

                    <p>Flexible travel arrangements to suit client requirements.</p>
                </div>
            </a>

            <!-- CARD 3 -->
            <a href="{{ route('cultural-immersion') }}" class="experience-card swiper-slide reveal-up reveal-delay-2">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/cultural-immersion.jpg')}}" alt="Cultural immersion programs" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Cultural Immersion
                        <br />
                        Programs
                    </h3>

                    <p>
                        Unique local experiences, such as cooking classes, local
                        tours, and cultural events.
                    </p>
                </div>
            </a>

            <!-- CARD 4 -->
            <a href="{{ route('case-managers') }}" class="experience-card swiper-slide reveal-up reveal-delay-3">
                <div class="experience-card-image">
                    <img src="{{asset('frontend/images/experience/case-manager.jpg')}}" alt="Dedicated case managers" />

                    <span class="experience-card-arrow">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>

                <div class="experience-card-content">
                    <h3>
                        Dedicated Case
                        <br />
                        Managers
                    </h3>

                    <p>
                        Assigned case managers for personalized support throughout the
                        journey.
                    </p>
                </div>
            </a>
        </div>
    </div>

    <!-- =================================================
WHY CHOOSE US
================================================== -->

    <section class="why-choose-section">
        <div class="container">
            <div class="why-choose-grid">
                <!-- INTRO -->
                <div class="why-choose-intro reveal-left">
                    <span class="section-label"> WHY CHOOSE US </span>

                    <h2 class="div-title">
                        Trusted Expertise.<br />
                        Personalized Care.<br />
                        Exceptional Outcomes.
                    </h2>
                </div>

                <!-- FEATURE 1 -->
                <div class="why-feature reveal-up">
                    <div class="why-feature-icon">
                        <img src="{{asset('frontend/images/icons/expertise.png')}}" alt="" />
                    </div>

                    <h3>Expertise</h3>

                    <p>
                        Our team has extensive experience in medical tourism, ensuring
                        seamless coordination and exceptional care.
                    </p>
                </div>

                <!-- FEATURE 2 -->
                <div class="why-feature reveal-up reveal-delay-1">
                    <div class="why-feature-icon">
                        <img src="{{asset('frontend/images/icons/trusted.png')}}" alt="" />
                    </div>

                    <h3>Trusted Network</h3>

                    <p>
                        We've established partnerships with top medical facilities and
                        specialists, guaranteeing high-quality treatment.
                    </p>
                </div>

                <!-- FEATURE 3 -->
                <div class="why-feature reveal-up reveal-delay-2">
                    <div class="why-feature-icon">
                        <img src="{{asset('frontend/images/icons/personalized.png')}}" alt="" />
                    </div>

                    <h3>Personalized approach</h3>

                    <p>
                        We tailor our services to meet each client's unique needs and
                        preferences.
                    </p>
                </div>

                <!-- FEATURE 4 -->
                <div class="why-feature reveal-up reveal-delay-3">
                    <div class="why-feature-icon">
                        <img src="{{asset('frontend/images/icons/comprehensive.png')}}" alt="" />
                    </div>

                    <h3>Comprehensive support</h3>

                    <p>
                        Our dedicated team handles every aspect of the client's
                        journey, providing peace of mind.
                    </p>
                </div>

                <!-- FEATURE 5 -->
                <div class="why-feature reveal-up reveal-delay-1">
                    <div class="why-feature-icon">
                        <img src="{{asset('frontend/images/icons/memorable.png')}}" alt="" />
                    </div>

                    <h3>Memorable Experiences</h3>

                    <p>
                        We curate unforgettable experiences, blending medical care
                        with cultural immersion and exploration.
                    </p>
                </div>

                <!-- FEATURE 6 -->
                <div class="why-feature reveal-up reveal-delay-2">
                    <div class="why-feature-icon">
                        <img src="{{asset('frontend/images/icons/proven.png')}}" alt="" />
                    </div>

                    <h3>Proven Results</h3>

                    <p>
                        Our success stories and satisfied clients speak to our
                        commitment to excellence.
                    </p>
                </div>

                <!-- FEATURE 7 -->
                <div class="why-feature reveal-up reveal-delay-3">
                    <div class="why-feature-icon">
                        <img src="{{asset('frontend/images/icons/compassionate.png')}}" alt="" />
                    </div>

                    <h3>Compassionate Care</h3>

                    <p>
                        We prioritize our clients' well-being, providing emotional
                        support and empathy.
                    </p>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- =========================================================
WHY CHOOSE US
========================================================= -->

<!-- =========================================================     EMERGENCY MEDICAL CARE SECTION ========================================================= -->

<section class="emergency-section">
    <div class="container-fluid p-0">
        <div class="emergency-wrapper">
            <!-- LEFT CONTENT -->
            <div class="emergency-content reveal-left">
                <div class="emergency-inner">
                    <h2 class="div-title">
                        Need Emergency
                        <br />
                        <span class="italic-heading curtainLeft reveal-left">medical care?</span>
                    </h2>

                    <!-- Phone Numbers -->
                    <div class="emergency-phone reveal-up reveal-delay-1">
                        <div class="emergency-phone-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div class="emergency-phone-numbers">
                            <a href="tel:+917208605067"> +91 7208605067 </a>

                            <a href="tel:+917021562437"> +91 7021562437 </a>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="emergency-description reveal-up reveal-delay-2">
                        We provide immediate, expert medical assistance
                        <br />
                        24/7 to ensure your health and safety.
                    </p>

                    <!-- Buttons -->
                    <div class="emergency-buttons reveal-up reveal-delay-3">
                        <a href="tel:+917208605067" class="emergency-btn emergency-btn-white">
                            <span>Connect Us</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                        <a href="{{ route('contact') }}" class="consultation-btn">
                            <span>Explore More</span>
                            <img src="{{asset('frontend/images/icons/arrow.png')}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="emergency-image reveal-right">
                <img src="{{asset('frontend/images/emergency-doctor.jpg')}}" alt="Emergency medical care" />

                <div class="emergency-image-overlay"></div>

                <div class="emergency-image-title reveal-up">
                    <h3 class="div-title">
                        <span class="italic-heading curtainLeft reveal-left">Healing</span>
                        Beyond Borders.
                    </h3>
                </div>
            </div>
        </div>

        <!-- BOTTOM FEATURES -->
        <div class="emergency-features">
            <!-- Feature 1 -->
            <div class="emergency-feature reveal-up">
                <div class="emergency-feature-icon">
                    <img src="{{asset('frontend/images/icons/24.png')}}" alt="" />
                    <span>24/7</span>
                </div>

                <div class="emergency-feature-content">
                    <h4>24/7 Support</h4>

                    <p>Round-the-clock medical assistance whenever you need it.</p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="emergency-feature reveal-up reveal-delay-1">
                <div class="emergency-feature-icon">
                    <img src="{{asset('frontend/images/icons/expert.png')}}" alt="" />
                </div>

                <div class="emergency-feature-content">
                    <h4>Expert Care</h4>

                    <p>
                        Access experienced doctors and trusted healthcare specialists.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="emergency-feature reveal-up reveal-delay-2">
                <div class="emergency-feature-icon">
                    <img src="{{asset('frontend/images/icons/global.png')}}" alt="" />
                </div>

                <div class="emergency-feature-content">
                    <h4>Global Assistance</h4>

                    <p>
                        Supporting international patients from arrival to recovery.
                    </p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="emergency-feature reveal-up reveal-delay-3">
                <div class="emergency-feature-icon">
                    <img src="{{asset('frontend/images/icons/patient.png')}}" alt="" />
                </div>

                <div class="emergency-feature-content">
                    <h4>Patient-First Care</h4>

                    <p>Your health, comfort, and safety are always our priority.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =========================================================
SERVICES SECTION
========================================================= -->

<section class="services-section">
    <div class="container">
        <!-- SERVICES HEADER -->
        <div class="services-heading reveal-up">
            <div class="services-bg-title">Services</div>

            <h2 class="div-title">
                Comprehensive Care, Tailored for
                <span>Every Patient.</span>
            </h2>
        </div>

        <!-- SERVICES LIST -->
        <div class="services-list">
            <!-- SERVICE 01 -->
            <article class="service-item reveal-left">
                <div class="service-number">01</div>

                <div class="service-image">
                    <img src="{{asset('frontend/images/services/medical-tourism.jpg')}}" alt="Medical Tourism" />
                </div>

                <div class="service-content">
                    <h3>Medical Tourism</h3>

                    <p>
                        Connecting patients with top medical facilities and
                        specialists worldwide.
                    </p>

                    <a href="#" class="service-arrow" aria-label="Medical Tourism">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- SERVICE 02 -->
            <article class="service-item reveal-right reveal-delay-1">
                <div class="service-number">02</div>

                <div class="service-image">
                    <img src="{{asset('frontend/images/services/treatment-coordination.jpg')}}" alt="Treatment Coordination" />
                </div>

                <div class="service-content">
                    <h3>Treatment Coordination</h3>

                    <p>
                        Managing medical appointments, procedures, and follow-up care.
                    </p>

                    <a href="#" class="service-arrow" aria-label="Treatment Coordination">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- SERVICE 03 -->
            <article class="service-item reveal-left reveal-delay-2">
                <div class="service-number">03</div>

                <div class="service-image">
                    <img src="{{asset('frontend/images/services/travel-arrangements.jpg')}}" alt="Travel Arrangements" />
                </div>

                <div class="service-content">
                    <h3>Travel Arrangements</h3>

                    <p>Booking flights, accommodations, and transportation.</p>

                    <a href="#" class="service-arrow" aria-label="Travel Arrangements">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>
        </div>

        <!-- EXPLORE ALL BUTTON -->
        <div class="services-footer reveal-up reveal-delay-3">
            <a href="{{ route('services') }}" class="consultation-btn">
                <span> Explore All </span>

                <img src="{{asset('frontend/images/icons/arrow.png')}}" alt="" />
            </a>
        </div>
    </div>
</section>
<!-- =========================================================
MED VACATION ADVANTAGE
========================================================= -->

<section class="advantage-section">
    <div class="container">
        <div class="advantage-wrapper">
            <!-- =========================================
   ADVANTAGE CONTENT
========================================== -->

            <div class="advantage-content reveal-left">
                <!-- Heading -->
                <div class="advantage-heading reveal-up">
                    <h2 class="div-title">
                        The Med Vacation
                        <span class="italic-heading curtainLeft reveal-left">Advantage</span>
                    </h2>

                    <p>
                        Six reasons patients across the world
                        <br />
                        trust us for their healthcare journey.
                    </p>
                </div>

                <!-- ADVANTAGE FEATURES -->
                <div class="advantage-features">
                    <!-- Feature 1 -->
                    <div class="advantage-feature reveal-up">
                        <div class="advantage-icon">
                            <img src="{{asset('frontend/images/icons/personalized-care.png')}}" class="img-fluid"
                                alt="Personalized Care" />
                        </div>

                        <h3>Personalized Care</h3>

                        <p>
                            Treatment plans tailored to your unique healthcare needs.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="advantage-feature reveal-up reveal-delay-1">
                        <div class="advantage-icon">
                            <img src="{{asset('frontend/images/icons/thn.png')}}" class="img-fluid"
                                alt="Trusted Hospital Network" />
                        </div>

                        <h3>
                            Trusted Hospital
                            <br />
                            Network
                        </h3>

                        <p>
                            Access India's leading hospitals and expert specialists.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="advantage-feature reveal-up reveal-delay-2">
                        <div class="advantage-icon">
                            <img src="{{asset('frontend/images/icons/endt-n.png')}}" class="img-fluid" alt="End-to-End Support" />
                        </div>

                        <h3>End-to-End Support</h3>

                        <p>From consultation to recovery, we manage every step.</p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="advantage-feature reveal-up reveal-delay-3">
                        <div class="advantage-icon">
                            <img src="{{asset('frontend/images/icons/holistic.png')}}" class="img-fluid" alt="Holistic Support" />
                        </div>

                        <h3>Holistic Support</h3>

                        <p>Medical, travel, and emotional care under one roof.</p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="advantage-feature reveal-up reveal-delay-1">
                        <div class="advantage-icon">
                            <img src="{{asset('frontend/images/icons/transparent.png')}}" class="img-fluid"
                                alt="Transparent Guidance" />
                        </div>

                        <h3>
                            Transparent
                            <br />
                            Guidance
                        </h3>

                        <p>
                            Clear communication and trusted support throughout your
                            journey.
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="advantage-feature reveal-up reveal-delay-2">
                        <div class="advantage-icon">
                            <img src="{{asset('frontend/images/icons/quality.png')}}" class="img-fluid" alt="Quality Assurance" />
                        </div>

                        <h3>
                            Quality
                            <br />
                            assurance
                        </h3>

                        <p>
                            We maintain rigorous quality standards, ensuring exceptional
                            care and service.
                        </p>
                    </div>
                </div>
            </div>

            <!-- =========================================
   ADVANTAGE IMAGE
========================================== -->

            <div class="advantage-image reveal-right">
                <img src="{{asset('frontend/images/advantage-doctor.jpg')}}" alt="Healing beyond treatment" />

                <div class="advantage-image-overlay"></div>

                <div class="advantage-image-content reveal-up">
                    <h3>
                        <span>Healing Beyond</span> <br />
                        Treatment
                    </h3>

                    <a href="{{ route('contact') }}" class="consultation-btn">
                        <span>Book Now</span>
                        <img src="{{asset('frontend/images/icons/arrow.png')}}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
TESTIMONIALS
========================================================= -->

<section class="testimonial-section">
    <div class="container">
        <!-- TESTIMONIAL HEADER -->
        <div class="testimonial-header">
            <div class="testimonial-label reveal-left">TESTIMONIAL</div>

            <div class="testimonial-title reveal-up">
                <h2>
                    Real experiences.<br />
                    Trusted care. Lasting recovery.
                </h2>
            </div>

            <div class="testimonial-action reveal-right">
                <a href="{{ route('testimonials') }}" class="consultation-btn">
                    <span>Read all Stories</span>
                    <img src="{{asset('frontend/images/icons/arrow.png')}}" alt="" />
                </a>
            </div>
        </div>

        <!-- TESTIMONIAL LIST -->
        <div class="testimonial-slider swiper">
            <div class="testimonial-list swiper-wrapper">
                <!-- Testimonial 1 -->
                <article class="testimonial-card swiper-slide">
                    <div class="testimonial-quote">“</div>

                    <div class="testimonial-line"></div>

                    <p class="testimonial-text">
                        Med Vacation made my medical journey smooth and stress-free.
                        From airport pickup to hospital admission, everything was
                        handled with care and professionalism.
                    </p>

                    <div class="testimonial-author">— ASHOK KUMAR, INDIA</div>

                    <div class="testimonial-author-line"></div>
                </article>

                <!-- Testimonial 2 -->
                <article class="testimonial-card swiper-slide">
                    <div class="testimonial-quote">“</div>

                    <div class="testimonial-line"></div>

                    <p class="testimonial-text">
                        The entire experience was seamless. The team was supportive,
                        responsive, and made sure I received excellent medical care in
                        India.
                    </p>

                    <div class="testimonial-author">— MARIA GONZALES, SPAIN</div>

                    <div class="testimonial-author-line"></div>
                </article>

                <!-- Testimonial 3 -->
                <article class="testimonial-card swiper-slide">
                    <div class="testimonial-quote">“</div>

                    <div class="testimonial-line"></div>

                    <p class="testimonial-text">
                        It’s rare to find a team that is both professional and
                        genuinely warm. My family and I are truly grateful for the
                        support we received throughout our journey.
                    </p>

                    <div class="testimonial-author">— CHEN WEI, CHINA</div>

                    <div class="testimonial-author-line"></div>
                </article>

                <!-- Testimonial 4 -->
                <article class="testimonial-card swiper-slide">
                    <div class="testimonial-quote">“</div>

                    <div class="testimonial-line"></div>

                    <p class="testimonial-text">
                        The professionalism and personal attention from the Med
                        Vacation team made my experience truly memorable. I would
                        highly recommend their services.
                    </p>

                    <div class="testimonial-author">— PRIYA PATEL, INDIA</div>

                    <div class="testimonial-author-line"></div>
                </article>

                <!-- Testimonial 5 -->
                <article class="testimonial-card swiper-slide">
                    <div class="testimonial-quote">“</div>

                    <div class="testimonial-line"></div>

                    <p class="testimonial-text">
                        My experience with Med Vacation exceeded my expectations.
                        Their team genuinely cares about patients and makes every step
                        of the journey easier.
                    </p>

                    <div class="testimonial-author">— OLIVIA SMITH, UK</div>

                    <div class="testimonial-author-line"></div>
                </article>

                <!-- Testimonial 6 -->
                <article class="testimonial-card swiper-slide">
                    <div class="testimonial-quote">“</div>

                    <div class="testimonial-line"></div>

                    <p class="testimonial-text">
                        I felt comfortable and supported from the moment I arrived
                        until the end of my treatment. The coordination and assistance
                        were exceptional.
                    </p>

                    <div class="testimonial-author">— RAVI KUMAR, INDIA</div>

                    <div class="testimonial-author-line"></div>
                </article>
            </div>
        </div>
    </div>
</section>

@endsection
