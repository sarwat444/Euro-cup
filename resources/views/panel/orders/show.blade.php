@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])
@push('panel_css')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/icofont.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/style.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/orders_details.css')}}" rel="stylesheet"
          type="text/css"/>

@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 payment-box mt-4">
                <h3>Order Details :</h3>
                <h4 class="mb-5" style="line-height: 30px; font-size: 17px">{{$order->order}}</h4>
                <ul class="list-unstyled">
                    <li><i class="icofont-google-map"></i> {{ $order->country->name }} </li>
                    <li><i class="icofont-google-map"></i> {{ $order->city }} </li>
                    <li><i class="icofont-opposite"></i> {{ $order->plz_code }}</li>
                    <li><i class="icofont-map-pins"></i> {{ $order->street }}</li>
                    <li><i class="icofont-whatsapp"></i> {{ $order->whats_number }}</li>
                </ul>
            </div>
            <div class="col-md-4 mt-4">
                <div class="payment-box">
                    <h1> Set Order Price For Client </h1>
                    <div class="row mb-4">
                        <div class="col-md-12">
                           <input type="text" name="order_price" class="form-control" placeholder="ex.200$">
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary btn-block p-3"> Save </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('panel_js')

@endpush
