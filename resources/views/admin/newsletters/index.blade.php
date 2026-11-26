@extends('layouts.admin')

@section('title', 'Newsletter Subscribers')

@section('content')

<div class="container-fluid">

    {{-- PAGE TITLE --}}
    <div class="page-title-head d-flex align-items-center justify-content-between mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Newsletter Subscribers
            </h4>

            <p class="text-muted mb-0">
                View all newsletter subscribed users
            </p>

        </div>

    </div>

    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-bordered mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="80">
                                #
                            </th>

                            <th>
                                Email Address
                            </th>

                            <th width="250">
                                Subscribed Date
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($newsletters as $key => $newsletter)

                            <tr>

                                <td>
                                    {{ $key + 1 }}
                                </td>

                                <td>
                                    {{ $newsletter->email }}
                                </td>

                                <td>
                                    {{ $newsletter->created_at ? $newsletter->created_at->format('d M Y h:i A') : '-' }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3" class="text-center py-4">

                                    No Newsletter Subscribers Found

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>
                <div class="mt-4">
    {{ $newsletters->links() }}
</div>

            </div>

        </div>

    </div>

</div>

@endsection