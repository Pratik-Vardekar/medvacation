 <header class="main-header g_header">
    <div class="offcanvas-menu">
      <div class="main-menu">
        <div class="container d-flex align-items-center">
          <div class="mobile-menu d-flex justify-content-between align-items-center">
            <div class="logo-img">
              <a href="{{ route('home') }}"><img src="{{asset('assets/images/logo.png')}}" class="main-logo" alt="logo" /></a>
            </div>
            <div class="mobile-offcanvas d-flex align-items-center">
              <a class="offcanvas-close" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"   aria-controls="offcanvasExample"><span class="toggle-img"></span></a>
            </div>
          </div>
          <div class="offcanvas offcanvas-start menu-right" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <a class="navbar" href="index.html"><img src="{{asset('assets/images/logo.png')}}" class="img" alt="logo"></a>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div class="main-nav">
                <nav class="navbar navbar-expand-lg">
                  <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('about') }}">About Us</a>
    </li>            

    <li class="nav-item">
        <a class="nav-link" href="{{ route('sale') }}">For Sale</a>
    </li>            

    <li class="nav-item">
        <a class="nav-link" href="{{ route('buy') }}">Buy</a>
    </li>            

    <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
    </li>

    <li class="header-contact">
        <a href="#" class="consult-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span>Get a Free Appraisal</span>
            <span class="arrow">
                <img src="{{ asset('assets/images/icons/btn-arrow.png') }}" class="img" alt="btn arrow">
            </span>
        </a>
    </li>
</ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>