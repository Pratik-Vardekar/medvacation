@extends('layouts.admin')

@section('title', 'All Enquiries')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            <div class="card">

                <div class="card-header">
                    <h4 class="page-main-title m-0">
                        All Enquiries Requests
                    </h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped align-middle text-center">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Property</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($enquiries as $key => $enquiry)

                                <tr>

                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>

                                        @if($enquiry->form_type == 'free_appraisal')

                                            <span class="badge bg-success">
                                                Appraisal
                                            </span>

                                        @elseif($enquiry->form_type == 'property_enquiry')

                                            <span class="badge bg-warning text-dark">
                                                Property
                                            </span>

                                        @else

                                            <span class="badge bg-primary">
                                                Contact
                                            </span>

                                        @endif

                                    </td>

                                    <!-- Property -->
                                    <td>

                                        @if($enquiry->property_title)

                                        <div class="d-flex align-items-center gap-2 justify-content-center">

                                            <img 
                                                src="{{ $enquiry->property_image ?? asset('assets/images/property/property-1.jpg') }}"
                                                width="70"
                                                height="70"
                                                style="object-fit:cover;border-radius:8px;"
                                            >

                                            <div class="text-start">

                                                <strong>
                                                    {{ $enquiry->property_title }}
                                                </strong>

                                                <br>

                                                <small>
                                                    ID : {{ $enquiry->property_id }}
                                                </small>

                                            </div>

                                        </div>

                                        @else

                                            -

                                        @endif

                                    </td>

                                    <td>
                                        {{ $enquiry->name }}
                                    </td>

                                    <td>
                                        {{ $enquiry->email }}
                                    </td>

                                    <td>
                                        {{ $enquiry->phone }}
                                    </td>

                                    <td style="min-width:200px;">
                                        {{ $enquiry->message }}
                                    </td>

                                    <td>
                                        {{ $enquiry->created_at->format('d M Y h:i A') }}
                                    </td>

                                    <td>

                                        <form action="{{ route('admin.enquiries.delete', $enquiry->id) }}" 
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this enquiry?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-light btn-icon btn-sm rounded-circle">

                                                <i class="ti ti-trash fs-lg "></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        No enquiries found.
                                    </td>
                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection