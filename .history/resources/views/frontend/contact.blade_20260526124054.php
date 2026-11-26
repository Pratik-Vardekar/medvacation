{{-- CONTACT PAGE --}}

@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section class="banner-section inner-page-banner position-relative">
    
    <div class="banner-right-img">
        <img src="{{asset('public/assets/images/banner/contact.jpg')}}" class="img" alt="banner-img">
    </div>

    <section class="hero-section">

        <div class="container">

            <div class="row align-items-end">

                <div class="col-md-12 col-12">

                    <div class="hero-overlay">

                        <h1 class="title"
                            data-aos="fade-up"
                            data-aos-easing="linear"
                            data-aos-duration="400">

                            Contact
                            <span class="color-5d4037">Us</span>

                        </h1>

                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">
                                        Home
                                    </a>
                                </li>

                                <li class="breadcrumb-item active"
                                    aria-current="page">

                                    Contact Us

                                </li>

                            </ol>

                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </section>

</section>

<section class="contact-section contact-bg position-relative pt-80 pb-80"
         style="background: #f2f8ff8c;">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-12 col-12">

                <div class="contact-box">

                    <div class="contact-box-border d-flex gap-3"
                         data-aos="fade-up"
                         data-aos-easing="linear"
                         data-aos-duration="800">

                        <div class="info-icon">
                            <img src="{{asset('public/assets/images/icons/call.svg')}}" alt="call">
                        </div>

                        <div class="contact-box-right">

                            <div class="contact-box-text">

                                <h4 class="div-text">
                                    Phone Number
                                </h4>

                                <a href="tel:{{ $contact->phone }}">
                                    {{ $contact->phone }}
                                </a>

                            </div>

                        </div>

                    </div>

                    <div class="contact-box-border d-flex gap-3"
                         data-aos="fade-up"
                         data-aos-easing="linear"
                         data-aos-duration="1000">

                        <div class="info-icon">

                            <img src="{{asset('public/assets/images/icons/mail.svg')}}"
                                 alt="email">

                        </div>

                        <div class="contact-box-text contact-box-right">

                            <h4 class="div-text">
                                Email Address
                            </h4>

                            <a href="mailto:{{ $contact->email }}">
                                {{ $contact->email }}
                            </a>

                            <a href="mailto:{{ $contact->secondary_email }}">
                                {{ $contact->secondary_email }}
                            </a>

                        </div>

                    </div>

                    <div class="contact-box-border d-flex gap-3"
                         data-aos="fade-up"
                         data-aos-easing="linear"
                         data-aos-duration="1200">

                        <div class="info-icon">

                            <img src="{{asset('public/assets/images/icons/location.svg')}}"
                                 alt="location pin">

                        </div>

                        <div class="contact-box-text contact-box-right">

                            <h4 class="div-text">
                                Visit our office
                            </h4>

                            <h5 class="section-title">
                                Tarkash Real Estate
                            </h5>

                            <a href="#">
                                {{ $contact->address }}
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-5 col-md-12 col-12">

                <div class="contact-form">

                    <div class="row">

                        <div class="col-12"
                             data-aos="fade-up"
                             data-aos-easing="linear"
                             data-aos-duration="400">

                            <h3 class="div-text">
                                Let’s keep in touch
                            </h3>

                            <p>
                                Our team is ready to help you with all your property needs.
                            </p>

                        </div>

                    </div>

                    <hr>

               <form action="{{ route('contact.submit') }}"
      method="POST"
      data-aos="fade-up"
      data-aos-easing="linear"
      data-aos-duration="400">

    @csrf

    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <input type="hidden"
           name="form_type"
           value="contact_page">

    <div class="row">

        {{-- Name --}}
        <div class="col-md-6 mb-3">

            <div class="form-group">

                <label for="name" class="form-label">
                    Name
                </label>

                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       placeholder="Your Name"
                       value="{{ old('name') }}"
                       autocomplete="name"
                       required>

                @error('name')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                @enderror

            </div>

        </div>

        {{-- Email --}}
        <div class="col-md-6 mb-3">

            <div class="form-group">

                <label for="email" class="form-label">
                    Email
                </label>

                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       placeholder="Your Email"
                       value="{{ old('email') }}"
                       autocomplete="email"
                       required>

                @error('email')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                @enderror

            </div>

        </div>

    </div>

    {{-- Phone --}}
    <div class="mb-3">

        <div class="form-group">

            <label for="phone" class="form-label">
                Contact No.
            </label>

            <input type="tel"
                   class="form-control"
                   id="phone"
                   name="phone"
                   placeholder="Contact No."                  
                   value="{{ old('phone') }}"
                   autocomplete="tel"
                   required>

            @error('phone')

                <small class="text-danger">
                    {{ $message }}
                </small>

            @enderror

        </div>

    </div>

    {{-- Message --}}
    <div class="mb-3">

        <div class="form-group">

            <label for="message" class="form-label">
                Message
            </label>

            <textarea class="form-control"
                      id="message"
                      name="message"
                      rows="5"
                      placeholder="Message"
                      required>{{ old('message') }}</textarea>

            @error('message')

                <small class="text-danger">
                    {{ $message }}
                </small>

            @enderror

        </div>

    </div>

    {{-- Submit --}}
    <button type="submit"
            class="consult-btn"
            onclick="this.disabled=true; this.form.submit();">

        <span>Submit</span>

        <span class="arrow">

            <img src="{{asset('public/assets/images/icons/btn-arrow.png')}}"
                 class="img"
                 alt="btn arrow">

        </span>

    </button>

</form>

                </div>

            </div>

            <div class="col-lg-12 col-md-12 col-12 iframe-section">

                <iframe loading="lazy"
                        src="{{ $contact->map_url }}"
                        title="{{ $contact->address }}"
                        aria-label="{{ $contact->address }}">
                </iframe>

            </div>

        </div>

    </div>

</section>

@endsection