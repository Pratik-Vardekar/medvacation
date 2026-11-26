@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">Iraaya World Dashboard</h4>
            <p class="text-muted mb-0">Welcome back to the Iraaya World admin panel</p>
        </div>
        <ol class="breadcrumb m-0 py-0">
           
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

    <div class="alert alert-light border-0 shadow-sm d-flex align-items-center mb-4 rounded-4" role="alert">
        <i class="ti ti-bell fs-4 me-2 text-danger"></i>
        <div>
            <strong>New registrations</strong> from the website appear here automatically.
        </div>
        <a href="{{ route('admin.registrations.index') }}" class="ms-auto text-decoration-none fw-semibold" style="color:#cf2030;">
            View All
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="small text-uppercase fw-semibold opacity-75 mb-1">Total</p>
                    <h2 class="text-light fw-bold mb-1">{{ $totalRegistrations }}</h2>
                    <p class="mb-0 opacity-75">All Registrations</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card gold shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="small text-uppercase fw-semibold opacity-75 mb-1">Pending</p>
                    <h2 class=" text-light fw-bold mb-1">{{ $pendingPayments }}</h2>
                    <p class="mb-0 opacity-75">Payment Pending</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card green shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="small text-uppercase fw-semibold opacity-75 mb-1">Paid</p>
                    <h2 class=" text-light  fw-bold mb-1">{{ $paidRegistrations }}</h2>
                    <p class="mb-0 opacity-75">Confirmed Payments</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card iraaya-stat-card shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="small text-uppercase fw-semibold opacity-75 mb-1">Leads</p>
                    <h2 class=" text-light fw-bold mb-1">{{ $warmLeads }} / {{ $hotLeads }}</h2>
                    <p class="mb-0 opacity-75">Warm / Hot Leads</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 py-3 d-flex align-items-center">
            <h5 class="mb-0 fw-semibold">Recent Registrations</h5>
            <a href="{{ route('admin.registrations.index') }}" class="ms-auto small fw-semibold text-decoration-none" style="color:#cf2030;">
                Manage All
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
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
                                    <a href="{{ route('admin.registrations.edit', $registration) }}" class="btn btn-sm btn-iraaya-outline">
                                        Edit
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
