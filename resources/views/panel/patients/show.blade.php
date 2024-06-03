@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])
@push('panel_css')
    <!-- DataTables -->
    <link href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/datatables.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                    <div class="card hovercard text-center mt-4">

                        <div class="info">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                                    <div class="row">
                                        <div class="col-md-6 mt-5">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-envelope"></i> {{__('email')}}</h6><span>{{ $patient->email }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-5">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-calendar"></i> {{__('created at')}}</h6><span>{{ date('d.m.y H:i', strtotime($patient->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                                    <div class="user-image">
                                        <div class="avatar">
                                            @if(!empty($patient->image)))
                                                <img alt="" src="{{ asset(config('constants.asset_path') . 'uploads/patients/' . $patient->image) }}">
                                            @else
                                                <img alt="" src="{{ asset(config('constants.asset_path') . 'assets/panel/images/default_user.png') }}" >
                                            @endif
                                        </div>
                                    </div>
                                    <div class="user-designation">
                                        <div class="title">{{ $patient->first_name . ' ' . $patient->last_name }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                                    <div class="row">
                                        <div class="col-md-6 mt-5">
                                            <div class="ttl-info text-start">
                                                <h6><i class="fa fa-phone"></i> {{ __('phone') }}</h6><span>{{ $patient->mobile }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0 card-no-border">
                            <h4>{{ __('appointments') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th>{{ __('doctor') }}</th>
                                        <th>{{ __('urgent') }}</th>
                                        <th>{{ __('notes') }}</th>
                                        <th>{{ __('created at') }}</th>
                                        <th>{{ __('action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patient->patientAppointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name }}</td>
                                            <td>
                                                @if($appointment->urgent)
                                                    <span class="badge badge-success">{{ __('yes') }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ __('no') }}</span>
                                                @endif

                                            </td>
                                            <td>{{ $appointment->notes }}</td>
                                            <td>{{ date('d.m.y H:i', strtotime($appointment->created_at)) }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a></li>
                                                    <li class="edit"> <a href="{{route('panel.appointments.show',$appointment->id)}}"><i class="fa fa-eye"></i></a></li>
                                                    <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('panel_js')
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
@endpush
