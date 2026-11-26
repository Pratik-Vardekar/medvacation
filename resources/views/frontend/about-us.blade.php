@extends('layouts.app')

@section('title', !empty($about?->meta_title) ? $about->meta_title : 'About Us')

@section('content')

    <!-- =========================================================
                  ABOUT HERO / BREADCRUMB
                  ========================================================= -->

    <section class="breadcrumb-hero">
        <div class="breadcrumb-hero-bg"></div>

        <div class="container">
            <div class="breadcrumb-hero-content reveal-up">
                <h1> About Us </h1>

                <div class="about-breadcrumb">
                    <a href="{{ route('home') }}">Home</a>

                    <i class="fa-solid fa-chevron-right"></i>

                    <span>About Us</span>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
                  SECTION 1: ABOUT CONTENT
                  ========================================================= -->

    <section class="about-content-section">
        <div class="container">
            <div class="about-content-grid">
                <!-- IMAGE -->
                <div class="about-content-image reveal-left">
                    @php
                        $aboutImg = asset('frontend/images/about-pg.jpg');
                        if (!empty($about?->about_image)) {
                            $aboutImg = asset($about->about_image);
                        }
                    @endphp
                    <img src="{{ $aboutImg }}" alt="{{ $about?->about_subtitle ?? 'About MED VACATION' }}" />
                </div>

                <!-- CONTENT -->
                <div class="about-content-text reveal-right">
                    <span class="section-label"> {{ $about?->about_subtitle ?? 'ABOUT MED VACATION' }} </span>

                    <h2>
                        @if (!empty($about?->main_title))
                            {!! $about->main_title !!}
                        @else
                            Connecting the World to
                            <span>India's Healthcare Excellence.</span>
                        @endif
                    </h2>

                    @if (!empty($about?->about_description_1))
                        <p>{{ $about->about_description_1 }}</p>
                    @else
                        <p>
                            MED VACATION is a Medical Value Tourism company dedicated to
                            connecting international patients with India's exceptional
                            doctors, hospitals, and healthcare facilities.
                        </p>
                    @endif

                    @if (!empty($about?->about_description_2))
                        <p>{{ $about->about_description_2 }}</p>
                    @else
                        <p>
                            We combine India's medical expertise with global patient needs
                            to deliver world-class treatments at the most affordable prices,
                            while ensuring a seamless and personalized healthcare journey.
                        </p>
                    @endif

                    @if (!empty($about?->about_description_3))
                        <p>{{ $about->about_description_3 }}</p>
                    @else
                        <p>
                            From identifying the right medical specialists and healthcare
                            facilities to coordinating the patient's journey, our focus is
                            to make medical travel simple, reliable, and comfortable.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
                  SECTION 2: VISION & MISSION
                  ========================================================= -->

    <section class="vision-mission-section">
        <div class="container">
            <div class="vm-heading reveal-up">
                <span class="section-label"> {{ $about?->purpose_subtitle ?? 'OUR PURPOSE' }} </span>

                <h2>
                    @if (!empty($about?->purpose_title))
                        {!! $about->purpose_title !!}
                    @else
                        Vision & <span>Mission</span>
                    @endif
                </h2>
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

                        @if (!empty($about?->vision))
                            @foreach (array_filter(explode("\n", str_replace("\r", '', $about->vision))) as $vPara)
                                <p>{{ trim($vPara) }}</p>
                            @endforeach
                        @else
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
                        @endif
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

                        @if (!empty($about?->mission))
                            @php
                                $lines = array_filter(explode("\n", str_replace("\r", '', $about->mission)));
                                $hasBullets = false;
                                foreach ($lines as $line) {
                                    $t = trim($line);
                                    if (
                                        str_starts_with($t, '•') ||
                                        str_starts_with($t, '-') ||
                                        str_starts_with($t, '*')
                                    ) {
                                        $hasBullets = true;
                                        break;
                                    }
                                }
                            @endphp

                            @if ($hasBullets)
                                <ul>
                                    @foreach ($lines as $line)
                                        @php $trimmed = ltrim(trim($line), "•-* \t"); @endphp
                                        @if (!empty($trimmed))
                                            <li>{{ $trimmed }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                @foreach ($lines as $mPara)
                                    <p>{{ trim($mPara) }}</p>
                                @endforeach
                            @endif
                        @else
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================
                  SECTION 3: MEET OUR FOUNDERS / LEADERSHIP
                  ========================================================= -->

    <section class="founders-section">
        <div class="container">
            <div class="founders-heading reveal-up">
                <span class="section-label"> {{ $about?->founders_subtitle ?? 'OUR LEADERSHIP' }} </span>

                <h2>
                    @if (!empty($about?->founders_title))
                        {!! $about->founders_title !!}
                    @else
                        Meet Our
                        <span>Founders</span>
                    @endif
                </h2>

                <p>
                    {{ $about?->founders_description ?? 'Meet the experienced professionals driving MED VACATION towards a more connected and patient-focused healthcare experience.' }}
                </p>
            </div>

            <div class="founders-grid">
                @if (isset($about) && $about->founders && $about->founders->count() > 0)
                    @foreach ($about->founders as $index => $founder)
                        @php
                            $fImg = asset('frontend/images/profile/user.jpg');
                            if (!empty($founder->image)) {
                                $fImg = asset($founder->image);
                            }
                            $delayClass = $index % 4 > 0 ? 'reveal-delay-' . $index % 4 : '';
                        @endphp
                        <article class="founder-card reveal-up {{ $delayClass }}">
                            <div class="founder-image">
                                <img src="{{ $fImg }}" alt="{{ $founder->name }}" />
                            </div>

                            <div class="founder-content">
                                <h3>{{ $founder->name }}</h3>
                                <span>{{ $founder->designation }}</span>
                            </div>
                        </article>
                    @endforeach
                @else
                    <!-- Default Initial Leadership Team -->
                    <article class="founder-card reveal-up">
                        <div class="founder-image">
                            <img src="{{ asset('frontend/images/profile/swati.webp') }}" alt="Swati Lodha" />
                        </div>

                        <div class="founder-content">
                            <h3>Swati Lodha</h3>
                            <span>Vice President</span>
                        </div>
                    </article>

                    <article class="founder-card reveal-up reveal-delay-1">
                        <div class="founder-image">
                            <img src="{{ asset('frontend/images/profile/anita.webp') }}" alt="Anita Bajaj" />
                        </div>

                        <div class="founder-content">
                            <h3>Anita Bajaj</h3>
                            <span>Chief Coordinator Global Sales</span>
                        </div>
                    </article>

                    <article class="founder-card reveal-up reveal-delay-2">
                        <div class="founder-image">
                            <img src="{{ asset('frontend/images/profile/ramanand.webp') }}" alt="Dr. Ramanand Yadaw" />
                        </div>

                        <div class="founder-content">
                            <h3>Dr. Ramanand Yadaw</h3>
                            <span> Chief Medical Strategy and Alliance Officer </span>
                        </div>
                    </article>

                    <article class="founder-card reveal-up reveal-delay-3">
                        <div class="founder-image">
                            <img src="{{ asset('frontend/images/profile/user.jpg') }}" alt="Deepak Singhania" />
                        </div>

                        <div class="founder-content">
                            <h3>Deepak Singhania</h3>
                            <span> CFO / Chief Financial Officer </span>
                        </div>
                    </article>

                    <article class="founder-card reveal-up reveal-delay-1">
                        <div class="founder-image">
                            <img src="{{ asset('frontend/images/profile/mahip.webp') }}" alt="Mahip Agarwal" />
                        </div>

                        <div class="founder-content">
                            <h3>Mahip Agarwal</h3>
                            <span> Travel Agent - International </span>
                        </div>
                    </article>
                @endif
            </div>
        </div>
    </section>

@endsection
