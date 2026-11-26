@extends('layouts.admin')

@section('title', 'Sliders')

@section('content')

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="page-title-head d-flex align-items-center">

            <div class="flex-grow-1">
                <h4 class="page-main-title m-0">
                    Sliders
                </h4>
            </div>

            <div class="d-flex align-items-center gap-2">

                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">

                    <i class="ti ti-plus"></i>
                    Add Slider

                </a>

            </div>

        </div>

        <!-- Table -->
        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            All Sliders
                        </h4>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped align-middle text-center">

                                <thead class="table-light">

                                    <tr>
                                        <th width="120">Sr No</th>
                                        <th>Image</th>
                                        <th width="150">Action</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    @forelse($sliders as $slider)
                                        <tr>

                                            <td>
                                                {{ $slider->sr_no }}
                                            </td>

                                            <td>
                                                <img src="{{ $slider->image_url }}" width="120" height="70"
                                                    style="border-radius:10px; object-fit:cover;"
                                                    alt="Slider {{ $slider->sr_no }}"
                                                    onerror="this.onerror=null; this.src='{{ asset('frontend/images/banner.jpg') }}';">
                                            </td>

                                            <td>

                                                <div class="d-flex justify-content-center align-items-center gap-2">

                                                    <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                        class="btn btn-light btn-icon btn-sm rounded-circle">

                                                        <i class="ti ti-edit fs-lg"></i>

                                                    </a>

                                                    <form action="{{ route('admin.slider.destroy', $slider->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            onclick="return confirm('Delete this slider?')"
                                                            class="btn btn-light btn-icon btn-sm rounded-circle">

                                                            <i class="ti ti-trash fs-lg "></i>

                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="3" class="text-center">
                                                No sliders found
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
