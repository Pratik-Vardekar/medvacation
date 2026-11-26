@extends('layouts.admin')

@section('title', 'Edit Slider')

@section('content')

    <div class="container-fluid">
        <div class="page-title-head d-flex align-items-center">
            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">CRM</h4>
            </div>

        </div>
        <!-- Form -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Slider</h4>
                    </div>

                    <div class="card-body">

                        <form class="row g-3" method="POST" action="{{ route('admin.slider.update', $slider->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Sr No -->
                            <div class="col-md-6">
                                <label class="form-label">Sr No</label>
                                <input type="number" name="sr_no" value="{{ $slider->sr_no }}"
                                    class="form-control @error('sr_no') is-invalid @enderror" required>
                                @error('sr_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Change Image -->
                            <div class="col-md-6">
                                <label class="form-label">Change Image</label>

                                <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                                    class="form-control @error('image') is-invalid @enderror">
                                <small class="text-muted">
                                    Recommended Size: 1920 × 900 px
                                </small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Preview -->
                            <div class="col-md-6">
                                <label class="form-label">Image Preview</label><br>

                                <img id="preview-image" src="{{ $slider->image_url }}" height="100"
                                    style="border-radius:10px; object-fit:cover;"
                                    onerror="this.onerror=null; this.src='{{ asset('frontend/images/banner.jpg') }}';">
                            </div>
                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-between">
                                <a href="{{ route('admin.slider.index') }}" class="btn btn-light">
                                    Back
                                </a>

                                <button class="btn btn-primary">
                                    <i class="ti ti-device-floppy"></i> Update
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Footer -->
    <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            © Paces
                        </div>
                    </div>
                </div>
            </footer> -->

    </div>
    <script>
        function previewImage(event) {
            let reader = new FileReader();

            reader.onload = function() {
                document.getElementById('preview-image').src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
