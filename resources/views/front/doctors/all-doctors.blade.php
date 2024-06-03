@extends('front.layouts')
@push('title', __('front.Doctors'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/doctors.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.Doctors')}}</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('specializes')}}">{{__('front.Medical specialties')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page"> {{__('front.Doctors')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="transform: none; min-height: 14.906px;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                @forelse($doctors as $doctor)
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="modal" id="myModal{{$doctor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="{{ route('doctor_details',$doctor->id) }}" id="popup-yes"  type="button" class="btn btn-primary">{{__('front.agree')}}</a>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('front.disagree')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card doctor-card" data-bs-toggle="modal" data-bs-target="#myModal{{$doctor->id}}" data-id="{{ $doctor->id }}">
                            <div class="card-body">
                                <div class="doctor-top">
                                    <img src="{{asset(config('constants.asset_path').'uploads/doctors/'.$doctor->image)}}" alt="Doctor">
                                </div>
                                <div class="doctor-widget2">
                                    <div class="doc-info-left">
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="javascript:void(0)">{{$doctor->first_name}} {{$doctor->last_name}}</a></h4>
                                            <div class="clinic-details">
                                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->doctorInfo->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="doc-info-right">
                                        <div class="clini-infos">
                                            <p class="doc-location"><i class="far fa-clock"></i> {{__('front.After')}} {{$doctor->doctorInfo->appointment_examination}}  {{__('front.Hours')}}</p>
                                            <p class="doc-location"><i class="far fa-money-bill-alt"></i> $ {{$doctor->doctorInfo->min_price}} - ${{$doctor->doctorInfo->max_price }}</p>

                                        </div>
                                        <div class="clinic-booking">
                                            <a class="view-pro-btn" href="javascript:void(0)"> {{__('front.View Profile')}} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <span class="text-danger"> {{__('front.No Doctors On Category')}}</span>
                @endforelse

            </div>
        </div>
    </div>

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
                    <button id="popup-yes" type="button" class="btn btn-primary">{{__('front.agree')}}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('front.disagree')}}</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
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

            document.querySelectorAll('.doctor-card').forEach(function(card) {
                card.addEventListener('click', function(event) {
                    if (!event.target.classList.contains('view-pro-btn')) {
                        event.preventDefault(); // Prevent default behavior
                        var targetModal = card.getAttribute('data-bs-target');
                        var specId = card.getAttribute('data-id');
                        if (specId) {
                            document.getElementById('popup-yes').setAttribute('data-spec-id', specId);
                            $(targetModal).modal('show'); // Open modal
                        } else {
                            console.error("SpecId is null or undefined.");
                        }
                    }
                });
            });

            document.getElementById('popup-yes').addEventListener('click', function () {
                var specId = this.getAttribute('data-spec-id');
                console.log("Clicked specId:", specId); // Log specId here
                if (specId) {
                    var specIdLink = "{{ route('doctor_details', ':specId') }}".replace(':specId', specId);
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

    <script>
        // Wait for the DOM to be fully loaded
        $(document).ready(function () {
            // Click event for the "Disagree" button
            $('#myModal .modal-footer .btn-secondary').click(function () {

                Swal.fire({
                    icon: 'warning',
                    title: '{{__('front.An appointment cannot be booked unless you select OK')}}',
                    showCancelButton: false,
                    showConfirmButton: true, // Adding the confirm button
                    confirmButtonText: '{{__('front.OK')}}', // Setting the text for the confirm button
                    cancelButtonColor: '#d33',
                    customClass: {
                        content: 'custom-swal-text'
                    }
                }).then((result) => {
                    // You can perform any action here if needed
                });
            });
        });
    </script>

@endpush
