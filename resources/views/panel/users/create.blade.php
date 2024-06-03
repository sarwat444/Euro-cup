@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <!-- DataTables -->
    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/css/vendors/datatables.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>{{ __('add patient') }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form id="form" method="{{ isset($item) ? 'POST' : 'POST' }}" to="{{ url()->current() }}"
                            url="{{ url()->current() }}" class="w-100">
                            @csrf
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="first_name">{{ __('first name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input id="first_name" class="form-control" type="text" name="first_name"
                                                placeholder="{{ __('first name') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="last_name">{{ __('last name') }}<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="last_name" type="text" name="last_name"
                                                placeholder="{{ __('last name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="phone">{{ __('phone') }}</label>
                                            <input class="form-control" id="phone" type="text" name="mobile"
                                                placeholder="{{ __('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email">{{ __('email') }}<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="{{ __('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="formFile">{{ __('choose image') }}</label>
                                            <input class="form-control" id="formFile" type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 mt-4 d-flex gap-3 checkbox-checked">
                                            <label class="form-label" for="">{{ __('gender') }}<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" id="male" type="radio" value="male"
                                                    name="gender">
                                                <label class="form-check-label mb-0" for="male">{{ __('male') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" id="female" value="female" type="radio"
                                                    name="gender" checked="">
                                                <label class="form-check-label mb-0"
                                                    for="female">{{ __('female') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="">
                                            <button class="btn btn-primary" type="submit" id="btn_submit">
                                                {{ __('save') }} </button>
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
    <!-- Container-fluid Ends-->
    </div>
    </div>
@endsection

@push('panel_js')
    <script src="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweet-alerts.init.js') }}"></script>
    <script src="{{ asset(config('constants.asset_path') . 'assets/panel/js/post.js') }}"></script>
@endpush
