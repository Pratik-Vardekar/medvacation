<header class="app-topbar">
    <div class="container-fluid topbar-menu">
        <div class="d-flex align-items-center gap-2">
            <div class="logo-topbar">
                <a href="{{ route('dashboard') }}" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/light-new-logo.png') }}" alt="Med Vacation"
                            style="max-height:36px;" />
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('frontend/images/favicon.png') }}" alt="Med Vacation" />
                    </span>
                </a>
                <a href="{{ route('dashboard') }}" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/light-new-logo.png') }}" alt="Med Vacation"
                            style="max-height:36px;" />
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('frontend/images/favicon.png') }}" alt="Med Vacation" />
                    </span>
                </a>
            </div>

            <button class="sidenav-toggle-button btn btn-iraaya btn-icon"
                style="background-color: #0dcaf0 !important; border-color: #0dcaf0 !important;">
                <i class="ti ti-menu-4"></i>
            </button>
        </div>

        <div class="d-flex align-items-center gap-2">
            <div id="user-dropdown-detailed" class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" href="#!"
                        aria-haspopup="false" aria-expanded="false">

                        <img src="{{ asset('frontend/images/favicon.png') }}" width="32"
                            class="rounded-circle me-lg-2 d-flex" alt="user" />

                        <div class="d-lg-flex align-items-center gap-1 d-none">
                            <span>
                                <h5 class="my-0 lh-1 pro-username">
                                    {{ auth()->user()?->name ?? 'Administrator' }}
                                </h5>
                                <span class="fs-xs lh-1">
                                    {{ auth()->user()?->email ?? 'admin@medvacation.care' }}
                                </span>
                            </span>
                            <i class="ti ti-chevron-down align-middle"></i>
                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome back!</h6>
                        </div>

                        <div class="px-3 py-2">
                            <h6 class="mb-1">{{ auth()->user()?->name ?? 'Administrator' }}</h6>
                            <p class="mb-0 text-muted small">{{ auth()->user()?->email ?? 'admin@medvacation.care' }}
                            </p>
                        </div>

                        <div class="dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" class="dropdown-item fw-semibold text-danger"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ti ti-logout me-1 fs-lg align-middle"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
