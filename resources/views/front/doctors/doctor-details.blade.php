@extends('front.layouts')
@push('title', __('front.Doctor Details'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/doctors.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.Doctor Profile')}}</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{__('front.Doctors')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.Doctor Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="min-height: 148.906px;">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$doctor->first_name}} {{$doctor->last_name}}</h4>

                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->doctorInfo->address}}</p>
                                </div>
                                <span>{{$doctor->doctorInfo->languages}}</span>
                               <div class="alert alert-primary mt-3 p-2 accept_urgent">
                                   <h4 >{{__('front.The doctor accepts an urgent examination')}}</h4>
                               </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-clock"></i> {{__('front.After')}}  {{$doctor->doctorInfo->appointment_examination}} {{__('front.Hours')}} </li>
                                    <li><i class="far fa-money-bill-alt"></i> $ {{$doctor->doctorInfo->min_price}} - ${{$doctor->doctorInfo->max_price }}  <i
                                            class="fas fa-info-circle" data-bs-toggle="tooltip"
                                            aria-label="Lorem Ipsum" data-bs-original-title="Lorem Ipsum"></i></li>
                                </ul>
                            </div>
                            <div class="clinic-booking">
                                <form action="{{route('Book_Appointment' , $doctor->id  )}}" method="post">
                                    @csrf
                                    <input type="hidden" name="urgent" value="0" id="urgent">
                                    <button class="apt-btn reservation_btn btn btn-primary">{{__('front.Book Appointment')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body pt-0">
                    <div class="tab-content pt-20">
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">{{__('front.About Doctor')}}</h4>
                                        <p> {{$doctor->doctorInfo->details}}</p>
                                    </div>

                                    <div class="widget education-widget choosen_status">
                                        <h4 class="widget-title">{{__('front.Urgent detection')}} ?  <span class="notice"> {{__('front.You will pay an additional')}}  <span class="text-danger">{{$doctor->doctorInfo->urgent_amount}}  % </span>  </span></h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="javascript:void(0)" class="yes_btn name btn btn-primary apt-btn"> {{__('front.Yes')}} </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="no_btn name btn btn-primary apt-btn"> {{__('front.No')}}  </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                var previousContent = $('.choosen_status').html(); // Store the initial content

                // Add click event listener to the "Yes" button
                $('.yes_btn').on('click', function(event) {
                    event.preventDefault();
                    // Update the text content
                    $('.choosen_status').html("<div class='alert alert-primary urgent_message '>{{__('front.You Have chosen Urgent detection You will pay an additional') }} <span class='text-danger'>{{$doctor->doctorInfo->urgent_amount}} % </span>    <i class='icofont-undo undo_btn rendo_btn'> </div>");
                    $('#urgent').val(1)  ;
                });

                $(document).on('click', '.undo_btn', function(event) {
                    event.preventDefault();
                    // Restore the previous content
                    $('.choosen_status').html(previousContent);
                    $('#urgent').val(0)  ;
                    $('.yes_btn').on('click', function(event) {
                        event.preventDefault();
                        // Update the text content
                        $('.choosen_status').html("<div class='alert alert-primary urgent_message '>{{__('front.You Have chosen Urgent detection You will pay an additional') }} <span class='text-danger'>{{$doctor->doctorInfo->urgent_amount}} %</span>    <i class='icofont-undo undo_btn rendo_btn'> </div>");
                        $('#urgent').val(1)  ;
                    });
                });
            });
        </script>

    @endpush
@endsection
