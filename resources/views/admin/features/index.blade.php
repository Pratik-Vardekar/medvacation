@extends('layouts.admin')

@section('content')


<div class="container-fluid">
   <div class="page-title-head d-flex align-items-center">
      <div class="flex-grow-1">
        
      </div>
      
   </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Feature Cards</h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle text-center">

                    <thead class="table-light">
                        <tr>
                            <th width="80">Sr No</th>
                            <th width="120">Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($cards as $feature)

                        <tr>

                            <td class="align-middle">
                                {{ $feature->sr_no }}
                            </td>

                            <td class="align-middle">
                                <img src="{{ asset($feature->icon) }}"
                                     width="60"
                                     height="60"
                                     style="object-fit: contain;">
                            </td>

                            <td class="align-middle fw-semibold">
                                {{ $feature->title }}
                            </td>

                            <td class="align-middle">
                                {{ $feature->description }}
                            </td>

                            <td class="align-middle">

                                <a href="{{ route('admin.features.edit', $feature->id) }}"
                                   class="btn btn-light btn-icon btn-sm rounded-circle border">

                                    <i class="ti ti-edit fs-lg"></i>

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="5" class="text-center py-4">
                                No Feature Cards Found
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