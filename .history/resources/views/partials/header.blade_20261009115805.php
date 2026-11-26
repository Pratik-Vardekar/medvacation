 <!-- =========================================
     HEADER
========================================= -->
<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <div class="header-logo">
                <a href="index.html">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="Med Vacation" />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="main-navigation">
                <ul class="nav-menu list-unstyled d-flex align-items-center mb-0">
                    <li class="nav-item active">
                        <a href="index.html" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="about-us.html" class="nav-link">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="services.html" class="nav-link">Services</a>
                    </li>

                    <li class="nav-item">
                        <a href="affiliations.html" class="nav-link">
                            Affiliations &amp; Accreditation
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions d-flex align-items-center">
                <!-- Phone -->
                <a href="tel:+917208605067" class="header-phone">
                    <i class="fa-solid fa-phone"></i>

                    <span>+91 7208605067</span>
                </a>

                <!-- Consultation -->
                <a href="contact-us.html" class="consultation-btn">
                    <span>Get Free Consultation</span>

                    <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                </a>

                <!-- Side Panel Button -->
                <button type="button" class="side-menu-toggle" aria-label="Open menu" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>

                    <span></span>
                    <span></span>
                    <span></span>

                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    <!-- =========================================
     SIDE MENU OVERLAY
========================================== -->

    <div class="side-menu-overlay"></div>

    <!-- =========================================
     RIGHT SIDE MENU
========================================== -->

    <aside class="side-menu">
        <div class="side-menu-inner">
            <!-- Side Menu Header -->

            <div class="side-menu-header">
                <a href="#" class="side-menu-logo">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="Med Vacation" />
                </a>

                <button type="button" class="side-menu-close" aria-label="Close menu">
                    <span></span>
                    <span></span>
                </button>
            </div>

            <!-- Side Menu Content -->

            <div class="side-menu-content">
                <span class="side-menu-label"> NAVIGATION </span>

                <nav class="side-menu-nav">
                    <a href="index.html" class="side-menu-link active">
                        <span>Home</span>

                        <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                    </a>

                    <a href="about-us.html" class="side-menu-link">
                        <span>About Us</span>

                        <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                    </a>

                    <a href="services.html" class="side-menu-link">
                        <span>Services</span>

                        <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                    </a>

                    <a href="affiliations.html" class="side-menu-link">
                        <span> Affiliations &amp; Accreditation </span>

                        <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                    </a>
                </nav>

                <!-- Side Menu Contact -->

                <div class="side-menu-contact">
                    <span class="side-menu-label"> GET IN TOUCH </span>

                    <a href="tel:+917208605067" class="side-phone">
                        <span class="side-phone-icon">
                            <i class="fa-solid fa-phone"></i>
                        </span>

                        <span> +91 7208605067 </span>
                    </a>

                    <a href="contact-us.html" class="side-consultation-btn">
                        <span> Get Free Consultation </span>

                        <img src="{{ asset('frontend/images/icons/arrow.png') }}" alt="" />
                    </a>
                </div>
            </div>

            <!-- Side Menu Footer -->

            <div class="side-menu-footer">
                <p>
                    Your trusted medical tourism partner for better healthcare abroad.
                </p>
            </div>
        </div>
    </aside>
</header>