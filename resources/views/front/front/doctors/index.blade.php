@extends('front.layouts')
@push('title', __('front.Doctors'))
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
                    <div class="card doctor-card">
                        <div class="card-body">
                            <div class="doctor-top">
                                <img src="{{asset(config('constants.asset_path').'uploads/doctors/'.$doctor->image)}}" alt="Doctor">
                            </div>
                            <div class="doctor-widget2">
                                <div class="doc-info-left">
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name"><a href="{{route('doctor_details' , $doctor->id )}}">{{$doctor->first_name}} {{$doctor->last_name}}</a></h4>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(17)</span>
                                        </div>
                                        <div class="clinic-details">
                                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->doctorInfo->address}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clini-infos">
                                        <ul>
                                            <li><i class="far fa-clock"></i> {{__('front.After')}} {{$doctor->doctorInfo->appointment_examination}}  {{__('front.Hours')}}</li>
                                            <li><i class="far fa-money-bill-alt"></i> $ {{$doctor->doctorInfo->min_price}} - ${{$doctor->doctorInfo->max_price }}  <i
                                                    class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    aria-label="Lorem Ipsum" data-bs-original-title="Lorem Ipsum"></i></li>
                                        </ul>
                                    </div>
                                    <div class="clinic-booking">
                                        <a class="view-pro-btn" href="{{route('doctor_details' , $doctor->id )}}"> {{__('front.View Profile')}} </a>
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
@endsection
