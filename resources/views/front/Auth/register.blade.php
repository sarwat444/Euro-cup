@extends('front.layouts')
@push('title', __('front.Register'))
@push('styles')
  <!-- Include Select2 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Include jQuery -->
  <style>
    .select2-selection
    {
        height: 46px !important;
        padding-top: 8px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow
    {
        top: 8px;
    }
  </style>
@endpush
@section('content')
    <div class="signup-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 pl-0">
                    <div class="signup-left">
                        <img src="assets/img/signup-bg.jpg" alt="SignUp">
                    </div>
                </div>
                <div class="col-lg-6 ptb-100">
                    <div class="signup-item">
                        <div class="signup-head">
                            <h2>{{__('front.Welcome, Sign Up is Easy!')}}</h2>
                            <p>{{__('front.Fill out the form below to start your journey with us.')}}</p>
                            <p>{{__('front.Already have an account?')}}
                                <a href="{{route('login')}}">{{__('front.Login')}}</a>
                            </p>
                        </div>
                        <div class="signup-form">
                            <form method="post" action="{{route('storeUser')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="{{__('front.First Name')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control" placeholder="{{__('front.Last Name')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select  class="form-control mySelect" name="code_country">
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->phone_code}}">{{$country->phone_code}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="mobile" class="form-control" placeholder="{{__('front.Phone Number')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" placeholder="{{__('front.Your Email')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="country_id" class="form-control mySelect">
                                                        <option selected disabled> {{__('front.select country')}}</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input name="state" type="text" class="form-control" placeholder="{{__('front.State')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input name="plz_code" type="text" class="form-control" placeholder="{{__('front.Postal Code')}} ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input name="street" type="text" class="form-control" placeholder="{{__('front.Street')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('front.Password') }}">
                                                <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                                    <i class="icofont-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 d-flex">
                                                    <div class="form-check me-2">
                                                        <input class="form-check-input" type="radio" value="0" name="gender" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{__('front.Male')}}
                                                        </label>
                                                    </div>
                                                    <div class="form-check me-2">
                                                        <input class="form-check-input" type="radio"  value="1"  name="gender" id="flexRadioDefault2" >
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            {{__('front.Female')}}
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn signup-btn">{{__('front.Register')}} </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('.mySelect').select2();
    });
</script>
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
                        toastr.success('User Added  Successful'); // Assuming you have Toastr library included
                        window.location.href = '{{route('home')}}'; // Change '/success-page' to your actual success page URL
                    },
                    error: function (xhr, status, error) {
                        var errors = JSON.parse(xhr.responseText).errors;
                        $.each(errors, function (key, value) {
                            toastr.error(value[0], 'Validation Error');
                        });
                    }
                });
            });

            /* View Password */
            $('#togglePassword').click(function() {
                var passwordField = $('#password');
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $('#togglePassword i').removeClass('icofont-eye').addClass('icofont-eye-blocked');
                } else {
                    passwordField.attr('type', 'password');
                    $('#togglePassword i').removeClass('icofont-eye-blocked').addClass('icofont-eye');
                }
            });
        });
    </script>
@endpush
