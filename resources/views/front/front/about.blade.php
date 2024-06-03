@extends('front.layouts')
@push('title', __('front.About Us'))
@push('styles')@endpush
@section('content')
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{__('front.About Us')}}</h2>
                    <ul>
                        <li>
                            <a href="index.html">{{__('front.home')}}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{__('front.About Us')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-left">
                            <img src="{{asset(config('constants.asset_path').'assets/front/img/home-one/4.jpg')}}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-item about-right">
                        <img src="{{asset(config('constants.asset_path').'assets/front/img/home-one/5.png')}}" alt="About">
                        <h2>{{__('front.Welcome to')}} <span> {{__('front.Boussla Medical')}} </span></h2>
                        <p> {{__('front.is a medical service that connects Egyptian patients with UK doctors using Telemedicine. All our doctors are consultants in the NHS healthcare system of the UK. We promise you the most accurate diagnosis and the best management plan according to the same high UK standards')}}   </p>
                        <ul>
                            <li>
                                <i class="icofont-check-circled"></i>
                                {{__('front.Ask Any Question On medical Field')}}
                            </li>
                            <li>
                                <i class="icofont-check-circled"></i>
                                {{__('front.Make Appointment with best doctors')}}
                            </li>
                            <li>
                                <i class="icofont-check-circled"></i>
                                {{__('front.Contact with any doctor on no Time')}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
