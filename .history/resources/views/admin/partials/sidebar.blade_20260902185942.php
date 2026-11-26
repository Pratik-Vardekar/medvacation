 <div class="sidenav-menu">
    <a href="{{ route('dashboard') }}" class="logo iraaya-sidebar-logo">
        <img src="{{ asset('frontend/images/light-new-logo.png') }}" alt="Iraaya World" class="iraaya-sidebar-logo-img">
    </a>

    <button class="button-close-offcanvas">
        <i class="ti ti-menu-4 align-middle"></i>
    </button>

    <div class="scrollbar" data-simplebar="">
        <div id="user-profile-settings" class="sidenav-user iraaya-sidenav-user">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('dashboard') }}" class="link-reset">
                        <img src="{{ asset('frontend/images/favicon.png') }}" alt="user" class="rounded-circle mb-2 avatar-md" />
                        <span class="sidenav-user-name fw-bold">{{ auth()->user()->name }}</span>
                        <span class="fs-12 fw-semibold">Administrator</span>
                    </a>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" class="link-reset sidenav-user-set-icon"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           title="Logout">
                            <i class="ti ti-logout fs-24 align-middle"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>

        <div id="sidenav-menu">
            <ul class="side-nav">
                <li class="side-nav-title mt-2">Overview</li>

                <li class="side-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li class="side-nav-title">Membership</li>

                <li class="side-nav-item {{ request()->routeIs('admin.registrations.*') && !request()->filled('payment_status') ? 'active' : '' }}">
                    <a href="{{ route('admin.registrations.index') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-users"></i></span>
                        <span class="menu-text">All Registrations</span>
                    </a>
                </li>

                <li class="side-nav-item {{ request('payment_status') === 'paid' ? 'active' : '' }}">
                    <a href="{{ route('admin.registrations.index', ['payment_status' => 'paid']) }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-circle-check"></i></span>
                        <span class="menu-text">Paid Members</span>
                    </a>
                </li>

                <li class="side-nav-item {{ request('payment_status') === 'pending' ? 'active' : '' }}">
                    <a href="{{ route('admin.registrations.index', ['payment_status' => 'pending']) }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-clock-hour-4"></i></span>
                        <span class="menu-text">Pending Payments</span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="{{ route('admin.registrations.export') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-download"></i></span>
                        <span class="menu-text">Export CSV</span>
                    </a>
                </li>

                <li class="side-nav-title">Quick links</li>

                <li class="side-nav-item">
                    <a href="{{ route('home') }}" target="_blank" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-world"></i></span>
                        <span class="menu-text">View Website</span>
                    </a>
                </li>

                {{-- <li class="side-nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-user-circle"></i></span>
                        <span class="menu-text">My Profile</span>
                    </a>
                </li> --}}
            </ul>
        </div>

        <div class="iraaya-sidebar-note">
            <span>Iraaya World Admin</span>
            <small>Membership &amp; payments</small>
        </div>
    </div>
</div>
