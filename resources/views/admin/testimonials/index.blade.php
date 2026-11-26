@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">

        <div class="flex-grow-1">
            <h4 class="page-main-title m-0">
                Testimonials
            </h4>
        </div>

        <a href="{{ route('admin.testimonials.create') }}"
           class="btn btn-primary">

            <i class="ti ti-plus"></i>
            Add Testimonial

        </a>

    </div>

    <div class="card">

        <div class="card-header">
            <h4 class="card-title mb-0">
                All Testimonials
            </h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle text-center">

                    <thead class="table-light">

                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Message</th>
                            <th width="150">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($testimonials as $testimonial)

                        <tr>

                            <td>
                                {{ $testimonial->id }}
                            </td>

                            <td>

    @if($testimonial->image)

       <img src="{{ asset('public/' . $testimonial->image) }}"
     width="70"
     height="70"
     style="object-fit:cover;border-radius:10px;">

    @else

        <span class="text-muted">
            No Image
        </span>

    @endif

</td>

                            <td>
                                {{ $testimonial->name }}
                            </td>

                            <td>
                                {{ $testimonial->location }}
                            </td>

                            <td style="max-width:300px;">
                                {{ $testimonial->message }}
                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                       class="btn btn-light btn-icon btn-sm rounded-circle">

                                        <i class="ti ti-edit fs-lg"></i>

                                    </a>

                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Delete this testimonial?')"
                                                class="btn btn-light btn-icon btn-sm rounded-circle">

                                            <i class="ti ti-trash fs-lg"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6">
                                No Testimonials Found
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection