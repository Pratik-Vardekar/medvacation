@extends('layouts.admin')

@section('title', 'Contact Enquiries')

@section('content')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <!-- <h4 class="page-main-title m-0">CRM</h4> -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="card">

                <div class="card-header">
                    <h4 class="page-main-title m-0">
                        Contact Requests
                    </h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped align-middle text-center">

                            <thead class="table-light">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Service</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($enquiries as $key => $enquiry)

                                <tr>

                                    <td>
                                        {{ $key + 1 }}
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

                                    <td>
                                        {{ $enquiry->country }}
                                    </td>

                                    <td>
                                        {{ $enquiry->service }}
                                    </td>

                                    <td style="max-width:250px;">
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

                                                <i class="ti ti-trash fs-lg"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="9" class="text-center">
                                        No contact enquiries found.
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