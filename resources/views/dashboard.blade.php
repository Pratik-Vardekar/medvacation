@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <div
            class="page-title-head d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4">
            <div>
                <h4 class="fw-bold mb-1">Med Vacation Dashboard</h4>
                <p class="text-muted mb-0">Overview of patient enquiries and website content</p>
            </div>
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>

        <!-- Stat Cards -->
        <div class="row g-3 mb-4 mt-2">
            <!-- Total Patient Enquiries -->
            <div class="col-xl-3 col-md-6">
                <div class="card iraaya-stat-card h-60">
                    <a href="{{ route('admin.enquiries.contact') }}">
                        <div class="card-body p-4">
                            <div class="iraaya-stat-icon">
                                <i class="ti ti-mail"></i>
                            </div>
                            <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">Patient Enquiries</p>
                            <h2 class="fw-bold mb-1">{{ $totalEnquiries ?? 0 }}</h2>
                            <p class="mb-0 opacity-75">Total consultation requests</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- This Month Enquiries -->
            <div class="col-xl-3 col-md-6">
                <div class="card iraaya-stat-card gold h-60">
                    <a href="{{ route('admin.enquiries.contact') }}">
                        <div class="card-body p-4">
                            <div class="iraaya-stat-icon">
                                <i class="ti ti-calendar-month"></i>
                            </div>
                            <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">This Month</p>
                            <h2 class="fw-bold mb-1">{{ $thisMonthEnquiries ?? 0 }}</h2>
                            <p class="mb-0 opacity-75">{{ now()->format('F Y') }} requests</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="col-xl-3 col-md-6">
                <div class="card iraaya-stat-card green h-60">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <div class="card-body p-4">
                            <div class="iraaya-stat-icon">
                                <i class="ti ti-message-dots"></i>
                            </div>
                            <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">Testimonials</p>
                            <h2 class="fw-bold mb-1">{{ $totalTestimonials ?? 0 }}</h2>
                            <p class="mb-0 opacity-75">Published reviews</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Sliders / Banners -->
            <div class="col-xl-3 col-md-6">
                <div class="card iraaya-stat-card h-60">
                    <a href="{{ route('admin.slider.index') }}">
                        <div class="card-body p-4">
                            <div class="iraaya-stat-icon">
                                <i class="ti ti-photo"></i>
                            </div>
                            <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">Banners & Sliders</p>
                            <h2 class="fw-bold mb-1">{{ $totalSliders ?? 0 }}</h2>
                            <p class="mb-0 opacity-75">Homepage slides</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Patient Enquiries Table -->
        <div class="card border-0 shadow-sm rounded-4 admin-table-card mb-4">
            <div
                class="card-header bg-white border-0 py-3 d-flex flex-column flex-sm-row align-items-start align-items-sm-center admin-card-header">
                <div>
                    <h5 class="mb-0 fw-semibold">Recent Patient Enquiries</h5>
                    <small class="text-muted">Latest consultation requests submitted on the website</small>
                </div>
                <a href="{{ route('admin.enquiries.contact') }}" class="ms-sm-auto small fw-semibold text-decoration-none"
                    style="color:#036584;">
                    View All Enquiries →
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 admin-table">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Service / Treatment</th>
                                <th>Date</th>
                                <th width="80" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentEnquiries as $enquiry)
                                <tr>
                                    <td class="fw-semibold">{{ $enquiry->name ?? '—' }}</td>
                                    <td>{{ $enquiry->email ?? '—' }}</td>
                                    <td>{{ $enquiry->phone ?? '—' }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ $enquiry->country ?? '—' }}
                                        </span>
                                    </td>
                                    <td>{{ $enquiry->service ?? '—' }}</td>
                                    <td>{{ $enquiry->created_at?->format('d M Y, h:i A') ?? '—' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.enquiries.contact') }}"
                                            class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        <i class="ti ti-inbox fs-24 d-block mb-1 opacity-50"></i>
                                        No patient enquiries received yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if (!empty($recentRegistrations) && count($recentRegistrations) > 0)
            <!-- Recent Registrations (if any) -->
            <div class="card border-0 shadow-sm rounded-4 admin-table-card">
                <div
                    class="card-header bg-white border-0 py-3 d-flex flex-column flex-sm-row align-items-start align-items-sm-center admin-card-header">
                    <h5 class="mb-0 fw-semibold">Recent Registrations</h5>
                    <a href="{{ route('admin.registrations.index') }}"
                        class="ms-sm-auto small fw-semibold text-decoration-none" style="color:#036584;">
                        Manage All →
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 admin-table">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Business</th>
                                    <th>Circle</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentRegistrations as $registration)
                                    <tr>
                                        <td class="fw-semibold">
                                            {{ $registration->first_name ?? ($registration->name ?? '—') }}</td>
                                        <td>{{ $registration->email ?? '—' }}</td>
                                        <td>{{ $registration->phone ?? '—' }}</td>
                                        <td>{{ $registration->business_name ?: '—' }}</td>
                                        <td>{{ $registration->preferred_circle ?: '—' }}</td>
                                        <td>₹{{ number_format((int) ($registration->amount ?? 0)) }}</td>
                                        <td>{{ $registration->created_at?->format('d M Y') ?? '—' }}</td>
                                        <td>
                                            <a href="{{ route('admin.registrations.edit', $registration) }}"
                                                class="btn btn-sm btn-outline-secondary" title="View">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection
