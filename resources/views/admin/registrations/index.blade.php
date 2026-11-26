@extends('layouts.admin')

@section('title', 'Registrations')

@section('content')
<style>
    .admin-table-card {
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .admin-table-card .admin-card-header,
    .admin-table-card .admin-pagination {
        flex-shrink: 0;
    }

    .admin-table-card .card-body {
        display: flex;
        flex-direction: column;
        padding-bottom: 16px;
        min-height: 0;
    }

    .admin-table-card .table-responsive {
        overflow: auto;
        max-height: calc(100dvh - 280px);
        min-height: 240px;
        overscroll-behavior: contain;
    }

    .admin-table-card .admin-table {
        margin-bottom: 0;
        min-width: 1680px;
    }

    .admin-table-card .admin-table thead th {
        position: sticky;
        top: 0;
        z-index: 2;
        background: #f8f9fa;
        white-space: nowrap;
    }

    .admin-table-card .admin-table tbody td {
        white-space: nowrap;
    }

    @media (max-width: 767.98px) {
        .admin-table-card .table-responsive {
            max-height: calc(100dvh - 220px);
        }
    }
</style>
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="page-title-head d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1">Registration Records</h4>
            <p class="text-muted mb-0">
                Search, filter, sort and export membership registrations
            </p>
        </div>

        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Registrations</li>
        </ol>
    </div>


    {{-- Filters --}}
    <div class="card border-0 shadow-sm rounded-4 mb-3">
        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.registrations.index') }}"
                  class="admin-filter-form">

                <div class="row g-3">

                    {{-- Search --}}
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label fw-semibold small">
                            Search
                        </label>

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Name, email, phone, business..."
                               value="{{ request('search') }}">
                    </div>


                    {{-- Month --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Month
                        </label>

                        <input type="month"
                               name="month"
                               class="form-control"
                               value="{{ request('month') }}">
                    </div>


                    {{-- From Date --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            From Date
                        </label>

                        <input type="date"
                               name="date_from"
                               class="form-control"
                               value="{{ request('date_from') }}">
                    </div>


                    {{-- To Date --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            To Date
                        </label>

                        <input type="date"
                               name="date_to"
                               class="form-control"
                               value="{{ request('date_to') }}">
                    </div>


                    {{-- Payment Status --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Payment Status
                        </label>

                        <select name="payment_status"
                                class="form-select">

                            <option value="">All</option>

                            <option value="pending"
                                @selected(request('payment_status') === 'pending')}>
                                Pending
                            </option>

                            <option value="paid"
                                @selected(request('payment_status') === 'paid')}>
                                Paid
                            </option>

                            <option value="failed"
                                @selected(request('payment_status') === 'failed')}>
                                Failed
                            </option>

                            <option value="refunded"
                                @selected(request('payment_status') === 'refunded')}>
                                Refunded
                            </option>

                        </select>
                    </div>


                    {{-- Lead Type --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Lead Type
                        </label>

                        <select name="lead_type"
                                class="form-select">

                            <option value="">All</option>

                            <option value="warm"
                                @selected(request('lead_type') === 'warm')}>
                                Warm
                            </option>

                            <option value="hot"
                                @selected(request('lead_type') === 'hot')}>
                                Hot
                            </option>

                            <option value="cold"
                                @selected(request('lead_type') === 'cold')}>
                                Cold
                            </option>

                        </select>
                    </div>


                    {{-- Sort By --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Sort By
                        </label>

                        <select name="sort_by"
                                class="form-select">

                            <option value="created_at"
                                @selected(request('sort_by', 'created_at') === 'created_at')}>
                                Date
                            </option>

                            <option value="first_name"
                                @selected(request('sort_by') === 'first_name')}>
                                Name
                            </option>

                            <option value="payment_status"
                                @selected(request('sort_by') === 'payment_status')}>
                                Payment
                            </option>

                            <option value="lead_type"
                                @selected(request('sort_by') === 'lead_type')}>
                                Lead Type
                            </option>

                            <option value="rating"
                                @selected(request('sort_by') === 'rating')}>
                                Rating
                            </option>

                        </select>
                    </div>


                    {{-- Sort Direction --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Order
                        </label>

                        <select name="sort_dir"
                                class="form-select">

                            <option value="desc"
                                @selected(request('sort_dir', 'desc') === 'desc')}>
                                Newest First
                            </option>

                            <option value="asc"
                                @selected(request('sort_dir') === 'asc')}>
                                Oldest First
                            </option>

                        </select>
                    </div>


                    {{-- UTM Source --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            UTM Source
                        </label>

                        <select name="utm_source"
                                class="form-select">

                            <option value="">
                                All Sources
                            </option>

                            @foreach($utmSources as $source)

                                <option value="{{ $source }}"
                                    @selected(request('utm_source') === $source)>
                                    {{ $source }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- UTM Medium --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            UTM Medium
                        </label>

                        <select name="utm_medium"
                                class="form-select">

                            <option value="">
                                All Mediums
                            </option>

                            @foreach($utmMediums as $medium)

                                <option value="{{ $medium }}"
                                    @selected(request('utm_medium') === $medium)>
                                    {{ $medium }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- UTM Campaign --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            UTM Campaign
                        </label>

                        <select name="utm_campaign"
                                class="form-select">

                            <option value="">
                                All Campaigns
                            </option>

                            @foreach($utmCampaigns as $campaign)

                                <option value="{{ $campaign }}"
                                    @selected(request('utm_campaign') === $campaign)>
                                    {{ $campaign }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Campaign ID --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Campaign ID
                        </label>

                        <input type="text"
                               name="campaign_id"
                               class="form-control"
                               placeholder="Campaign ID"
                               value="{{ request('campaign_id') }}">
                    </div>


                    {{-- Ad Set ID --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Ad Set ID
                        </label>

                        <input type="text"
                               name="adset_id"
                               class="form-control"
                               placeholder="Ad Set ID"
                               value="{{ request('adset_id') }}">
                    </div>


                    {{-- Ad ID --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Ad ID
                        </label>

                        <input type="text"
                               name="ad_id"
                               class="form-control"
                               placeholder="Ad ID"
                               value="{{ request('ad_id') }}">
                    </div>


                    {{-- Placement --}}
                    <div class="col-lg-2 col-md-6">
                        <label class="form-label fw-semibold small">
                            Placement
                        </label>

                        <select name="placement"
                                class="form-select">

                            <option value="">
                                All Placements
                            </option>

                            @foreach($placements as $placement)

                                <option value="{{ $placement }}"
                                    @selected(request('placement') === $placement)>
                                    {{ $placement }}
                                </option>

                            @endforeach

                        </select>
                    </div>
                    {{-- Rating --}}
<div class="col-lg-2 col-md-6">
    <label class="form-label fw-semibold small">
        Rating
    </label>

    <select name="rating"
            class="form-select">

        <option value="">
            All Ratings
        </option>

        @for($i = 1; $i <= 10; $i++)

            <option value="{{ $i }}"
                @selected(request('rating') == $i)>
                {{ $i }} / 10
            </option>

        @endfor

    </select>
</div>


                    {{-- Actions --}}
                    <div class="col-12">

                        <div class="d-flex flex-wrap gap-2 admin-filter-actions">

                            <button type="submit"
                                    class="btn btn-iraaya">

                                <i class="ti ti-filter me-1"></i>
                                Apply Filters

                            </button>


                            <a href="{{ route('admin.registrations.index') }}"
                               class="btn btn-light">

                                Reset

                            </a>


                            <a href="{{ route('admin.registrations.export', request()->query()) }}"
                               class="btn btn-iraaya-outline">

                                <i class="ti ti-download me-1"></i>
                                Export CSV

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>



    {{-- Registration Table --}}
    <div class="card border-0 shadow-sm rounded-4 admin-table-card">

        <div class="card-header bg-white border-0 py-3 d-flex flex-column flex-sm-row align-items-start align-items-sm-center admin-card-header">

            <h5 class="mb-0 fw-semibold">
                All Registrations
            </h5>

            <span class="ms-sm-auto small text-muted">
                {{ $registrations->total() }} record(s) found
            </span>

        </div>


        <div class="card-body">

            <div class="table-responsive admin-table-scroll">

                <table class="table table-hover align-middle admin-table">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Phone</th>

                            <th>Location</th>

                            <th>Business</th>

                            <th>Rating</th>

                            <th>Payment Status</th>

                            <th>Lead Type</th>

                            {{-- Meta Ads --}}
                            <th>UTM Source</th>

                            <th>UTM Medium</th>

                            <th>UTM Campaign</th>

                            <th>UTM Content</th>

                            <th>UTM Term</th>

                            <th>Campaign ID</th>

                            <th>Ad Set ID</th>

                            <th>Ad ID</th>

                            <th>Placement</th>

                            <th>Date</th>

                            <th class="text-center">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($registrations as $registration)

                            <tr>

                                {{-- Number --}}
                                <td>
                                    {{ $registrations->firstItem() + $loop->index }}
                                </td>


                                {{-- Name --}}
                                <td class="fw-semibold">
                                    {{ $registration->first_name }}
                                </td>


                                {{-- Email --}}
                                <td>
                                    {{ $registration->email }}
                                </td>


                                {{-- Phone --}}
                                <td>
                                    {{ $registration->phone }}
                                </td>


                                {{-- Location --}}
                                <td>
                                    {{ $registration->location }}
                                </td>


                                {{-- Business --}}
                                <td>
                                    {{ $registration->business_name }}
                                </td>


                                {{-- Rating --}}
                                <td>
                                    {{ $registration->rating }}/10
                                </td>


                                {{-- Payment Status --}}
                                <td>

                                    @if($registration->payment_status === 'paid')

                                        <span class="badge bg-success">
                                            Paid
                                        </span>

                                    @elseif($registration->payment_status === 'failed')

                                        <span class="badge bg-danger">
                                            Failed
                                        </span>

                                    @elseif($registration->payment_status === 'refunded')

                                        <span class="badge bg-secondary">
                                            Refunded
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @endif

                                </td>


                                {{-- Lead Type --}}
                                <td>

                                    @if($registration->lead_type === 'hot')

                                        <span class="badge iraaya-badge-hot">
                                            Hot
                                        </span>

                                    @elseif($registration->lead_type === 'cold')

                                        <span class="badge bg-secondary">
                                            Cold
                                        </span>

                                    @else

                                        <span class="badge iraaya-badge-warm">
                                            Warm
                                        </span>

                                    @endif

                                </td>


                                {{-- UTM Source --}}
                                <td>
                                    {{ $registration->utm_source ?: '—' }}
                                </td>


                                {{-- UTM Medium --}}
                                <td>
                                    {{ $registration->utm_medium ?: '—' }}
                                </td>


                                {{-- UTM Campaign --}}
                                <td>
                                    {{ $registration->utm_campaign ?: '—' }}
                                </td>


                                {{-- UTM Content --}}
                                <td>
                                    {{ $registration->utm_content ?: '—' }}
                                </td>


                                {{-- UTM Term --}}
                                <td>
                                    {{ $registration->utm_term ?: '—' }}
                                </td>


                                {{-- Campaign ID --}}
                                <td>
                                    {{ $registration->campaign_id ?: '—' }}
                                </td>


                                {{-- Ad Set ID --}}
                                <td>
                                    {{ $registration->adset_id ?: '—' }}
                                </td>


                                {{-- Ad ID --}}
                                <td>
                                    {{ $registration->ad_id ?: '—' }}
                                </td>


                                {{-- Placement --}}
                                <td>
                                    {{ $registration->placement ?: '—' }}
                                </td>


                                {{-- Date --}}
                                <td>
                                    {{ $registration->created_at->format('d M Y') }}
                                </td>


                                {{-- Actions --}}
                                <td class="text-center">

                                    <div class="admin-action-btns">

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.registrations.edit', $registration) }}"
                                           class="btn btn-sm btn-iraaya-outline btn-admin-icon"
                                           title="Edit">

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        {{-- Delete --}}
                                        <form action="{{ route('admin.registrations.destroy', $registration) }}"
                                              method="POST"
                                              class="d-inline m-0"
                                              onsubmit="return confirm('Delete this registration?')">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger btn-admin-icon"
                                                    title="Delete">

                                                <i class="ti ti-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="20"
                                    class="text-center py-5 text-muted">

                                    No registrations found for the selected filters.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>



            {{-- Pagination --}}
            @if($registrations->hasPages())

                <div class="admin-pagination d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-4 pt-3 border-top">

                    <div class="text-muted small">

                        Showing

                        <strong>
                            {{ $registrations->firstItem() }}
                        </strong>

                        to

                        <strong>
                            {{ $registrations->lastItem() }}
                        </strong>

                        of

                        <strong>
                            {{ $registrations->total() }}
                        </strong>

                        records

                    </div>


                    {{ $registrations->onEachSide(1)->links('pagination::bootstrap-5') }}

                </div>

            @endif

        </div>

    </div>

</div>
@endsection