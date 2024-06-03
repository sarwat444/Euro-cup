@extends('front.layouts')
@push('title', __('front.Medical Supplies'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/style.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="page-title-area page-title-two">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{__('front.Medical Supplies')}}</h2>
                    <ul>
                        <li>
                            <a href="{{route('home')}}">{{__('front.home')}}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{__('front.Medical Supplies')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="appointment-area-two">
        <div class="container">
            <div class="row align-items-center appointment-wrap-two">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                    <div class="appointment-item appointment-item-two">
                        <div class="appointment-form">
                            <form method="post" action="{{route('storeMedicalSupplies')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="write_label" ><span class="text-danger" style="float: left"> * </span>{{__('front.Write your medical supplies you want')}}
                                            </label>
                                        <textarea class="form-control mb-3" rows="5" name="order"></textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i class="icofont-google-map"></i>
                                            <label>{{__('front.Country')}}</label>
                                            <select class="form-control" name="country_id">
                                                <option selected disabled>{{__('front.Country')}}</option>
                                                @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i class="icofont-google-map"></i>
                                            <label>{{__('front.State')}}</label>
                                            <input name="city" type="text" class="form-control"
                                                   placeholder="{{__('front.State')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i class="icofont-opposite"></i>
                                            <label>{{__('front.PLZ code')}}</label>
                                            <input name="plz_code" type="text" class="form-control"
                                                   placeholder="{{__('front.PLZ code')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i class="icofont-map-pins"></i>
                                            <label>{{__('front.Street')}}</label>
                                            <input name="street" type="text" class="form-control"
                                                   placeholder="{{__('front.Street')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i class="icofont-whatsapp"></i>
                                            <label>{{__('front.Whatsapp')}} </label>
                                            <input name="whats_number" type="text" class="form-control"
                                                   placeholder="{{__('front.Whatsapp')}} ">
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn appointment-btn">{{__('front.Send')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        toastr.success('Order Send Successfuly'); // Assuming you have Toastr library included
                        window.location.href = '{{route('orders')}}'; // Change '/success-page' to your actual success page URL
                    },
                    error: function (xhr, status, error) {
                        var errors = xhr.responseJSON;
                        toastr.error(errors.message);
                    }
                });
            });
        });
    </script>
@endpush

