@extends('front.layouts')
@push('title', __('front.Home Page'))
@push('styles')@endpush
@section('content')
    <div class="home-slider owl-theme owl-carousel">
        <div class="slider-item slider-item-img">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="slider-text">
                            <div class="slider-shape">
                                <img src="{{asset(config('constants.asset_path').'assets/front/img/home-one/home-slider/1.png')}}" alt="Shape">
                            </div>
                            <h1>{{__('front.World Class Medical Care')}}</h1>
                            <p>{{__('front.Speak to Doctors today wherever you are')}} </p>
                            <div class="common-btn">
                                <a href="{{route('specializes')}}">{{__('front.Get Appointment')}}</a>
                                <a class="cmn-btn-right" href="{{route('questions.index')}}">{{__('front.Ask New Question')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item slider-item-img">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="slider-text">
                            <div class="slider-shape">
                                <img src="{{asset(config('constants.asset_path').'assets/front/img/home-one/home-slider/1.png')}}" alt="Shape">
                            </div>
                            <h1>{{__('front.World Class Medical Care')}}</h1>
                            <p>{{__('front.Speak to  Doctors today wherever you are')}} </p>
                            <div class="common-btn">
                                <a href="{{route('specializes')}}">{{__('front.Get Appointment')}}</a>
                                <a class="cmn-btn-right" href="{{route('questions.index')}}">{{__('front.Ask New Question')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item slider-item-img">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="slider-text">
                            <div class="slider-shape">
                                <img src="{{asset(config('constants.asset_path').'assets/front/img/home-one/home-slider/1.png')}}" alt="Shape">
                            </div>
                            <h1>{{__('front.World Class Medical Care')}}</h1>
                            <p>{{__('front.Speak to  Doctors today wherever you are')}} </p>
                            <div class="common-btn">
                                <a href="{{route('specializes')}}">{{__('front.Get Appointment')}}</a>
                                <a class="cmn-btn-right" href="{{route('questions.index')}}">{{__('front.Ask New Question')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="counter-area d-none">
        <div class="container">
            <div class="row counter-bg">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-doctor-alt"></i>
                        <h3>
                            <span class="odometer" data-count="30">00</span>
                        </h3>
                        <p>{{__('front.Doctors')}}</p>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-people"></i>
                        <h3>
                            <span class="odometer" data-count="50">00</span>
                            <span class="target">+</span>
                        </h3>
                        <p>{{__('front.Happy Patients')}}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-patient-bed"></i>
                        <h3>
                            <span class="odometer" data-count="850">00</span>
                        </h3>
                        <p>{{__('front.consultations')}}</p>
                    </div>
                </div>


                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-question"></i>
                        <h3>
                            <span class="odometer" data-count="12">00</span>
                        </h3>
                        <p>{{__('front.Questions')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="hospital-area pb-70">
        <div class="container-fluid p-0">
            <div class="hospital-shape">
                <img src="{{asset(config('constants.asset_path').'assets/front/img/home-three/6.png')}}" alt="Shape">
            </div>
            <div class="row m-0 align-items-center">
                <div class="col-lg-6 p-0">
                    <div class="hospital-item">
                        <a class="hospital-play-btn popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto">
                            <i class="icofont-ui-play"></i>
                        </a>
                        <div class="row m-0">
                            <div class="col-lg-12 p-0">
                                <div class="hospital-left-one">
                                    <img src="{{asset(config('constants.asset_path').'assets/front/img/video.png')}}" alt="About">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hospital-item hospital-right">
                        <h2>{{__('front.Welcome to')}} <span> {{__('front.Boussla Medical')}} </span></h2>
                        <p> {{__('front.is a medical service that connects Egyptian patients with UK doctors using Telemedicine. All our doctors are consultants in the NHS healthcare system of the UK. We promise you the most accurate diagnosis and the best management plan according to the same high UK standards')}}   </p>
                          <a class="hospital-btn btn-sm more_about" href="{{route('specializes')}}">{{__('front.Get Appointment')}} </a>
                          <a class="hospital-btn btn-sm more_about services_btn" href="{{route('services')}}">{{__('front.services')}} </a>
                
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services-area pb-70 steps text-center">
        <div class="container">
            <div class="section-title  text-center">
                <p>{{__('front.Simple Steps To Book your Appointment')}} </p>
                <h2>{{__('front.How it works?')}}</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".3s">
                    <div class="service-item">
                        <div class="service-front">
                            <i class="icofont-search"></i>
                            <h3>{{__('front.Search for a doctor')}} </h3>
                            <p>{{__('front.By specialty or browsing through doctors profiles')}}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-doctor"></i>
                            <h3>{{__('front.Search for a doctor')}}</h3>
                            <p>{{__('front.By specialty or browsing through doctors profiles')}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-item">
                        <div class="service-front">
                            <i class="icofont-calendar"></i>
                            <h3>{{__('front.Book appointment')}}</h3>
                            <p>{{__('front.By online booking or contacting us by phone')}}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-prescription"></i>
                            <h3>{{__('front.Book appointment')}}</h3>
                            <p>{{__('front.By online booking or contacting us by phone')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-item">
                        <div class="service-front">
                            <i class="icofont-iphone"></i>
                            <h3>{{__('front.See doctor online')}}</h3>
                            <p>{{__('front.By following the link sent to you, at the time of your appointment')}}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-iphone"></i>
                            <h3>{{__('front.See doctor online')}}</h3>
                            <p>{{__('front.By following the link sent to you, at the time of your appointment')}}</p>
                        </div>
                    </div>
                </div>
                <a href="{{route('specializes')}}" class="hospital-btn btn-sm more_about" >{{__('front.Book Appointment')}}</a>
            </div>

        </div>
    </section>


    <div class="about-area  pb-70 why_choose">
        <div class="container">
            <div class="section-title  text-center">
                <p>{{__('front.Services tailored for your comfort')}}</p>
                <h2>{{__('front.Why Choose us')}}</h2>
            </div>
            <div class="row align-items-center mb-5 section1">
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-left">
                            <img src="{{asset(config('constants.asset_path').'assets/front/img/choose/1.jpg')}}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-item about-right">
                        <h2>{{__('front.All our doctors are practicing Consultants within the NHS. We are bringing this same standard of healthcare to you.')}}</h2>
                        <p>
                            {{__('front.Our team of excellent British-Egyptian doctors are all practicing consultants within the world famous NHS healthcare of the UK. We are bringing you the same standard of care, making sure your treatment plan follows the same high standards our consultants practice in their day to day life in the NHS.')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center section2">
                <div class="col-lg-6">
                    <div class="about-item about-right">
                        <h2>{{__('front.Some of the benefits you get from using the DoctorFly service')}}</h2>
                        <p>{{__('front.Top medical experts with vast experience. Thorough review of your case, notes and results. Sufficient time for you to explain your medical problem. Avoid unnecessary medications and procedures. No visa or travel or hassle of finding the right doctor. The best advice at the best price compared to similar services. The doctors speak your language and understand your culture. Top medical experts with vast experience.')}} </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-left">
                            <img src="{{asset(config('constants.asset_path').'assets/front/img/choose/2.jpg')}}" alt="About">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="doctors-area d-none" style="margin-top: 80px">
        <div class="container">
            <div class="section-title text-center">
                <p>{{__('front.The Best Doctors')}} </p>
                <h2>{{__('front.Our Consultants')}} </h2>
            </div>
            <div class="row">
                @forelse($doctors as $doctor)
                <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".3s">
                    <div class="doctor-item">
                        <div class="doctor-top">
                            <img src="{{asset(config('constants.asset_path').'uploads/doctors/'.$doctor->image)}}" alt="Doctor">
                        </div>
                        <div class="doctor-bottom">
                            <h3>
                                <a href="{{route('doctor_details' , $doctor->id )}}">{{$doctor->first_name}} {{$doctor->last_name}} </a>
                            </h3>
                            <span>{{$doctor->doctorInfo->specializeion->name}}</span>
                        </div>
                    </div>
                </div>
                @empty
                    <span class="no-doctors"> {{__('front.no doctors')}}</span>
                @endforelse
            </div>
            <div class="doctor-btn">
                <a href="{{route('specializes')}}"> {{__('front.All Specialists')}} </a>
            </div>
        </div>
    </section>
    <section class="review-area pb-100 d-none">
        <div class="container">
            <div class="main">
                <div class="slider-nav">
                    <div>
                        <div class="review-img">
                            <img src="{{asset(config('constants.asset_path').'assets/front/img/home-three/7.png')}}" alt="Feedback">
                        </div>
                        <div class="review-details">
                            <h3>Adision Smith</h3>
                            <span>{{__('front.Designer')}}</span>
                        </div>
                    </div>
                    <div>
                        <div class="review-img">
                            <img src="{{asset(config('constants.asset_path').'assets/front/img/home-three/8.png')}}" alt="Feedback">
                        </div>
                        <div class="review-details">
                            <h3>John Cena</h3>
                            <span>{{__('front.Designer')}}</span>
                        </div>
                    </div>
                    <div>
                        <div class="review-img">
                            <img src="{{asset(config('constants.asset_path').'assets/front/img/home-three/9.png')}}" alt="Feedback">
                        </div>
                        <div class="review-details">
                            <h3>Mac Smith</h3>
                            <span>{{__('front.Designer')}}</span>
                        </div>
                    </div>
                    <div>
                        <div class="review-img">
                            <img src="{{asset(config('constants.asset_path').'assets/front/img/home-three/9.png')}}" alt="Feedback">
                        </div>
                        <div class="review-details">
                            <h3>Shane Watson</h3>
                            <span>{{__('front.Designer')}}</span>
                        </div>
                    </div>
                </div>
                <div class="slider-for">
                    <div>
                        <p> {{__('front.Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra')}}</p>
                    </div>
                    <div>
                        <p> {{__('front.Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra')}}</p>
                    </div>
                    <div>
                        <p> {{__('front.Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra')}}</p>
                    </div>
                    <div>
                        <p> {{__('front.Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')@endpush
