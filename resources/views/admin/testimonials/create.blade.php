@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h4 class="card-title">
                Add Testimonial
            </h4>
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.testimonials.store') }}"
                  enctype="multipart/form-data"
                  class="row g-3">

                @csrf

                <div class="col-md-6">
                    <label class="form-label">Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Location</label>

                    <input type="text"
                           name="location"
                           class="form-control">
                </div>

               

                <div class="col-md-6">
                    <label class="form-label">Image</label>
  <small class="text-muted d-block mb-2">
        Recommended Size: 120 × 120 px
    </small>

                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*"
                           onchange="previewImage(event)"
                           >
                </div>

                <div class="col-md-12">
                    <img id="preview-image"
                         width="100"
                         style="display:none;border-radius:10px;">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Message</label>

                    <textarea name="message"
                              class="form-control"
                              rows="5"
                              required></textarea>
                </div>

                <div class="col-12 d-flex justify-content-between">

                    <a href="{{ route('admin.testimonials.index') }}"
                       class="btn btn-light">
                        Back
                    </a>

                    <button class="btn btn-primary">
                        Save
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
    }

    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection