@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/menu.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/style.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/vendors.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/custom.css')}}" rel="stylesheet"
          type="text/css"/>

    <script src="{{asset(config('constants.asset_path').'assets/front/js/form/modernizr.js')}}"></script>
    <!-- DataTables -->
    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/css/vendors/datatables.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .form-wizered {
            padding: 50px 70px;
            background-image: url({{asset(config('constants.asset_path').'assets/front/img/survey/bg.jpg')}});
            background-size: cover;
            min-height: 100vh;
        }

        .content-right {
            background-color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card mt-4 create_appointment_card ">
                    <div class="card-body">
                        <form id="form" method="{{isset($item) ? 'POST' : 'POST'}}"
                              to="{{url()->current()}}"
                              url="{{url()->current()}}" class="w-100">
                            @csrf
                            <input type="hidden" name="voice" id="voice">
                            <input type="hidden" name="medications_voice"
                                   id="medications_voice">
                            <input type="hidden" name="compliant_voice" id="compliant_voice">
                            <input id="website" name="website" type="text" value="">
                            <div id="middle-wizard">
                                <div class="step">
                                    <h3 class="main_question"><strong>1/3</strong></h3>
                                    <div class="row mb-3">
                                        <ul class="nav nav-pills mb-3 ms-2" id="pills-tab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active"
                                                        id="pills-home-tab"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#pills-home"
                                                        type="button" role="tab"
                                                        aria-controls="pills-home"
                                                        aria-selected="true">{{__('write your message')}}</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#pills-profile"
                                                        type="button" role="tab"
                                                        aria-controls="pills-profile"
                                                        aria-selected="false">{{__('upload voice')}}</button>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active"
                                                 id="pills-home" role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                    <textarea name="message" style="min-height: 145px" class="form-control"
                                              placeholder="{{__('write your message')}}"></textarea>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-profile-tab">
                                                <div class="music">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                        <p> {{__('upload voice')}} </p>
                                                                        <input
                                                                            name="voice"
                                                                            type="file"
                                                                            multiple=""
                                                                            class="upload__inputfile">
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="upload__img-wrap2"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-contact"
                                                 role="tabpanel"
                                                 aria-labelledby="pills-contact-tab">...
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="customState-wizard">{{ __('doctor') }}<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="customState-wizard" name="doctor_id">
                                                    <option selected="" disabled=""
                                                            value="">{{ __('select doctor') }}</option>
                                                    @foreach($doctors as $doctor)
                                                        <option
                                                            value="{{ $doctor->id }}"> {{ $doctor->first_name . ' ' .  $doctor->last_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="customState-wizard">{{ __('specialize') }}<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="customState-wizard"
                                                        name="specialize_id">
                                                    <option selected="" disabled=""
                                                            value="">{{ __('select specialize') }}</option>
                                                    @foreach($specializes as $specialize)
                                                        <option
                                                            value="{{ $specialize->id }}"> {{ $specialize->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{__('urgent')}} <span
                                                        class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group radio_input">
                                                            <label
                                                                class="container_radio">{{__('yes')}}
                                                                <input type="radio"
                                                                       name="urgent"
                                                                       value="1"
                                                                       class="required">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label
                                                                class="container_radio">{{__('no')}}
                                                                <input type="radio"
                                                                       name="urgent"
                                                                       value="0"
                                                                       class="required">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div
                                                            class="form-group female_status d-none">
                                                            <select name="breastfeeding_status"
                                                                    class="form-control">
                                                                <option
                                                                    value="pregnant">{{__('pregnant')}}</option>
                                                                <option
                                                                    value="breastfeeding">{{__('no pregnancy')}}</option>
                                                                <option
                                                                    value="not_breastfeeding">{{__('breastfeeding')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>{{__('name')}} <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="full_name"
                                                       class="form-control"
                                                       placeholder="{{__('name')}}">
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>{{__('gender')}} <span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group radio_input">
                                                            <label
                                                                class="container_radio">{{__('male')}}
                                                                <input type="radio"
                                                                       name="gender"
                                                                       value="male"
                                                                       class="required">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label
                                                                class="container_radio">{{__('female')}}
                                                                <input type="radio"
                                                                       name="gender"
                                                                       value="female"
                                                                       class="required">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div
                                                            class="form-group female_status d-none">
                                                            <select name="breastfeeding_status"
                                                                    class="form-control">
                                                                <option
                                                                    value="pregnant">{{__('pregnant')}}</option>
                                                                <option
                                                                    value="breastfeeding">{{__('no pregnancy')}}</option>
                                                                <option
                                                                    value="not_breastfeeding">{{__('breastfeeding')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{__('age')}}</label>
                                                <input type="number" name="age"
                                                       class="form-control"
                                                       placeholder="25">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{__('weight')}}</label>
                                                <input type="number" name="weight"
                                                       class="form-control"
                                                       placeholder="70">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>{{__('height')}}</label>
                                                <input type="number" name="height"
                                                       class="form-control"
                                                       placeholder="110">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('place of residence')}}</label>
                                                <input type="text" name="country"
                                                       class="form-control"
                                                       placeholder="{{__('ex , Syria')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('nationality')}}</label>
                                                <input type="text" name="nationality"
                                                       class="form-control"
                                                       placeholder="{{__('Ex , Syrian')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('phone number')}}</label>
                                                <input type="text" name="phone_number"
                                                       class="form-control"
                                                       placeholder="012********">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('email')}}</label>
                                                <input type="email" name="email"
                                                       class="form-control"
                                                       placeholder="example@gmail.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('your job')}}</label>
                                                <input type="text" name="work"
                                                       class="form-control"
                                                       placeholder="{{__('engineer')}}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>{{__('are you smoker ?')}}</label>
                                                    <div class="form-group radio_input">
                                                        <label
                                                            class="container_radio">{{__('yes')}}
                                                            <input type="radio" name="is_smoker"
                                                                   value="1" class="required">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label
                                                            class="container_radio">{{__('no')}}
                                                            <input type="radio" name="is_smoker"
                                                                   value="0" class="required">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>{{__('do you drink alcohol ?')}}
                                                        <span
                                                            class="text-danger">*</span></label>
                                                    <div class="form-group radio_input">
                                                        <label
                                                            class="container_radio">{{__('yes')}}
                                                            <input type="radio"
                                                                   name="drink_alcohol"
                                                                   value="1" class="required">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label
                                                            class="container_radio">{{__('no')}}
                                                            <input type="radio"
                                                                   name="drink_alcohol"
                                                                   value="0" class="required">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>{{__('have you had surgeries')}} <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group radio_input">
                                                <label
                                                    class="container_radio">{{__('yes')}}
                                                    <input type="radio" name="had_surgeries"
                                                           value="1" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label
                                                    class="container_radio">{{__('no')}}
                                                    <input type="radio" name="had_surgeries"
                                                           value="0" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <textarea style="min-height: 145px"
                                                      class="form-control surgeries_text"
                                                      name="surgeries_names"
                                                      placeholder="{{__('write the names of the surgical procedures')}}"></textarea>
                                        </div>


                                        <div class="col-md-6">
                                            <label>{{__('do you have an allergy to certain medications')}}
                                                <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group radio_input">
                                                <label
                                                    class="container_radio">{{__('yes')}}
                                                    <input type="radio"
                                                           name="medications_allergy" value="1"
                                                           class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label
                                                    class="container_radio">{{__('no')}}
                                                    <input type="radio"
                                                           name="medications_allergy" value="0"
                                                           class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <textarea style="min-height: 145px"
                                                      class="form-control surgeries_text"
                                                      name="allergy_medications_names"
                                                      placeholder="{{__('write down the names of the medications')}}"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <label>{{__('do you suffer from hereditary diseases ?')}}
                                                <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group radio_input">
                                                <label
                                                    class="container_radio">{{__('yes')}}
                                                    <input type="radio"
                                                           name="had_hereditary_diseases"
                                                           value="1" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label
                                                    class="container_radio">{{__('no')}}
                                                    <input type="radio"
                                                           name="had_hereditary_diseases"
                                                           value="0" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <textarea style="min-height: 145px"
                                                      class="form-control"
                                                      name="hereditary_diseases_names"
                                                      placeholder="{{__('write the names of the diseases')}}"></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label>{{__('do you suffer from chronic diseases ?')}}
                                                <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group radio_input">
                                                <label
                                                    class="container_radio">{{__('yes')}}
                                                    <input type="radio"
                                                           name="has_chronic_diseases"
                                                           value="1" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label
                                                    class="container_radio">{{__('no')}}
                                                    <input type="radio"
                                                           name="has_chronic_diseases"
                                                           value="0" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <textarea style="min-height: 145px"
                                                      class="form-control"
                                                      name="chronic_diseases"
                                                      placeholder="{{__('write the names of the chronic diseases')}}"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>{{__('do you take medications regularly ?')}}
                                                <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group radio_input">
                                                <label
                                                    class="container_radio">{{__('yes')}}
                                                    <input type="radio"
                                                           name="take_medications_regularly"
                                                           value="1" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label
                                                    class="container_radio">{{__('no')}}
                                                    <input type="radio"
                                                           name="take_medications_regularly"
                                                           value="0" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <textarea style="min-height: 145px"
                                                      class="form-control"
                                                      name="taking_medications"
                                                      placeholder="{{__('write the names of the medications')}}"></textarea>

                                            <div class="upload-btn">
                                                <label class="mb-3">
                                                    {{__('take a picture of the medication')}}
                                                </label>
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <p>{{__('upload image')}} </p>
                                                            <input name="regularly_medications_image"
                                                                   type="file" multiple=""
                                                                   data-max_length="20"
                                                                   class="upload__inputfile upload__inputfile23"
                                                                   accept="image/*">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap23"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="step">
                                    <h3 class="main_question">
                                        <strong>2/3</strong>

                                    </h3>
                                    <div class="alert alert-primary">
                                        {{__('write or record an audio clip that does not go 5 minutes beyond your medical complaint and your purpose for seeking advice')}}
                                    </div>

                                    <div class="form-group">
                                        <label
                                            class="mb-3"> {{__('put your medical complaint')}}  </label>
                                        <textarea name="compliant" class="form-control"
                                                  style="height:100px;"
                                                  placeholder="{{__('put your medical complaint')}}"
                                                  onkeyup="getVals(this, 'additional_message');"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="hero">
                                            <div class="music">
                                                <label
                                                    class="mb-3">{{__('download an audio clip of your complaint or a live recording')}}   </label>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="col-md-10">
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                        <p> {{__('upload voice')}} </p>
                                                                        <input
                                                                            name="compliant_voice"
                                                                            type="file"
                                                                            multiple=""
                                                                            class="upload__inputfile">
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="upload__img-wrap2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="col-md-6 upload_voice">
                                                        <input type="file" id="file" onchange="displayFileName()" />
                                                        <label for="file" class="btn-1"><i class="fa-solid fa-upload"></i> Upload File</label>
                                                    </div>
                                                    <div id="file-name"></div>
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit step">
                                    <h3 class="main_question">
                                        <strong>3/3</strong>{{__('upload your reports')}}
                                    </h3>
                                    <p>{{__('the name in the reports must match the name of the consulting applicant')}}</p>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="upload-btn">
                                                            <label
                                                                class="mb-3"> {{__('upload your files for your tests medical')}}</label>
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                        <p> {{__('upload images & files')}} </p>
                                                                        <input
                                                                            name="test_medical_attachment[]"
                                                                            type="file"
                                                                            multiple=""
                                                                            class="upload__inputfile">
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="upload__img-wrap2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="upload-btn">
                                                            <label class="mb-3">
                                                                {{__('upload your images for your X-rays with reports')}}
                                                            </label>
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                        <p>{{__('upload images')}}</p>
                                                                        <input
                                                                            name="x_rays_images[]"
                                                                            type="file"
                                                                            multiple=""
                                                                            data-max_length="20"
                                                                            class="upload__inputfile upload__inputfile2"
                                                                            accept="image/*">
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="upload__img-wrap"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="alert alert-primary">
                                                {{__('to upload a CT or MRI CD, or any CD, it must be compressed into files using one of the programs on the internet. If you are unable to do so, you can record a video of the CD from the computer screen and then upload it.')}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label
                                                            class="mb-3"> {{__('upload your video for your CD with reports')}} </label>
                                                        <div class="upload__box">
                                                            <div class="upload__btn-box">
                                                                <label class="upload__btn">
                                                                    <p>{{__('upload reports')}}</p>
                                                                    <input
                                                                        name="cd_reports_video"
                                                                        type="file" multiple=""
                                                                        data-max_length="20"
                                                                        class="upload__inputfile1 upload__inputfile"
                                                                        accept="video/*">
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="upload__file-wrap"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="upload-btn">
                                                        <label class="mb-3">
                                                            {{__('take a picture of the cd')}}
                                                        </label>
                                                        <div class="upload__box">
                                                            <div class="upload__btn-box">
                                                                <label class="upload__btn">
                                                                    <p>{{__('upload images')}} </p>
                                                                    <input name="cd_reports_images[]"
                                                                           type="file" multiple=""
                                                                           data-max_length="20"
                                                                           class="upload__inputfile upload__inputfile4"
                                                                           accept="image/*">
                                                                </label>
                                                            </div>
                                                            <div class="upload__img4-wrap"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label
                                                class="mb-3">{{__('write the tests and medications you are taking')}}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea name="taking_medications"
                                                      class="form-control" style="height:100px;"
                                                      placeholder="{{__('your medications')}}"
                                                      onkeyup="getVals(this, 'additional_message');"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="hero">
                                                <div class="music">
                                                    <label class="mb-3">{{__('If you want to record voice')}}</label>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="upload__box">
                                                                <div class="upload__btn-box">
                                                                    <label class="upload__btn">
                                                                        <p> {{__('upload voice')}} </p>
                                                                        <input
                                                                            name="medications_voice"
                                                                            type="file"
                                                                            multiple=""
                                                                            class="upload__inputfile">
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="upload__img-wrap2"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="upload-btn">
                                                <label class="mb-3">
                                                    {{__('take a picture of the medications')}}
                                                </label>
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <p>{{__('upload images')}} </p>
                                                            <input name="medications_images[]"
                                                                   type="file" multiple=""
                                                                   data-max_length="20"
                                                                   class="upload__inputfile upload__inputfile4"
                                                                   accept="image/*">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img4-wrap"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="bottom-wizard">
                                <button id="submit-btn" type="submit" name="process"
                                        class="btn btn-success submit">{{__('save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

@push('panel_js')

    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweet-alerts.init.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/post.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/create_appointment.js')}}"></script>

@endpush
