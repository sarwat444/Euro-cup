@extends('front.layouts')
@push('title', __('front.services'))
@push('styles')@endpush
@section('content')
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{ __('front.services') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">{{ __('front.home') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('front.services') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="services-details-img mt-5 mb-3">
        <div class="container ">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{asset(config('constants.asset_path').'assets/front/img/service-details-bg.jpg')}}"
                         alt="services">
                </div>
                <div class="col-md-7">
                    <h2>{{__('front.We always provide good services')}}</h2>
                    <p>{{__('front.loram_desc')}} </p>
                </div>
            </div>
        </div>
    </div>
    <section class="services-area pt-50 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 wow fadeInUp animated" data-wow-delay=".3s"
                     style="visibility: visible; animation-delay: 0.3s;">
                    <div class="service-item">
                        <a href="{{ route('specializes') }}">
                            <div class="service-front">
                                <i class="icofont-doctor"></i>
                                <h3>{{ __('front.appointment booking') }}</h3>
                                <p>{{ __('front.appointment booking description') }}</p>
                            </div>
                            <div class="service-end">
                                <i class="icofont-doctor"></i>
                                <h3>{{ __('front.appointment booking') }}</h3>
                                <p>{{ __('front.appointment booking description') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 wow fadeInUp animated" data-wow-delay=".5s"
                     style="visibility: visible; animation-delay: 0.5s;">
                     <a href="{{ route('questions.index') }}">
                    <div class="service-item">
                        <div class="service-front">
                            <i class="icofont-question"></i>
                            <h3>{{ __('front.ask us') }}</h3>
                            <p>{{ __('front.ask us description') }}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-question"></i>
                            <h3>{{ __('front.ask us') }}</h3>
                            <p>{{ __('front.ask us description') }}</p>
                        </div>
                    </div>
                     </a>
                </div>
                <div class="col-sm-6 col-lg-3 wow fadeInUp animated" data-wow-delay=".7s"
                     style="visibility: visible; animation-delay: 0.7s;">
                    <div class="service-item">
                        <a href="{{ route('alternative_medicine') }}">
                        <div class="service-front">
                            <i class="icofont-patient-file"></i>
                            <h3>{{ __('front.Alternative Medicine') }}</h3>
                            <p>{{ __('front.Alternative Medicine description') }}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-patient-file"></i>
                            <h3>{{ __('front.Alternative Medicine') }}</h3>
                            <p>{{ __('front.Alternative Medicine description') }}</p>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 wow fadeInUp animated" data-wow-delay=".9s"
                     style="visibility: visible; animation-delay: 0.9s;">
                     <a href="{{ route('blogs') }}">
                    <div class="service-item">
                        <div class="service-front">
                            <i class="icofont-list"></i>
                            <h3>{{ __('front.blogs') }}</h3>
                            <p>{{ __('front.blogs description') }}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-list"></i>
                            <h3>{{ __('front.blogs') }}</h3>
                            <p>{{ __('front.blogs description') }}</p>
                        </div>
                    </div>
                     </a>
                </div>


                <div class="col-sm-6 col-lg-3 wow fadeInUp animated" data-wow-delay=".9s"
                     style="visibility: visible; animation-delay: 0.9s;">
                    <div class="service-item">
                        <a href="{{ route('createMedicalSupplies') }}">
                        <div class="service-front">
                            <i class="icofont-basket"></i>
                            <h3>{{ __('front.order product') }}</h3>
                            <p>{{ __('front.order product description') }}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-basket"></i>
                            <h3>{{ __('front.order product') }}</h3>
                            <p>{{ __('front.order product description') }}</p>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
    </section>

@endsection
