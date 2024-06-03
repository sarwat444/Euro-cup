@extends('front.layouts')
@push('title', __('front.Terms of Service'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/terms_of_service.css')}}" rel="stylesheet"  type="text/css"/>
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title mb-3">{{__('front.Terms of Service')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.Terms of Service')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="terms privacy_policy_card card mt-4 mb-4">
            <div class="card-body">

                <h2>1. {{__('front.Introduction and Overview')}}</h2>
                <p>{{__('front.Brief description of the service offered. Explanation of what the terms of service cover.')}}</p>

                <h2>2. {{__('front.Acceptance of Terms')}}</h2>
                <p>{{__('front.Explanation that use of the service constitutes acceptance of these terms.')}}</p>

                <h2>3. {{__('front.Appointment Booking')}}</h2>
                <p>{{__('front.Description of the process for booking appointments with doctors through the service. Clarification of any requirements or limitations for booking appointments.')}}</p>

                <!-- Include other sections as described in the previous response -->

                <h2>14. {{__('front.Contact Information')}}</h2>
                <p>{{__('front.If you have any questions or concerns about these terms, please contact us at [Your contact email or phone number].')}}</p>
            </div>
        </div>
    </div>
@endsection
