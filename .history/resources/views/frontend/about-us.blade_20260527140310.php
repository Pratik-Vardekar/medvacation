@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<section class="banner-section inner-page-banner position-relative">
    <div class="banner-right-img">
        <img src="{{ asset('public/'.$about->banner_image) }}" class="img" alt="banner-img">
    </div>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-12 col-12">
                    <div class="hero-overlay">
                        <h1 class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="400">
                            About <span class="color-5d4037">Us</span>
                        </h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    About Us
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section class="about-section counter-section position-relative pt-100 pb-100">
    <div class="container container-padding">
        <div class="row">

            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-12 d-flex align-items-center">
                <div class="about-right-text" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="600">

                    <h3 class="title color-11612d"
                        data-aos="fade-up"
                        data-aos-easing="linear"
                        data-aos-duration="600">

                        {{ $about->main_title }}

                    </h3>

                    <h4 class="div-title"
                        data-aos="fade-up"
                        data-aos-easing="linear"
                        data-aos-duration="800">

                        <!-- <span class="color-d5aa0f">
                            {{ $about->experience_years }}
                        </span> -->

                        {{ $about->experience_title }}

                    </h4>

                    <p>{{ $about->about_description_1 }}</p>

                    <p>{{ $about->about_description_2 }}</p>

                    <p>{{ $about->about_description_3 }}</p>

                </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-12">
                <div class="about-img box-color-border img-zoom"
                     data-aos="zoom-in"
                     data-aos-easing="linear"
                     data-aos-duration="600">

                    <img src="{{ asset('public/'.$about->about_image) }}"
                         class="img zoom"
                         alt="about-image">

                </div>
            </div>

        </div>
    </div>
</section>

<section class="trusted-partner-section trusted-partner-bg pt-100 pb-100">
    <div class="container">
        <div class="row trusted-padding">

            <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-between ms-auto">

                <div class="inner-about-content">

                    <h3 class="title color-11612d"
                        data-aos="fade-up"
                        data-aos-easing="linear"
                        data-aos-duration="400">

                        {{ $about->partner_title }}

                    </h3>

                    <p data-aos="fade-up"
   data-aos-easing="linear"
   data-aos-duration="600"
   style="text-align: justify;">

    {{ $about->partner_description }}

</p>

                </div>
<style>
.text-justify {
    text-align: justify;
}

/* Compact & Attractive Card Design */
.card-custom {
    background: linear-gradient(135deg, #ffffff 0%, #fefefe 100%);
    border-radius: 16px;
    padding: 20px 24px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    border: 1px solid rgba(17, 97, 45, 0.08);
    position: relative;
}

.card-custom:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    border-color: rgba(17, 97, 45, 0.15);
}

/* Director Content - More Compact */
.director-content {
    position: relative;
    z-index: 1;
}

.div-text {
    font-size: 18px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 4px;
    letter-spacing: 0.3px;
}

.card-text {
    font-size: 13px;
    color: #11612d;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
    display: inline-block;
    padding-bottom: 6px;
    border-bottom: 2px solid #d5aa0f;
}

/* Contact Links - Tighter Spacing */
.mt-20 {
    margin-top: 12px;
}

.mt-20 p {
    margin-bottom: 8px;
}

.mt-20 a {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #555;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    padding: 4px 0;
}

.mt-20 a:hover {
    color: #11612d;
    transform: translateX(3px);
}

.mt-20 .svg {
    width: 16px;
    height: 16px;
    transition: all 0.3s ease;
}

.mt-20 a:hover .svg {
    transform: scale(1.1);
}

/* Alternative: Side-by-side layout for director info */
.card-custom-horizontal {
    background: #ffffff;
    border-radius: 12px;
    padding: 16px 20px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border-left: 3px solid #d5aa0f;
}

.card-custom-horizontal:hover {
    transform: translateX(3px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

/* Alternative: Minimal Card with less white space */
.card-custom-minimal {
    background: transparent;
    border-radius: 12px;
    padding: 16px 0;
    border-top: 1px solid rgba(17, 97, 45, 0.1);
    border-bottom: 1px solid rgba(17, 97, 45, 0.1);
}

/* Responsive Director Image */
.director-img {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.director-img .img {
    transition: transform 0.4s ease;
    height: auto;
    object-fit: cover;
}

.director-img:hover .img {
    transform: scale(1.02);
}

/* For the existing card in your code - make it tighter */
.trusted-partner-section .card-custom {
    background: #ffffff;
    border-radius: 16px;
    padding: 20px 24px;
    margin-top: 20px;
}

/* If you want even tighter spacing for the white card area */
@media (min-width: 992px) {
    .trusted-partner-section .ms-auto {
        padding-left: 30px;
    }
    
    .card-custom {
        max-width: 90%;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .card-custom {
        padding: 16px 20px;
    }
    
    .div-text {
        font-size: 16px;
    }
    
    .card-text {
        font-size: 12px;
    }
    
    .mt-20 a {
        font-size: 13px;
    }
}
</style>
                <div class="card-custom h-auto">

                    <div class="director-content d-flex justify-content-between">

                        <div data-aos="fade-up"
                             data-aos-easing="linear"
                             data-aos-duration="400">

                            <div class="div-text color-000000 mb-0">
                                {{ $about->director_name }}
                            </div>

                            <div class="card-text">
                                {{ $about->director_designation }}
                            </div>

                            <div class="mt-20">

                                <p>
                                    <a href="tel:{{ $about->director_phone }}">
                                        <img src="{{ asset('public/assets/images/icons/call.svg') }}"
                                             class="svg"
                                             alt="call">

                                        {{ $about->director_phone }}
                                    </a>
                                </p>

                                <p>
                                    <a href="mailto:{{ $about->director_email }}">
                                        <img src="{{ asset('public/assets/images/icons/mail.svg') }}"
                                             class="svg"
                                             alt="mail">

                                        {{ $about->director_email }}
                                    </a>
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">

                <div class="director-img img-zoom"
                     data-aos="zoom-in"
                     data-aos-easing="linear"
                     data-aos-duration="800">

                   <img src="{{ asset('public/'.$about->director_image) }}"
     class="img zoom"
     alt="director-image"
     style="height: 700px; width: 100%; object-fit: cover;">
                </div>

            </div>

        </div>
    </div>
</section>
<section class="trusted-partner-section pt-100 pb-100">
    <div class="container">
        <div class="row align-items-center gx-5">

            <!-- Image -->
            <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-between ms-auto">

                <div class="director-img img-zoom"
                     data-aos="zoom-in"
                     data-aos-easing="linear"
                     data-aos-duration="800">

                    <img src="{{ asset('public/'.$about->preetpal_image) }}"
                         class="img zoom rounded mb-2"
                         alt="{{ $about->preetpal_name }}">

                </div>

            </div>

            <!-- Content -->
            <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-between ms-auto">

                <div class="inner-about-content">

                    <h3 class="title color-11612d"
                        data-aos="fade-up"
                        data-aos-easing="linear"
                        data-aos-duration="400">

                        {{ $about->preetpal_title }}

                    </h3>

                    <p class="text-justify"
                       data-aos="fade-up"
                       data-aos-easing="linear"
                       data-aos-duration="600">

                        {{ $about->preetpal_description_1 }}

                    </p>

                    <p class="text-justify"
                       data-aos="fade-up"
                       data-aos-easing="linear"
                       data-aos-duration="700">

                        {{ $about->preetpal_description_2 }}

                    </p>

                    <p class="text-justify"
                       data-aos="fade-up"
                       data-aos-easing="linear"
                       data-aos-duration="800">

                        {{ $about->preetpal_description_3 }}

                    </p>

                    <p class="text-justify"
                       data-aos="fade-up"
                       data-aos-easing="linear"
                       data-aos-duration="900">

                        {{ $about->preetpal_description_4 }}

                    </p>

                    <div class="mt-4"
                         data-aos="fade-up"
                         data-aos-duration="1000">

                          <div class="card-custom h-auto">

                    <div class="director-content d-flex justify-content-between">

                        <div data-aos="fade-up"
                             data-aos-easing="linear"
                             data-aos-duration="400">

                            <div class="div-text color-000000 mb-0">
                                {{ $about->preetpal_name }}
                            </div>

                            <div class="card-text">
                                {{ $about->preetpal_designation }}
                            </div>

                            <div class="mt-20">

                                <p>
                                    <a href="tel:{{ $about->preetpal_phone }}">
                                        <img src="{{ asset('public/assets/images/icons/call.svg') }}"
                                             class="svg"
                                             alt="call">

                                        {{ $about->preetpal_phone }}
                                    </a>
                                </p>

                                <p>
                                    <a href="mailto:{{ $about->preetpal_email }}">
                                        <img src="{{ asset('public/assets/images/icons/mail.svg') }}"
                                             class="svg"
                                             alt="mail">

                                        {{ $about->preetpal_email }}
                                    </a>
                                </p>

                            </div>
                        </div>

                    </div>
                </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<section class="about-section counter-section position-relative pt-100 pb-100"
         style="background: #f1f1f1;">

    <div class="container container-padding">

        <div class="row counter-section">

<div class="col-lg-12">
    <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-6">
    <div class="counter-box counter text-center h-100"
         data-aos="fade-up"
         data-aos-duration="400">

        <h4 class="div-title color-d5aa0f">
            {{ $about->experience_years }}
        </h4>

        <h5 class="p-content mb-0">
            Years Experience
        </h5>

    </div>
</div>

<div class="col-lg-3 col-md-6 col-6">
    <div class="counter-box counter text-center h-100"
         data-aos="fade-up"
         data-aos-duration="600">

        <h4 class="div-title color-d5aa0f">
            {{ $about->happy_buyers }}
        </h4>

        <h5 class="p-content mb-0">
            Happy Buyers
        </h5>

    </div>
</div>

<div class="col-lg-3 col-md-6 col-6">
    <div class="counter-box counter text-center h-100"
         data-aos="fade-up"
         data-aos-duration="800">

        <h4 class="div-title color-d5aa0f">
            {{ $about->happy_sellers }}
        </h4>

        <h5 class="p-content mb-0">
            Happy Sellers
        </h5>

    </div>
</div>

<div class="col-lg-3 col-md-6 col-6">
    <div class="counter-box counter text-center h-100"
         data-aos="fade-up"
         data-aos-duration="1000">

        <h4 class="div-title color-d5aa0f">
            {{ $about->market_presence }}
        </h4>

        <h5 class="p-content mb-0">
            Market Presence
        </h5>

    </div>
</div>
            </div>
        </div>
         </div>


        <div class="row mt-80">

            <div class="col-lg-4 col-md-12 col-12 mb-2"
                 data-aos="zoom-in"
                 data-aos-easing="linear"
                 data-aos-duration="500">

                <div class="about-mission">

                    <div class="hover-bg"></div>

                    <img src="{{ asset('public/assets/images/icons/mission.png') }}"
                         alt="mission">

                    <h4 class="div-sub-title weight-ExtraBold">
                        Our Mission
                    </h4>

                    <p class="mb-0">
                        {{ $about->mission }}
                    </p>

                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12 mb-2"
                 data-aos="zoom-in"
                 data-aos-easing="linear"
                 data-aos-duration="800">

                <div class="about-mission">

                    <div class="hover-bg"></div>

                    <img src="{{ asset('public/assets/images/icons/vision.png') }}"
                         alt="vision">

                    <h4 class="div-sub-title weight-ExtraBold">
                        Our Vision
                    </h4>

                    <p class="mb-0">
                        {{ $about->vision }}
                    </p>

                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12 mb-2"
                 data-aos="zoom-in"
                 data-aos-easing="linear"
                 data-aos-duration="1200">

                <div class="about-mission">

                    <div class="hover-bg"></div>

                    <img src="{{ asset('public/assets/images/icons/Strengths.png') }}"
                         alt="strengths">

                    <h4 class="div-sub-title weight-ExtraBold">
                        Our Strengths
                    </h4>
 <p>{{ $about->strength_1 }}</p>
 <p>{{ $about->strength_2 }}</p>
   <p>{{ $about->strength_3 }}</p>
                   
                </div>
            </div>

        </div>
    </div>
</section>
<style>
    <style>
    .text-justify{
        text-align: justify;
    }
</style>
  
@endsection