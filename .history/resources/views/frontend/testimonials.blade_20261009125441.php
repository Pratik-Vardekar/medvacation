@extends('layouts.app')
@section('content')

<section class="breadcrumb-hero">
      <div class="breadcrumb-hero-bg"></div>

      <div class="container">
        <div class="breadcrumb-hero-content reveal-up">
        <h1> Testimonial </h1>


          <div class="about-breadcrumb">
            <a href="{{ route('home') }}">Home</a>

            <i class="fa-solid fa-chevron-right"></i>

            <span>Testimonial</span>
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
          <span class="section-label"> PATIENT STORIES </span>

          <h2>
            What Our
            <span>Patients Say</span>
          </h2>

          <p> Real experiences from patients who trusted Med Vacation
      throughout their medical journey.</p>
        </div>

  <div class="testimonials-grid">

    <!-- TESTIMONIAL 01 -->
<article class="testimonial-card swiper-slide">
<div class="testimonial-quote">“</div>

<div class="testimonial-line"></div>

<p class="testimonial-text">
  Med Vacation made my medical journey smooth and stress-free.
  From airport pickup to hospital admission, everything was handled
  with care and professionalism.
</p>

<div class="testimonial-author">— ASHOK KUMAR, INDIA</div>

<div class="testimonial-author-line"></div>
</article>


<article class="testimonial-card swiper-slide">
<div class="testimonial-quote">“</div>

<div class="testimonial-line"></div>

<p class="testimonial-text">
  The entire experience was seamless. The team was supportive,
  responsive, and made sure I received excellent medical care in India.
</p>

<div class="testimonial-author">— MARIA GONZALES, USA</div>

<div class="testimonial-author-line"></div>
</article>


<article class="testimonial-card swiper-slide">
<div class="testimonial-quote">“</div>

<div class="testimonial-line"></div>

<p class="testimonial-text">
  It’s rare to find a team that is both professional and genuinely warm.
  My family and I are truly grateful for the support we received
  throughout our journey.
</p>

<div class="testimonial-author">— CHEN WEI, CHINA</div>

<div class="testimonial-author-line"></div>
</article>


<article class="testimonial-card swiper-slide">
<div class="testimonial-quote">“</div>

<div class="testimonial-line"></div>

<p class="testimonial-text">
  The professionalism and personal attention from the Med Vacation team
  made my experience truly memorable. I would highly recommend their services.
</p>

<div class="testimonial-author">— PRIYA PATEL, INDIA</div>

<div class="testimonial-author-line"></div>
</article>


<article class="testimonial-card swiper-slide">
<div class="testimonial-quote">“</div>

<div class="testimonial-line"></div>

<p class="testimonial-text">
  My experience with Med Vacation exceeded my expectations. Their team
  genuinely cares about patients and makes every step of the journey easier.
</p>

<div class="testimonial-author">— OLIVIA SMITH, UK</div>

<div class="testimonial-author-line"></div>
</article>


<article class="testimonial-card swiper-slide">
<div class="testimonial-quote">“</div>

<div class="testimonial-line"></div>

<p class="testimonial-text">
  I felt comfortable and supported from the moment I arrived until the
  end of my treatment. The coordination and assistance were exceptional.
</p>

<div class="testimonial-author">— RAVI KUMAR, INDIA</div>

<div class="testimonial-author-line"></div>
</article>

  </div>
</div>
</section>

 
@endsection