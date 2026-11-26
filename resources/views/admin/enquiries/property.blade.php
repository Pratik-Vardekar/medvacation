@extends('layouts.admin')

@section('title', 'Property Enquiries')

@section('content')

<div class="container-fluid">
   <div class="page-title-head d-flex align-items-center">
      <div class="flex-grow-1">
         <!-- <h4 class="page-main-title m-0">CRM</h4> -->
      </div>
      
   </div>
        <!-- Form -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">

                    <h4 class="page-main-title m-0">Property Enquiry Requests</h4>
        

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Property ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <!-- <th>Subject</th> -->
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($enquiries as $key => $enquiry)

                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                   <td>

@if($enquiry->property_title)

<div class="d-flex align-items-center gap-2">

    <img 
        src="{{ $enquiry->property_image ?? asset('assets/images/property/property-1.jpg') }}"
        width="70"
        height="70"
        style="object-fit:cover;border-radius:8px;"
    >

    <div>

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

                                    <!-- <td>
                                        {{ $enquiry->subject }}
                                    </td> -->

                                    <td>
                                        {{ $enquiry->message }}
                                    </td>

                                    <td>
                                        {{ $enquiry->created_at->format('d M Y h:i A') }}
                                    </td>

                                    <td>

                                        <a href="{{ route('admin.enquiries.delete', $enquiry->id) }}"
                                           class="btn btn-light btn-icon btn-sm rounded-circle"
                                           onclick="return confirm('Are you sure?')">

                                            
                                                                        <i class="ti ti-trash fs-lg"></i>


                                        </a>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="9" class="text-center">
                                        No Property Enquiries Found
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