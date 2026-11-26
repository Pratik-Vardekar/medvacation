@extends('layouts.app')

@section('content')
<main class="pageWrapper" id="sticky-anchor">
    <section class="py-5 py-md-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 bg-light text-center py-5">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white shadow-sm p-4">
                                    <i class="fa-solid fa-check text-success fs-1"></i>
                                </div>
                            </div>

                            <div class="col-md-8 p-4 p-md-5">
                                <span class="badge rounded-pill bg-warning-subtle text-dark-emphasis px-3 py-2 mb-3">Registration Complete</span>
                                <h1 class="display-5 fw-bold mb-3">Thank you for joining <span class="text-warning">Iraaya World</span></h1>
                                <p class="lead text-secondary mb-4">
                                    Your membership request has been successfully received. Our Circle Director will connect with you shortly to guide you through the next steps, and your payment has been confirmed.
                                </p>

                                <div class="d-flex flex-column flex-sm-row gap-3">
                                    <a href="{{ route('home') }}" class="btn btn-red">Back to Home <span class="arrow"></span></a>
                                    <a href="{{ route('contact') }}" class="btn btn-outline-secondary">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
