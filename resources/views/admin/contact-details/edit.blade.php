@extends('layouts.admin')

@section('title', 'Contact Details')

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

                    <h4 class="page-main-title m-0">Contact Details
</h4>
        </div>
                

                <div class="card-body">

                    @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('admin.contact-details.update') }}"
                          method="POST">

                        @csrf

                        <div class="row">

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="{{ old('phone', $contact->phone ?? '') }}"
                                       placeholder="Enter phone number">

                            </div>

                            <!-- Primary Email -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email', $contact->email ?? '') }}"
                                       placeholder="Enter email">

                            </div>

                            <!-- Secondary Email -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Secondary Email
                                </label>

                                <input type="email"
                                       name="secondary_email"
                                       class="form-control"
                                       value="{{ old('secondary_email', $contact->secondary_email ?? '') }}"
                                       placeholder="Enter secondary email">

                            </div>

                            <!-- Facebook -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Facebook Link
                                </label>

                                <input type="text"
                                       name="facebook"
                                       class="form-control"
                                       value="{{ old('facebook', $contact->facebook ?? '') }}"
                                       placeholder="Enter Facebook URL">

                            </div>

                            <!-- Instagram -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Instagram Link
                                </label>

                                <input type="text"
                                       name="instagram"
                                       class="form-control"
                                       value="{{ old('instagram', $contact->instagram ?? '') }}"
                                       placeholder="Enter Instagram URL">

                            </div>

                            <!-- Youtube -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Youtube Link
                                </label>

                                <input type="text"
                                       name="youtube"
                                       class="form-control"
                                       value="{{ old('youtube', $contact->youtube ?? '') }}"
                                       placeholder="Enter Youtube URL">

                            </div>

                            <!-- Linkedin -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Linkedin Link
                                </label>

                                <input type="text"
                                       name="linkedin"
                                       class="form-control"
                                       value="{{ old('linkedin', $contact->linkedin ?? '') }}"
                                       placeholder="Enter Linkedin URL">

                            </div>

                            <!-- Google Map URL -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Google Map URL
                                </label>

                                <input type="text"
                                       name="map_url"
                                       class="form-control"
                                       value="{{ old('map_url', $contact->map_url ?? '') }}"
                                       placeholder="Enter Google map embed URL">

                            </div>

                            <!-- Address -->
                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Address
                                </label>

                                <textarea name="address"
                                          rows="4"
                                          class="form-control"
                                          placeholder="Enter office address">{{ old('address', $contact->address ?? '') }}</textarea>

                            </div>

                            <!-- Submit -->
                            <div class="col-12">

                                <button type="submit"
                                        class="btn btn-primary">

                                    Update Contact Details

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection