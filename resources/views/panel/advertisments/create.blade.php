@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <!-- DataTables -->
    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/css/vendors/datatables.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <form id="form" method="{{isset($item) ? 'POST' : 'POST'}}" to="{{url()->current()}}"
                              url="{{url()->current()}}" class="w-100">
                            @csrf
                            <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Title <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="title"
                                                       value="{{isset($item)?@$item->title:''}}"
                                                       placeholder="{{__('name')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col  @if(isset($item)) d-flex @endif">
                                            @if(isset($item))
                                            <div class="image mb-3">
                                                @if(!empty($item->icon))
                                                    <img style="height: 50px;margin-top: 20px;margin-right: 10px;" alt="" src="{{ asset(config('constants.asset_path') . $item->icon) }}">
                                                @else
                                                    <img style="height: 40px;margin-top: 20px;margin-right: 10px;" alt="" src="{{ asset(config('constants.asset_path') . 'assets/panel/images/no_iamge.jpg') }}" >
                                                @endif
                                            </div>
                                            @endif
                                            <div class="mb-3">
                                                <label>({{ __('Image') }}) </label>
                                                <input class="form-control" type="file" name="icon" accept="*image">
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>{{__('active')}} <span class="text-danger">*</span></label>
                                            <div class="media-body">
                                                <label class="switch">
                                                    <input type="checkbox" value="1"
                                                           {{ isset($item) ? ($item->active == 1)  ? 'checked' : "" : "checked" }}
                                                           name="active"><span class="switch-state"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="">
                                            <button class="btn btn-primary" type="submit"
                                                    id="btn_submit"> {{__('save')}} </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('panel_js')

    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweet-alerts.init.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/post.js')}}"></script>

@endpush
