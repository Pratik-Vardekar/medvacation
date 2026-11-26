@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h4 class="card-title">
                Edit Testimonial
            </h4>
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                  enctype="multipart/form-data"
                  class="row g-3">

                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label class="form-label">Name</label>

                    <input type="text"
                           name="name"
                           value="{{ $testimonial->name }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Location</label>

                    <input type="text"
                           name="location"
                           value="{{ $testimonial->location }}"
                           class="form-control">
                </div>

                

                <div class="col-md-6">
                    <label class="form-label">Change Image</label>
   <small class="text-muted d-block mb-2">
        Recommended Size: 120 × 120 px
    </small>
                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*"
                           onchange="previewImage(event)">
                </div>

                <div class="col-md-12">

                    <label class="form-label">
                        Image Preview
                    </label>

                    <br>

                   @if($testimonial->image)

    <img id="preview-image"
         src="{{ asset('public/' . $testimonial->image) }}"
         width="100"
         style="border-radius:10px;object-fit:cover;">

@else

    <img id="preview-image"
         width="100"
         style="display:none;border-radius:10px;object-fit:cover;">

    <div id="no-image-text" class="text-muted">
        No Image Available
    </div>

@endif

                </div>

                <div class="col-md-12">
                    <label class="form-label">Message</label>

                    <textarea name="message"
                              class="form-control"
                              rows="5"
                              required>{{ $testimonial->message }}</textarea>
                </div>

                <div class="col-12 d-flex justify-content-between">

                    <a href="{{ route('admin.testimonials.index') }}"
                       class="btn btn-light">
                        Back
                    </a>

                    <button class="btn btn-primary">
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
    if (!event.target.files.length) {
        return;
    }

    let reader = new FileReader();

    reader.onload = function()
    {
        let output = document.getElementById('preview-image');

        output.src = reader.result;
        output.style.display = 'block';

        let noImageText = document.getElementById('no-image-text');

        if (noImageText) {
            noImageText.style.display = 'none';
        }
    }

    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection