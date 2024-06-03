@extends('front.layouts')
@push('title', __('front.Steps to book an appointment'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/appointment_steps.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title mb-4">{{__('front.Steps to book an appointment')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                            <li class="breadcrumb-item"
                                aria-current="page">{{__('front.Steps to book an appointment')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="appointment_steps">
            <div class="row">
                <div class="col-md-2 arrow-img">
                    <img src="{{asset(config('constants.asset_path').'assets/front/img/arrow.png')}}" alt="Shape">
                </div>
                <div class="col-md-8">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0 pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>1.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Visit the Website or App')}}</h3>
                                        <p>{{__('front.Open the website or app where you can book appointments with doctors. This could be a hospital\'s website, a healthcare provider\'s platform, or a dedicated appointment booking app.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>2.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Log In or Sign Up')}}</h3>
                                        <p>{{__('front.If you\'re a returning user, log in to your account. If not, sign up for an account by providing necessary information such as your name, email address, and contact details')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>3.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Search for Doctors')}}</h3>
                                        <p>{{__('front.Use the search function to find doctors based on your needs, such as specialty, location, or availability. You can also filter results by factors like gender or language spoken.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>4.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.View Doctor Profiles')}}</h3>
                                        <p>{{__('front.Review the profiles of available doctors to learn more about their qualifications, experience, areas of expertise, and patient reviews.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>5.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Check Availability')}}</h3>
                                        <p>{{__('front.Check the availability of the doctor you\'re interested in. Look for appointment slots that fit your schedule.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>6.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Select Appointment Time')}}</h3>
                                        <p>{{__('front.Choose a convenient date and time for your appointment from the available slots provided by the doctor.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>7.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Provide Patient Information')}}</h3>
                                        <p>{{__('front.Enter relevant patient information, including your name, date of birth, contact details, and any specific medical concerns or requirements.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>8.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Confirm Appointment')}}</h3>
                                        <p>{{__('front.Review the appointment details one last time to ensure everything is correct. Confirm your appointment booking.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <ul class="list-unstyled m-0  pe-0">
                                <li class="step d-flex">
                                    <div class="step-icon p-3">
                                        <span>9.</span>
                                    </div>
                                    <div class="step-text">
                                        <h3>{{__('front.Receive Confirmation')}}</h3>
                                        <p>{{__('front.Once your appointment is successfully booked, you\'ll receive a confirmation message via email or SMS. This message typically includes the appointment date, time, doctor\'s name, and any other relevant details.')}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
