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
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$doctor->doctorInfo->address}}</p>
                                </div>

                                <span>{{$doctor->doctorInfo->languages}}</span>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-clock"></i> {{__('front.After')}}  {{$doctor->doctorInfo->alternative_medicine_price}} {{__('front.Hours')}} </li>
                                    <li><i class="far fa-money-bill-alt"></i> $ {{$doctor->doctorInfo->alternative_medicine_price}}<i
                                            class="fas fa-info-circle" data-bs-toggle="tooltip"
                                            aria-label="Lorem Ipsum" data-bs-original-title="Lorem Ipsum"></i></li>
                                </ul>
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

                                    <div class="payment-cards mt-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-2">
                                                <div class="card master-card">
                                                    <div class="card-body">
                                                        <img src="{{asset(config('constants.asset_path').'assets/front/img/payment/master.png')}}" alt="master" height="100">
                                                        <h3>Master Card</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card master-card" id="card2">
                                                    <div class="card-body">
                                                        <img src="{{asset(config('constants.asset_path').'assets/front/img/payment/visa.png')}}" alt="master" height="100">
                                                        <h3>Visa Card</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="card master-card" id="card3">
                                                    <div class="card-body">
                                                        <img src="{{asset(config('constants.asset_path').'assets/front/img/payment/paypal.png')}}" alt="master" height="100">
                                                        <h3>Paypal</h3>
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
            </div>

        </div>
    </div>
@endsection
@push('scripts')
@endpush
