@extends('front.layouts')
@push('title', __('front.view blog'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/orders_details.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="page-title-area page-title-two">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{__('front.Order Details')}}</h2>
                    <ul>
                        <li>
                            <a href="http://127.0.0.1:8000/en">
                                {{__('front.home')}}
                            </a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{__('front.Order Details')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="appointment-details pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 payment-box ">
                    <h3>{{__('front.Order Details')}}</h3>
                    <h4 class="mb-5" style="line-height: 30px; font-size: 17px">{{$order->order}}</h4>
                    <ul class="list-unstyled">
                        <li><i class="icofont-google-map"></i> {{ $order->country->name }} </li>
                        <li><i class="icofont-google-map"></i> {{ $order->city }} </li>
                        <li><i class="icofont-opposite"></i> {{ $order->plz_code }}</li>
                        <li><i class="icofont-map-pins"></i> {{ $order->street }}</li>
                        <li><i class="icofont-whatsapp"></i> {{ $order->whats_number }}</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="payment-box">
                        <h1> {{__('front.Order Summary')}}</h1>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h4>{{__('front.Total')}}</h4>
                            </div>
                            <div class="col-md-4">
                                <h3> 120 $ </h3>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block p-3"> {{__('front.Pay Now')}}  </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

@endpush
