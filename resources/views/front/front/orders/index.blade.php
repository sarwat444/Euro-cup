@extends('front.layouts')
@push('title', __('front.Category Questions'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/orders.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="page-title-area page-title-two">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{__('front.My Orders')}}</h2>
                    <ul>
                        <li>
                            <a href="{{route('home')}}">
                                {{__('front.home')}}
                            </a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{__('front.My Orders')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <span><i class="icofont-calendar"></i> </span>{{__('front.my appointments')}}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <i class="icofont-basket"></i> {{__('front.My Orders')}}
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row top-head">
                    <div class="col-md-1 pt-3">
                    </div>

                    <div class="col-md-2 pt-3">
                        {{__('front.name')}}
                    </div>
                    <div class="col-md-3 text-center pt-3">
                        {{__('front.Specializations')}}
                    </div>
                    <div class="col-md-2 text-center pt-3">
                        {{__('front.Reservation Date')}}
                    </div>
                    <div class="col-md-3 text-center pt-3">
                        {{__('front.Location')}}
                    </div>
                </div>
                @forelse($appointements as $appointment)
                    <div class="card mb-2 appointment-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    @if(!empty($appointment->doctor->image) && File::exists(public_path(config('constants.asset_path').'uploads/doctors/'.$appointment->doctor->image)))
                                        <img class="img-thumbnail"
                                             src="{{ asset(config('constants.asset_path').'uploads/doctors/'.$appointment->doctor->image) }}"
                                             style="height: 60px ">
                                    @else
                                        <img class="img-thumbnail"
                                             src="{{ asset(config('constants.asset_path').'assets/front/img/default.png') }}"
                                             style="height: 60px ">
                                    @endif
                                </div>

                                <div class="col-md-2  pt-3">
                                    <span class="text-info"
                                          style="font-weight: bold">{{__('front.Dr:')}} {{$appointment->doctor->first_name}}</span>
                                </div>
                                <div class="col-md-3 text-center pt-3">
                                    {{$appointment->doctor->doctorInfo->specializeion->name }}
                                </div>
                                <div class="col-md-2 text-center pt-3">
                                    {{$appointment->created_at->format('d.m.Y')}}
                                </div>
                                <div class="col-md-2 text-center pt-3">
                                    <i class="icofont-location-pin"></i> {{$appointment->doctor->doctorInfo->address}}
                                </div>
                                <div class="col-md-2 text-center pt-3 ">
                                    <a href="{{route('appointment_details' , $appointment->id)}}" class="btn btn-primary appointment_details">  <i class="icofont-eye"></i> {{__('front.details')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="card">
                        <div class="card-body">
                            <span class="text-danger text-center">{{__('front.No Appointments')}}</span>
                        </div>
                    </div>
                @endforelse
                {{ $appointements->links('pagination::bootstrap-4') }}

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row top-head">
                    <div class="col-md-1 pt-3">
                        #
                    </div>
                    <div class="col-md-4 pt-3">
                        {{__('front.order')}}
                    </div>
                    <div class="col-md-3 text-center pt-3">
                        {{__('front.Request Date')}}
                    </div>

                    <div class="col-md-3 text-center pt-3">
                        {{__('front.control')}}
                    </div>
                </div>
                @forelse($orders  as $order)
                    <div class="card mb-2 appointment-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    {{$order->id}}
                                </div>
                                <div class="col-md-4  pt-3">
                                    {{ strlen($order->order) > 100 ? substr($order->order, 0, 100) . '...' : $order->order }}
                                </div>
                                <div class="col-md-3 text-center pt-3">
                                    {{$order->created_at->format('d.m.Y')}}
                                </div>
                                <div class="col-md-3 text-center pt-3 d-flex">
                                    <form class="me-2" action="{{ route('delete-order', $order->id) }}"
                                          method="POST">@csrf @method('delete')
                                        <a class="btn btn-danger text-muted font-size-20 confirm-delete  control-btn">
                                            <i class="icofont-trash"></i>  {{__('front.Delete')}}
                                        </a>
                                    </form>
                                    <a  href="{{route('orders_details' , $order->id )}}" class="btn btn-primary me-2 control-btn"><i class="icofont-eye"></i> {{__('front.details')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="card">
                        <div class="card-body">
                            <span class="text-danger text-center">{{__('front.No Orders')}}</span>
                        </div>
                    </div>
                @endforelse
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    @include('front.orders.models.appointment_details')

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('.confirm-delete').click(function (event) {
            let form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: "{{__('front.Are You Sure To Delete')}}",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "green",
                cancelButtonColor: "red",
                confirmButtonText: "{{__('front.Yes')}}",
                cancelButtonText: "{{__('front.No')}}",
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
