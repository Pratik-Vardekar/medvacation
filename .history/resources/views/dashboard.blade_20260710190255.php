@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="page-title-head d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">Iraaya World Dashboard</h4>
            <p class="text-muted mb-0">Welcome back to the Iraaya World admin panel</p>
        </div>
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

   

    <div class="row g-3 mb-4 mt-2">
        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card h-60">
                <a href="{{ route('admin.registrations.index') }}">
                    <div class="card-body p-4">
                        <div class="iraaya-stat-icon">
                            <i class="ti ti-users"></i>
                        </div>
                        <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">Total</p>
                        <h2 class="fw-bold mb-1">{{ $totalRegistrations }}</h2>
                        <p class="mb-0 opacity-75">All Registrations</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card gold h-60">
                <a href="{{ route('admin.registrations.index', ['payment_status' => 'pending']) }}">
                    <div class="card-body p-4">
                        <div class="iraaya-stat-icon">
                            <i class="ti ti-clock-hour-4"></i>
                        </div>
                        <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">Pending</p>
                        <h2 class="fw-bold mb-1">{{ $pendingPayments }}</h2>
                        <p class="mb-0 opacity-75">Payment Pending</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card green h-60">
                <a href="{{ route('admin.registrations.index', ['payment_status' => 'paid']) }}">
                    <div class="card-body p-4">
                        <div class="iraaya-stat-icon">
                            <i class="ti ti-circle-check"></i>
                        </div>
                        <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">Paid</p>
                        <h2 class="fw-bold mb-1">{{ $paidRegistrations }}</h2>
                        <p class="mb-0 opacity-75">Confirmed Payments</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card h-60">
                <a href="{{ route('admin.registrations.index') }}">
                    <div class="card-body p-4">
                        <div class="iraaya-stat-icon">
                            <i class="ti ti-flame"></i>
                        </div>
                        <p class="small text-uppercase fw-semibold stat-label mb-1 opacity-75">Leads</p>
                        <h2 class="fw-bold mb-1">{{ $warmLeads }} <span class="fs-5 opacity-75">/</span> {{ $hotLeads }}</h2>
                        <p class="mb-0 opacity-75">Warm / Hot Leads</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 admin-table-card">
        <div class="card-header bg-white border-0 py-3 d-flex flex-column flex-sm-row align-items-start align-items-sm-center admin-card-header">
            <h5 class="mb-0 fw-semibold">Recent Registrations</h5>
            <a href="{{ route('admin.registrations.index') }}" class="ms-sm-auto small fw-semibold text-decoration-none" style="color:#cf2030;">
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
                            <th>Payment</th>
                            <th>Lead Type</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentRegistrations as $registration)
                            <tr>
                                <td class="fw-semibold">{{ $registration->first_name }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->phone }}</td>
                                <td>
                                    @if($registration->payment_status === 'paid')
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ ucfirst($registration->payment_status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $registration->lead_type === 'hot' ? 'iraaya-badge-hot' : 'iraaya-badge-warm' }}">
                                        {{ ucfirst($registration->lead_type) }}
                                    </span>
                                </td>
                                <td>{{ $registration->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.registrations.edit', $registration) }}" class="btn btn-sm btn-iraaya-outline btn-admin-icon" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No registrations yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
