 <div class="sidenav-menu">
     <a href="{{ route('dashboard') }}" class="logo iraaya-sidebar-logo">
         <img src="{{ asset('admin/assets/images/favicon.png') }}" alt="MedVacation" class="iraaya-sidebar-logo-img">
     </a>

     <button class="button-close-offcanvas">
         <i class="ti ti-menu-4 align-middle"></i>
     </button>

     <div class="scrollbar" data-simplebar="">
         <div id="user-profile-settings" class="sidenav-user iraaya-sidenav-user">
             <div class="d-flex justify-content-between align-items-center">
                 <div>
                     <a href="{{ route('dashboard') }}" class="link-reset">
                         <img src="{{ asset('frontend/images/favicon.png') }}" alt="user"
                             class="rounded-circle mb-2 avatar-md" />
                         <span class="sidenav-user-name fw-bold">{{ auth()->user()?->name ?? 'Administrator' }}</span>
                         <span class="fs-12 fw-semibold">Administrator</span>
                     </a>
                 </div>
                 <div>
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <a href="#" class="link-reset sidenav-user-set-icon"
                             onclick="event.preventDefault(); this.closest('form').submit();" title="Logout">
                             <i class="ti ti-logout fs-24 align-middle"></i>
                         </a>
                     </form>
                 </div>
             </div>
         </div>

         <div id="sidenav-menu">
             <ul class="side-nav">
                 <li class="side-nav-title">Overview</li>

                 <li class="side-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                     <a href="{{ route('dashboard') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                         <span class="menu-text">Dashboard</span>
                     </a>
                 </li>

                 <li class="side-nav-title">Leads & Enquiries</li>

                 <li class="side-nav-item {{ request()->routeIs('admin.enquiries.contact') ? 'active' : '' }}">
                     <a href="{{ route('admin.enquiries.contact') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-mail"></i></span>
                         <span class="menu-text">Contact Enquiries</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request()->routeIs('admin.enquiries.index') ? 'active' : '' }}">
                     <a href="{{ route('admin.enquiries.index') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-inbox"></i></span>
                         <span class="menu-text">All Enquiries</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request()->routeIs('admin.newsletters.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.newsletters.index') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-news"></i></span>
                         <span class="menu-text">Newsletter Subscribers</span>
                     </a>
                 </li>

                 <li class="side-nav-title">Website Content</li>

                 <li class="side-nav-item {{ request()->routeIs('admin.slider.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.slider.index') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-photo"></i></span>
                         <span class="menu-text">Sliders / Banners</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.testimonials.index') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-message-dots"></i></span>
                         <span class="menu-text">Testimonials</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.features.index') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-layout-grid"></i></span>
                         <span class="menu-text">Features & Services</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.about.edit') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-info-circle"></i></span>
                         <span class="menu-text">About Us Page</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request()->routeIs('admin.contact-details.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.contact-details.edit') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-address-book"></i></span>
                         <span class="menu-text">Contact Details</span>
                     </a>
                 </li>

                 <li class="side-nav-title">Registrations</li>

                 <li
                     class="side-nav-item {{ request()->routeIs('admin.registrations.*') && !request()->filled('payment_status') ? 'active' : '' }}">
                     <a href="{{ route('admin.registrations.index') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-users"></i></span>
                         <span class="menu-text">All Registrations</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request('payment_status') === 'paid' ? 'active' : '' }}">
                     <a href="{{ route('admin.registrations.index', ['payment_status' => 'paid']) }}"
                         class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-circle-check"></i></span>
                         <span class="menu-text">Paid Members</span>
                     </a>
                 </li>

                 <li class="side-nav-item {{ request('payment_status') === 'pending' ? 'active' : '' }}">
                     <a href="{{ route('admin.registrations.index', ['payment_status' => 'pending']) }}"
                         class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-clock-hour-4"></i></span>
                         <span class="menu-text">Pending Payments</span>
                     </a>
                 </li>

                 <li class="side-nav-item">
                     <a href="{{ route('admin.registrations.export') }}" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-download"></i></span>
                         <span class="menu-text">Export Excel</span>
                     </a>
                 </li>

                 <li class="side-nav-title">Quick links</li>

                 <li class="side-nav-item">
                     <a href="{{ route('home') }}" target="_blank" class="side-nav-link">
                         <span class="menu-icon"><i class="ti ti-world"></i></span>
                         <span class="menu-text">View Website</span>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </div>
