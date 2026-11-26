@extends('layouts.app')
@section('content')

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
             
       
@endsection