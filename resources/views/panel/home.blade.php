@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Home</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use
                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#stroke-home"></use>
                                </svg>
                            </a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid">
            <div class="col-xxl-4 col-sm-6 box-col-6">
                <div class="card profile-box">
                    <div class="card-body">
                        <div class="media media-wrapper justify-content-between">
                            <div class="media-body">
                                <div class="greeting-user">
                                    <h4 class="f-w-600" style="text-transform: capitalize;">Welcome to Philex Pharmaceuticals</h4>
                                    <p>Here whats happing in your account today</p>
                                    <div class="whatsnew-btn"><a class="btn btn-outline-white">Website Home</a></div>
                                </div>
                            </div>

                        </div>
                        <div class="cartoon"><img style="height: 175px" class="img-fluid"
                                                  src="{{asset(config('constants.asset_path').'assets/panel/images/player.png')}}"
                                                  alt="vector women with leptop"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round secondary">
                                        <div class="bg-round">
                                            <svg class="svg-fill">
                                                <use
                                                    href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#cart"></use>
                                            </svg>
                                            <svg class="half-circle svg-fill">
                                                <use
                                                    href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#halfcircle"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>{{$users}}</h4><span class="f-light">Users</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round primary">
                                            <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use
                                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#tag"></use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use
                                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#halfcircle"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h4>{{$advertisments}}</h4><span class="f-light">Advertisments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round warning">
                                        <div class="bg-round">
                                            <svg class="svg-fill">
                                                <use
                                                    href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#return-box"></use>
                                            </svg>
                                            <svg class="half-circle svg-fill">
                                                <use
                                                    href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#halfcircle"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4>{{$winners }}</h4><span class="f-light">winners</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round success">
                                            <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use
                                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#rate"></use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use
                                                        href="{{asset(config('constants.asset_path').'assets/panel/svg/icon-sprite.svg')}}#halfcircle"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h4>{{$Votes }}</h4><span class="f-light">Votes</span>
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
    <!-- Container-fluid Ends-->
@endsection
@push('panel_js')
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/chart/apex-chart/chart-custom.js')}}"></script>
@endpush
