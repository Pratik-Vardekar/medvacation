@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">
            <h4>Edit Property Sections</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.property-section.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- SELL SECTION --}}
                    <div class="col-12 mb-4">
                        <h4 class="border-bottom pb-2">
                            Sell Property Section
                        </h4>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Sell Title</label>

                        <input type="text"
                               name="sell_title"
                               class="form-control"
                               value="{{ $propertySection->sell_title }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Sell Sub Title</label>

                        <input type="text"
                               name="sell_sub_title"
                               class="form-control"
                               value="{{ $propertySection->sell_sub_title }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Sell Description</label>

                        <textarea name="sell_description"
                                  rows="5"
                                  class="form-control">{{ $propertySection->sell_description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Sell Button Text</label>

                        <input type="text"
                               name="sell_button_text"
                               class="form-control"
                               value="{{ $propertySection->sell_button_text }}">
                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Sell Image</label>
 <small class="text-muted d-block mb-2">
        Recommended Size: 700 × 800 px
    </small>
                        @if($propertySection->sell_image)
                            <div class="mb-2">
                                <img src="{{ asset('public/'.$propertySection->sell_image) }}"
                                     id="sellPreview"
                                     width="150"
                                     class="img-thumbnail">
                            </div>
                        @else
                            <img id="sellPreview"
                                 width="150"
                                 class="img-thumbnail d-none">
                        @endif

                        <input type="file"
                               name="sell_image"
                               class="form-control"
                               onchange="previewImage(event, 'sellPreview')">
                    </div>

                    {{-- BUY SECTION --}}
                    <div class="col-12 mt-4 mb-4">
                        <h4 class="border-bottom pb-2">
                            Buy Property Section
                        </h4>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Buy Title</label>

                        <input type="text"
                               name="buy_title"
                               class="form-control"
                               value="{{ $propertySection->buy_title }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Buy Sub Title</label>

                        <input type="text"
                               name="buy_sub_title"
                               class="form-control"
                               value="{{ $propertySection->buy_sub_title }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Buy Description</label>

                        <textarea name="buy_description"
                                  rows="5"
                                  class="form-control">{{ $propertySection->buy_description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Buy Button Text</label>

                        <input type="text"
                               name="buy_button_text"
                               class="form-control"
                               value="{{ $propertySection->buy_button_text }}">
                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Buy Image</label>
 <small class="text-muted d-block mb-2">
        Recommended Size: 700 × 800 px
    </small>
                        @if($propertySection->buy_image)
                            <div class="mb-2">
                                <img src="{{ asset('public/'.$propertySection->buy_image) }}"
                                     id="buyPreview"
                                     width="150"
                                     class="img-thumbnail">
                            </div>
                        @else
                            <img id="buyPreview"
                                 width="150"
                                 class="img-thumbnail d-none">
                        @endif

                        <input type="file"
                               name="buy_image"
                               class="form-control"
                               onchange="previewImage(event, 'buyPreview')">
                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Update Property Sections

                </button>

            </form>

        </div>

    </div>

</div>

<script>

function previewImage(event, previewId)
{
    const input = event.target;
    const preview = document.getElementById(previewId);

    if (input.files && input.files[0])
    {
        preview.src = URL.createObjectURL(input.files[0]);
        preview.classList.remove('d-none');
    }
}

</script>

@endsection