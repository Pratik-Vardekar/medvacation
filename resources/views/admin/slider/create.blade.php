@extends('layouts.admin')

@section('title', 'Add Slider')

@section('content')

<div class="container-fluid">
   <div class="page-title-head d-flex align-items-center">
      <div class="flex-grow-1">
         <h4 class="page-main-title m-0">CRM</h4>
      </div>
      <div class="text-end">
         <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Paces</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
            <li class="breadcrumb-item active">CRM</li>
         </ol>
      </div>
   </div>

        <!-- Form -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Slider</h4>
                    </div>

                    <div class="card-body">

                        <form class="row g-3" method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Sr No -->
                            <div class="col-md-6">
                                <label class="form-label">Sr No</label>
                                <input 
                                    type="number" 
                                    name="sr_no" 
                                    class="form-control @error('sr_no') is-invalid @enderror" 
                                    required
                                >
                                @error('sr_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-md-6">
                                <label class="form-label">Image</label>
                                <input 
                                    type="file" 
                                    name="image" 
                                    class="form-control @error('image') is-invalid @enderror" 
                                    required
                                >
                                   <small class="text-muted">
        Recommended Size: 1920 × 900 px
    </small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Preview -->
                            <div class="col-12">
                                <img id="preview" style="display:none; max-height:120px;" />
                            </div>

                            <!-- Submit -->
                            <div class="col-12 d-flex justify-content-between">
                                <a href="{{ route('admin.slider.index') }}" class="btn btn-light">
                                    Back
                                </a>

                                <button class="btn btn-primary" type="submit">
                                    <i class="ti ti-device-floppy me-1"></i> Save Slider
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
                    <script>document.write(new Date().getFullYear())</script>
                    © Paces
                </div>
                <div class="col-md-6">
                    <div class="d-none d-md-flex justify-content-end gap-3">
                        <a href="#" class="link-reset">About</a>
                        <a href="#" class="link-reset">Support</a>
                        <a href="#" class="link-reset">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->

</div>

<!-- Image Preview Script -->
<script>
document.querySelector('input[name="image"]').addEventListener('change', function(e) {
    const [file] = this.files;
    if (file) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
});
</script>

@endsection