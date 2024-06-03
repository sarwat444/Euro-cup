@extends('front.layouts')
@push('title', __('front.Privacy Policy'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/privacy_policy.css')}}" rel="stylesheet"  type="text/css"/>
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.Privacy Policy')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.Privacy Policy')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="privacy_policy_card card mt-4 mb-4">
            <div class="card-body">
                <p>{!! __('front.privacy_content')  !!}</p>
            </div>
        </div>
    </div>
@endsection
