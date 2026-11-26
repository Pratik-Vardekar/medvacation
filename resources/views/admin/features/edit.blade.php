@extends('layouts.admin')

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

                    <h4 class="page-main-title m-0">Edit Feature Card</h4>

        </div>

        <div class="card-body">

            <form class="row g-3"
                  action="{{ route('admin.features.update', $feature->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <!-- Title -->
                <div class="col-md-6">
                    <label class="form-label">Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $feature->title }}"
                           required>
                </div>

                <!-- Serial No -->
                <div class="col-md-6">
                    <label class="form-label">Serial No</label>

                    <input readonly
                           type="number"
                           name="sr_no"
                           class="form-control"
                           value="{{ $feature->sr_no }}">
                </div>

                <!-- Description -->
                <div class="col-md-12">
                    <label class="form-label">Description</label>

                    <textarea name="description"
                              class="form-control"
                              rows="5"
                              required>{{ $feature->description }}</textarea>
                </div>

                <!-- Change Icon -->
                <div class="col-md-6">
                    <label class="form-label">Change Icon</label>
    <small class="text-muted d-block mb-2">
        Recommended Size: 100 × 100 px
    </small>
                    <input 
                        type="file"
                        name="icon"
                        accept="image/*"
                        onchange="previewImage(event)"
                        class="form-control"
                    >
                </div>

                <!-- Icon Preview -->
                <div class="col-md-6">
                    <label class="form-label">Icon Preview</label><br>

                    <img 
                        id="preview-image"
                        src="{{ asset('public/'.$feature->icon) }}"
                        height="100"
                        style="border-radius:10px; object-fit:contain;"
                    >
                </div>

                <!-- Buttons -->
                <div class="col-12 d-flex justify-content-between">

                    <a href="{{ route('admin.features.index') }}"
                       class="btn btn-light">
                        Back
                    </a>

                    <button class="btn btn-primary">
                        <i class="ti ti-device-floppy"></i>
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    function previewImage(event)
    {
        let reader = new FileReader();

        reader.onload = function()
        {
            document.getElementById('preview-image').src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection