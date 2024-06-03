@extends('front.layouts')
@push('title', __('front.Specilizations'))
@push('styles')
<style>
    .btn-close {
        margin: 0 !important
    }
    .modal-footer
    {
        display: block;
    }
</style>
@endpush
@section('content')
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{__('front.Medical specialties')}}</h2>
                    <ul>
                        <li>
                            <a href="{{__('front.home')}}">{{__('front.home')}}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{__('front.Medical specialties')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="search-area mb-4 mt-4" style="text-align: left">
        <div class="container">
            <div  class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-2 search-box">
                            <span><i class="icofont-search-1"></i> </span>
                        </div>
                        <div class="col-md-10">
                            <input  type="text" class="form-control search-input" name="search" placeholder="{{__('front.Ex : Children , Brain And Nerves  , Stomach')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="departments-area pt-70">
        <div class="container">
            <div class="row" id="specializes-container">
                @forelse($specializes as $specilize)
                    <div class="col-sm-6 col-lg-3">
                        <div class="department-item" data-bs-toggle="modal" data-bs-target="#myModal" data-id="{{ $specilize->id }}">
                            @if(!empty($specilize->icon))
                                <img src="{{ asset(config('constants.asset_path').'uploads/specializes/'.$specilize->icon) }}" alt="category" height="90" class="mb-3">
                            @else
                                <img src="{{ asset(config('constants.asset_path').'assets/front/img/no-photo.png') }}" alt="category" height="90" class="mb-3">
                            @endif
                            <h3>{{$specilize->name}}</h3>
                        </div>
                    </div>
                @empty
                    <span class="text-danger text-center">{{__('front.No Category')}}</span>
                @endforelse
            </div>
        </div>
    </section>

<!-- Bootstrap Modal -->
<div class="modal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('front.Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="popup-text">{!! nl2br(__('front.your_popup_text_here')) !!}</p>
                <a href="javascript:void(0)" class="view_more">{{__('front.view_more')}}</a>
                <div class="view_more_block" style="display: none;">
                    <p id="popup-text">{!! nl2br(__('front.continue_text')) !!}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button id="popup-yes" type="button" class="btn btn-primary">{{__('front.Yes')}}</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('front.No')}}</button>
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.search-input').keyup(function() {
                var searchValue = $(this).val().trim();

                // AJAX call to fetch filtered data
                $.ajax({
                    url: "{{ route('search_specializes') }}",
                    method: 'GET',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        // Clear the previous data
                        $('#specializes-container').empty();

                        // Append the filtered data
                        if (response.length > 0) {
                            response.forEach(function(specilize) {
                                var iconUrl = specilize.icon ? "{{ asset(config('constants.asset_path').'uploads/specializes/') }}"+"/" + specilize.icon : "{{ asset(config('constants.asset_path').'assets/front/img/no-photo.png') }}";
                                var specializeItem = '<div class="col-sm-6 col-lg-4">' +
                                    '<a href="{{ route('specializes_doctors', ':id') }}'.replace(':id', specilize.id) + '">' +
                                    '<div class="department-item">' +
                                    '<img src="' + iconUrl + '" alt="category" height="90" class="mb-3">' +
                                    '<h3>' + specilize.name + '</h3>' +
                                    '</div>' +
                                    '</a>' +
                                    '</div>';

                                $('#specializes-container').append(specializeItem);
                            });
                        } else {
                            $('#specializes-container').append('<span class="text-danger text-center">{{__("front.No Category")}}</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var departmentItems = document.querySelectorAll('.department-item');

            departmentItems.forEach(function (item) {
                item.addEventListener('click', function () {
                    var specId = item.getAttribute('data-id');
                    console.log("specId:", specId); // Log specId here
                    if (specId) {
                        document.getElementById('popup-yes').setAttribute('data-spec-id', specId);
                    } else {
                        console.error("SpecId is null or undefined.");
                    }
                });
            });

            document.getElementById('popup-yes').addEventListener('click', function () {
                var specId = this.getAttribute('data-spec-id');
                console.log("Clicked specId:", specId); // Log specId here
                if (specId) {
                    var specIdLink = "{{ route('specializes_doctors', ':specId') }}".replace(':specId', specId);
                    window.location.href = specIdLink;
                } else {
                    console.error("SpecId is null or undefined.");
                }
            });
        });
    </script>
    <script>
        // Get the button and the view_more_block
        const viewMoreButton = document.querySelector('.view_more');
        const viewMoreBlock = document.querySelector('.view_more_block');

        // Add click event listener to the button
        viewMoreButton.addEventListener('click', function(event) {
            // Prevent default link behavior
            event.preventDefault();

            // Toggle the display of the view_more_block
            if (viewMoreBlock.style.display === 'none') {
                viewMoreBlock.style.display = 'block';
                viewMoreButton.textContent = '{{__('front.view_less')}}'; // Change button text to "View Less"
            } else {
                viewMoreBlock.style.display = 'none';
                viewMoreButton.textContent = '{{__('front.view_more')}}'; // Change button text to "View More"
            }
        });
    </script>
@endpush
