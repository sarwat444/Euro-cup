@extends('front.layouts')
@push('title', __('front.Book Appointment'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/menu.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/style.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/vendors.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/form/custom.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="{{asset(config('constants.asset_path').'assets/front/js/form/modernizr.js')}}"></script>
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
    <div class="modal fade" id="LoadingModel" data-bs-backdrop="static" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-body LoadingModelBody">
                    <div class="text-center mb-4 mt-4">
                        <div class="spinner-border text-info d-none" style="width: 4rem; height: 4rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <p class="text-center" style="font-size: 20px ">{{__('front.uploading Your Data')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid full-height form-wizered">
        <div class="content-right" id="start">
            <div id="wizard_container" class="my-auto">
                <div id="top-wizard">
                    <div id="progressbar"></div>
                </div>
                <!-- /top-wizard -->
                <form id="wrapped" method="POST" action="{{route('save_appointment')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="voice" id="voice">
                    <input type="hidden" name="medications_voice" id="medications_voice">
                    <input type="hidden" name="compliant_voice" id="compliant_voice">
                    <input type="hidden" name="urgent" value="{{$urgent}}">

                    <input id="website" name="website" type="text" value="">
                    <input type="hidden" name="doctor_id" value="{{$doctor_id}}">
                    <input type="hidden" name="specialize_id" value="{{$specializeion->doctorInfo->specializeion->id}}">
                    <!-- Leave for security protection, read docs for details -->
                    <div id="middle-wizard">
                        <div class="step">
                            <h1 class="text-center main-title mt-4">{{__('front.Medical Report')}}</h1>
                            <h3 class="main_question"><strong>1/3</strong></h3>
                            <div class="instractions">
                                <h3><span class="text-danger">*</span> {{__('front.Please fill out this form')}}</h3>
                                <p>
                                    <i class="icofont-arrow-right"></i> {{__('front.It is best to fill out the entire form to save your medical file, so that the consultation will be more accurate')}}
                                </p>
                                <p>
                                    <i class="icofont-arrow-right"></i> {{__('front.We assure that all your information is confidential')}}
                                </p>
                                <p>
                                    <i class="icofont-arrow-right"></i> {{__('front.If you encounter any difficulty, you can record the information audio, and do not hesitate to ask us via message or audio recording')}}
                                </p>
                            </div>
                            <div class="row mb-3">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home"
                                                aria-selected="true">{{__('front.Write your message')}}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile"
                                                aria-selected="false">{{__('front.Recording Voice')}}</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
                                        <textarea name="message" style="min-height: 145px" class="form-control"
                                                  placeholder="{{__('front.Write your message')}}"></textarea>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                        <div class="music">
                                            <div class="row">
                                                <div class="col-md-1 record_voice">
                                                        <span class="mic-toggle" id="mic"><i
                                                                class="fa-solid fa-microphone"></i></span>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="track">
                                                        <img id="play_btn"
                                                             src="{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}">
                                                        <div id="waveform"></div>
                                                        <span class="text-danger" id="delete_btn"
                                                              style="display: none;">  <i
                                                                class="icofont-close-circled"></i></span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                         aria-labelledby="pills-contact-tab">...
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.Name')}} <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="full_name" class="form-control required"
                                               placeholder="{{__('front.Name')}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.gender')}} <span
                                                class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group radio_input">
                                                    <label class="container_radio">{{__('front.Male')}}
                                                        <input type="radio" name="gender" value="male" class="required">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="container_radio">{{__('front.Female')}}
                                                        <input type="radio" name="gender" value="female"
                                                               class="required">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group female_status d-none">
                                                    <select name="breastfeeding_status" class="form-control">
                                                        <option value="pregnant">{{__('front.Pregnant')}}</option>
                                                        <option
                                                            value="breastfeeding">{{__('front.No pregnancy')}}</option>
                                                        <option
                                                            value="not_breastfeeding">{{__('front.Breastfeeding')}}</option>
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
                                        <label>{{__('front.age')}}</label>
                                        <input type="number" name="age" class="form-control required" placeholder="25">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('front.weight')}}</label>
                                        <input type="number" name="weight" class="form-control required"
                                               placeholder="70">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{__('front.height')}}</label>
                                        <input type="number" name="height" class="form-control required"
                                               placeholder="110">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.Place of residence')}}</label>
                                        <input type="text" name="country" class="form-control required"
                                               placeholder="{{__('front.Ex , Syria')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.Nationality')}}</label>
                                        <input type="text" name="nationality" class="form-control required"
                                               placeholder="{{__('front.Ex , Syrian')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.Phone Number')}}</label>
                                        <input type="text" name="phone_number" class="form-control required"
                                               placeholder="012********">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.Email')}}</label>
                                        <input type="email" name="email" class="form-control required"
                                               placeholder="example@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.Your Job')}}</label>
                                        <input type="text" name="work" class="form-control required"
                                               placeholder="{{__('front.engineer')}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>{{__('front.Are You Smoker ?')}}</label>
                                            <div class="form-group radio_input">
                                                <label class="container_radio">{{__('front.Yes')}}
                                                    <input type="radio" name="is_smoker" value="1" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container_radio">{{__('front.No')}}
                                                    <input type="radio" name="is_smoker" value="0" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>{{__('front.Do you drink alcohol ?')}} <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group radio_input">
                                                <label class="container_radio">{{__('front.Yes')}}
                                                    <input type="radio" name="drink_alcohol" value="1" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container_radio">{{__('front.No')}}
                                                    <input type="radio" name="drink_alcohol" value="0" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-2">
                                    <label>{{__('front.Have you had surgeries')}} <span
                                            class="text-danger">*</span></label>
                                    <div class="form-group radio_input">
                                        <label class="container_radio">{{__('front.Yes')}}
                                            <input type="radio" name="had_surgeries" value="1" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container_radio">{{__('front.No')}}
                                            <input type="radio" name="had_surgeries" value="0" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <textarea style="min-height: 145px" class="form-control surgeries_text"
                                              name="surgeries_names"
                                              placeholder="{{__('front.Write the names of the surgical procedures')}}"></textarea>
                                </div>


                                <div class="col-md-6 mb-2">
                                    <label>{{__('front.Do you have an allergy to certain medications')}} <span
                                            class="text-danger">*</span></label>
                                    <div class="form-group radio_input">
                                        <label class="container_radio">{{__('front.Yes')}}
                                            <input type="radio" name="medications_allergy" value="1" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container_radio">{{__('front.No')}}
                                            <input type="radio" name="medications_allergy" value="0" class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <textarea style="min-height: 145px" class="form-control surgeries_text"
                                              name="allergy_medications_names"
                                              placeholder="{{__('front.Write down the names of the medications')}}"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label>{{__('front.Do you suffer from hereditary diseases?')}} <span
                                            class="text-danger">*</span></label>
                                    <div class="form-group radio_input">
                                        <label class="container_radio">{{__('front.Yes')}}
                                            <input type="radio" name="had_hereditary_diseases" value="1"
                                                   class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container_radio">{{__('front.No')}}
                                            <input type="radio" name="had_hereditary_diseases" value="0"
                                                   class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <textarea style="min-height: 145px" class="form-control"
                                              name="hereditary_diseases_names"
                                              placeholder="{{__('front.Write the names of the diseases')}}"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label>{{__('front.Do you take medications regularly?')}} <span
                                            class="text-danger">*</span></label>
                                    <div class="form-group radio_input">
                                        <label class="container_radio">{{__('front.Yes')}}
                                            <input type="radio" name="take_medications_regularly" value="1"
                                                   class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container_radio">{{__('front.No')}}
                                            <input type="radio" name="take_medications_regularly" value="0"
                                                   class="required">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <textarea style="min-height: 145px" class="form-control" name="taking_medications"
                                              placeholder="{{__('front.Write the names of the medications')}}"></textarea>

                                    <div class="upload-btn">
                                        <label class="mb-3">
                                            {{__('front.Take a picture of the medication')}}
                                        </label>
                                        <div class="upload__box">
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>{{__('front.Upload images')}} </p>
                                                    <input name="medications_images[]" type="file" multiple=""
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


                            <div class="form-group terms">
                                <label
                                    class="container_check">{{__('front.Doctor has right to download and view all the patient files.')}}
                                    <input type="checkbox" name="terms" value="Yes" class="required">
                                    <span class="checkmark"></span>
                                </label>
                            </div>


                        </div>
                        <div class="step">
                            <h1 class="text-center main-title mt-4">{{__('front.medical complaint')}}</h1>
                            <h3 class="main_question">
                                <strong>2/3</strong>

                            </h3>
                            <div class="alert alert-primary">
                                {{__('front.Write or record an audio clip that does not go 5 minutes beyond your medical complaint and your purpose for seeking advice')}}
                            </div>

                            <div class="form-group">
                                <label class="mb-3"> {{__('front.Put your medical complaint')}}  </label>
                                <textarea name="compliant" class="form-control" style="height:100px;"
                                          placeholder="{{__('front.Put your medical complaint')}}"
                                          onkeyup="getVals(this, 'additional_message');"></textarea>
                            </div>

                            <div class="col-md-6">
                                <div class="hero">
                                    <div class="music">
                                        <label
                                            class="mb-3">{{__('front.Download an audio clip of your complaint or a live recording')}}   </label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="col-md-5 record_voice2">
                                                <span class="mic-toggle" id="mic2"><i
                                                        class="fa-solid fa-microphone"></i></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="track2">
                                                        <img id="play_btn2"
                                                             src="{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}">
                                                        <div id="waveform2"></div>
                                                        <span class="text-danger" id="delete_btn2"
                                                              style="display: none;">  <i
                                                                class="icofont-close-circled"></i></span>
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
                            <h1 class="text-center main-title mt-4">{{__('front.Medical investigations and reports')}}</h1>

                            <h3 class="main_question"><strong>3/3</strong>{{__('front.Upload Your Reports')}}</h3>
                            <p>{{__('front.The name in the reports must match the name of the consulting applicant')}}</p>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="upload-btn">
                                                    <label
                                                        class="mb-3"> {{__('front.Upload your files for your tests medical')}}</label>
                                                    <div class="upload__box">
                                                        <div class="upload__btn-box">
                                                            <label class="upload__btn">
                                                                <p> {{__('front.Upload images & Files')}} </p>
                                                                <input name="test_medical_attachment[]" type="file"
                                                                       multiple=""
                                                                       class="upload__inputfile">
                                                            </label>
                                                        </div>
                                                        <div class="upload__img-wrap2"></div>
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
                                                        {{__('front.Upload your images for your X-rays with reports')}}
                                                    </label>
                                                    <div class="upload__box">
                                                        <div class="upload__btn-box">
                                                            <label class="upload__btn">
                                                                <p>{{__('front.Upload images')}}</p>
                                                                <input name="x_rays_images[]" type="file" multiple=""
                                                                       data-max_length="20"
                                                                       class="upload__inputfile upload__inputfile2"
                                                                       accept="image/*">
                                                            </label>
                                                        </div>
                                                        <div class="upload__img-wrap"></div>
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
                                        {{__('front.To upload a CT or MRI CD, or any CD, it must be compressed into files using one of the programs on the internet. If you are unable to do so, you can record a video of the CD from the computer screen and then upload it.')}}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label
                                                    class="mb-3"> {{__('front.Upload your video for your CD with reports')}} </label>
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <p>{{__('front.Upload Reports')}}</p>
                                                            <input name="cd_reports_video" type="file" multiple=""
                                                                   data-max_length="20"
                                                                   class="upload__inputfile1 upload__inputfile"
                                                                   accept="video/*,image/*,application/pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                                        </label>
                                                    </div>
                                                    <div class="upload__file-wrap"></div>
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
                                                    {{__('front.Take a picture of the medication')}}
                                                </label>
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <p>{{__('front.Upload images')}} </p>
                                                            <input name="medications_images[]" type="file" multiple=""
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
                                    <label class="mb-3">{{__('front.Write the tests and medications you are taking')}}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="taking_medications" class="form-control" style="height:100px;"
                                              placeholder="{{__('front.Your medications')}}"
                                              onkeyup="getVals(this, 'additional_message');"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <div class="hero">
                                        <div class="music">
                                            <label class="mb-3">{{__('front.If you want to record voice')}}</label>
                                            <div class="row">
                                                <div class="col-md-2 record_voice3">
                                                    <span class="mic-toggle" id="mic3"><i
                                                            class="fa-solid fa-microphone"></i></span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="track3">
                                                        <img id="play_btn3"
                                                             src="{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}">
                                                        <div id="waveform3"></div>
                                                        <span class="text-danger" id="delete_btn3"
                                                              style="display: none;">  <i
                                                                class="icofont-close-circled"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward">{{__('front.Prev')}}</button>
                        <button type="button" name="forward" class="forward">{{__('front.Next')}}</button>
                        <button id="submit-btn" type="button" name="process"
                                class="submit">{{__('front.Save')}}</button>

                    </div>
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
    </div>
    <!-- /container-fluid -->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->

    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->
    <!-- Modal terms -->
    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>,
                        mei
                        ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro
                        ne
                        quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum
                        accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
                        sanctus, pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@push('scripts')
    <script src="{{asset(config('constants.asset_path').'assets/front/js/form/common_scripts.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/front/js/form/velocity.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/front/js/form/functions.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/front/js/form/survey_func.js')}}"></script>
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    <script>
        let recordedAudioBlob = null;
        let previousRecordedBlob = null; // To store the previous recording

        const mic_btn = document.querySelector('#mic');
        const track = document.querySelector('.track');
        mic_btn.addEventListener('click', ToggleMic);
        let can_record = false;
        let is_recording = false;
        let recorder = null;
        let chunks = [];
        let wavesurfer;

        function SetupStream(stream) {
            recorder = new MediaRecorder(stream);
            recorder.ondataavailable = e => {
                chunks.push(e.data);
            }
            recorder.onstop = e => {
                document.getElementById('delete_btn').style.display = 'block';
                var playBtn = document.getElementById('play_btn');

                const blob = new Blob(chunks, {type: "audio/ogg ; codecs=opus"})
                recordedAudioBlob = blob; // Store the blob in the global variable

                // If there was a previous recording, remove it
                if (previousRecordedBlob) {
                    URL.revokeObjectURL(URL.createObjectURL(previousRecordedBlob));
                }

                // Concatenate the new recording with the previous one, if any
                if (previousRecordedBlob) {
                    recordedAudioBlob = new Blob([previousRecordedBlob, recordedAudioBlob], {type: "audio/ogg ; codecs=opus"});
                }

                const audioUrl = window.URL.createObjectURL(recordedAudioBlob);
                const audioInput = document.getElementById('voice');
                audioInput.value = URL.createObjectURL(recordedAudioBlob);

                if (wavesurfer) {
                    wavesurfer.destroy();
                }
                wavesurfer = WaveSurfer.create({
                    container: '#waveform',
                    waveColor: '#ddd',
                    progressColor: '#03a0de',
                    barWidth: 4,
                    responsive: true,
                    barRadius: 4,
                    height: 90,
                    url: audioUrl,
                });

                playBtn.onclick = function () {
                    wavesurfer.playPause();
                    if (playBtn.src.includes("play.png")) {
                        playBtn.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/pause.png')}}";
                        document.getElementById('uploadForm').submit();
                    } else {
                        playBtn.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                    }
                }

                wavesurfer.on('finish', function () {
                    playBtn.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                    wavesurfer.stop();
                });

                track.style.display = 'flex';

                previousRecordedBlob = recordedAudioBlob;

                // Clear chunks array for the next recording
                chunks = [];
            }

            can_record = true;
        }

        function ToggleMic() {
            if (!can_record) return;
            is_recording = !is_recording;
            if (is_recording) {
                // Reset previous recorded blob
                previousRecordedBlob = null;
                recorder.start();
                mic_btn.classList.add("is-recording");
            } else {
                recorder.stop();
                mic_btn.classList.remove("is-recording");
            }
        }

        function setupAudio() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({audio: true})
                    .then(SetupStream)
                    .catch(err => {
                        console.error(err);
                        if (err.name === 'NotFoundError' || err.name === 'DevicesNotFoundError') {
                            alert('Please connect a microphone to your device.');
                        } else if (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError') {
                            alert('Please allow access to your microphone.');
                        } else if (err.name === 'NotReadableError' || err.name === 'TrackStartError') {
                            alert('Unable to access your microphone. Please make sure it is not in use by another application.');
                        } else {
                            alert('Error accessing microphone: ' + err.message);
                        }
                    });
            }
        }

        setupAudio();

        // Define the function to retrieve the recorded audio blob
        function getRecordedAudioBlob() {
            return recordedAudioBlob;
        }

        document.getElementById('delete_btn').addEventListener('click', function () {
            // Remove the recorded audio blob
            previousRecordedBlob = null;

            // Remove the track display
            track.style.display = 'none';

            // Clear the waveform display
            if (wavesurfer) {
                wavesurfer.destroy();
            }

            // Clear chunks array
            chunks = [];

            this.style.display = 'none';
            // Additional cleanup if needed
        });

        /***********************************************/
        /****** Recording Voice  #2 *********************/
        /***************************************************/
        let recordedAudioBlob2 = null;
        let previousRecordedBlob2 = null; // To store the previous recording for mic2

        const mic2_btn = document.querySelector('#mic2');
        const track2 = document.querySelector('.track2'); // Changed to the appropriate ID
        mic2_btn.addEventListener('click', ToggleMic2);
        let can_record2 = false;
        let is_recording2 = false;
        let recorder2 = null;
        let chunks2 = [];
        let wavesurfer2; // Declare wavesurfer variable outside of SetupStream function

        function SetupStream2(stream) {
            recorder2 = new MediaRecorder(stream);
            recorder2.ondataavailable = e => {
                chunks2.push(e.data);
            }
            recorder2.onstop = e => {
                document.getElementById('delete_btn2').style.display = 'block';

                var playBtn2 = document.getElementById('play_btn2');

                const blob2 = new Blob(chunks2, {type: "audio/ogg ; codecs=opus"});
                recordedAudioBlob2 = blob2; // Store the blob in the global variable

                const audioUrl2 = window.URL.createObjectURL(recordedAudioBlob2);
                const audioInput2 = document.getElementById('medications_voice');
                audioInput2.value = URL.createObjectURL(recordedAudioBlob2);

                if (wavesurfer2) {
                    wavesurfer2.destroy();
                }

                wavesurfer2 = WaveSurfer.create({
                    container: '#waveform2',
                    waveColor: '#ddd',
                    progressColor: '#03a0de',
                    barWidth: 4,
                    responsive: true,
                    barRadius: 4,
                    height: 90,
                    url: audioUrl2,
                });

                playBtn2.onclick = function () {
                    wavesurfer2.playPause();
                    if (playBtn2.src.includes("play.png")) {
                        playBtn2.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/pause.png')}}";
                    } else {
                        playBtn2.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                    }
                }

                wavesurfer2.on('finish', function () {
                    playBtn2.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                    wavesurfer2.stop();
                });

                track2.style.display = 'flex';

                // Reset chunks array for the next recording
                chunks2 = [];
            }
            can_record2 = true;
        }

        function ToggleMic2() {
            if (!can_record2) return;
            is_recording2 = !is_recording2;
            if (is_recording2) {
                recorder2.start(); // Start recording when is_recording is true
                mic2_btn.classList.add("is-recording2"); // Add the "is-recording" class
            } else {
                recorder2.stop();
                mic2_btn.classList.remove("is-recording2");
            }
        }

        function setupAudio2() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({audio: true})
                    .then(SetupStream2)
                    .catch(err => {
                        console.error(err);
                        if (err.name === 'NotFoundError' || err.name === 'DevicesNotFoundError') {
                            alert('Please connect a microphone to your device.');
                        } else if (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError') {
                            alert('Please allow access to your microphone.');
                        } else if (err.name === 'NotReadableError' || err.name === 'TrackStartError') {
                            alert('Unable to access your microphone. Please make sure it is not in use by another application.');
                        } else {
                            alert('Error accessing microphone: ' + err.message);
                        }
                    });
            }
        }

        setupAudio2();

        function getRecordedAudioBlob2() {
            return recordedAudioBlob2;
        }

        document.getElementById('delete_btn2').addEventListener('click', function () {
            // Remove the recorded audio blob
            recordedAudioBlob2 = null;

            // Remove the track display
            track2.style.display = 'none';

            // Clear the waveform display
            if (wavesurfer2) {
                wavesurfer2.destroy();
            }

            this.style.display = 'none';
            // Additional cleanup if needed
        });

        /****************************************/
        /*********Start Record 3 *****************/
        /********************************************/

        let recordedAudioBlob3 = null;
        let previousRecordedBlob3 = null; // To store the previous recording for mic2

        const mic3_btn = document.querySelector('#mic3');
        const track3 = document.querySelector('.track3'); // Changed to the appropriate ID
        mic3_btn.addEventListener('click', ToggleMic3);
        let can_record3 = false;
        let is_recording3 = false;
        let recorder3 = null;
        let chunks3 = [];
        let wavesurfer3; // Declare wavesurfer variable outside of SetupStream function
        function SetupStream3(stream) {
            recorder3 = new MediaRecorder(stream);
            recorder3.ondataavailable = e => {
                chunks3.push(e.data);
            }
            recorder3.onstop = e => {
                document.getElementById('delete_btn3').style.display = 'block';

                var playBtn3 = document.getElementById('play_btn3');
                const blob3 = new Blob(chunks3, {type: "audio/ogg ; codecs=opus"})
                recordedAudioBlob3 = blob3; // Store the blob in the global variable

                const audioUrl3 = window.URL.createObjectURL(recordedAudioBlob3);
                const audioInput3 = document.getElementById('compliant_voice');
                audioInput3.value = URL.createObjectURL(recordedAudioBlob3);


                // Check if wavesurfer instance exists, then destroy it
                if (wavesurfer3) {
                    wavesurfer3.destroy();
                }

                wavesurfer3 = WaveSurfer.create({
                    container: '#waveform3',
                    waveColor: '#ddd',
                    progressColor: '#03a0de',
                    barWidth: 4,
                    responsive: true,
                    barRadius: 4,
                    height: 90,
                    url: audioUrl3,
                });
                playBtn3.onclick = function () {
                    wavesurfer3.playPause();
                    if (playBtn3.src.includes("play.png")) {
                        playBtn3.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/pause.png')}}";
                    } else {
                        playBtn3.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                    }
                }
                wavesurfer3.on('finish', function () {
                    playBtn3.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                    wavesurfer3.stop();
                });
                track3.style.display = 'flex';
                // Reset chunks array for the next recording
                chunks3 = [];
            }
            can_record3 = true;
        }

        function ToggleMic3() {
            if (!can_record3) return;
            is_recording3 = !is_recording3;
            if (is_recording3) {
                recorder3.start(); // Start recording when is_recording is true
                mic3_btn.classList.add("is-recording3"); // Add the "is-recording" class
            } else {
                recorder3.stop();
                mic3_btn.classList.remove("is-recording3");
            }
        }

        function setupAudio3() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({audio: true})
                    .then(SetupStream3)
                    .catch(err => {
                        console.error(err);
                        if (err.name === 'NotFoundError' || err.name === 'DevicesNotFoundError') {
                            alert('Please connect a microphone to your device.');
                        } else if (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError') {
                            alert('Please allow access to your microphone.');
                        } else if (err.name === 'NotReadableError' || err.name === 'TrackStartError') {
                            alert('Unable to access your microphone. Please make sure it is not in use by another application.');
                        } else {
                            alert('Error accessing microphone: ' + err.message);
                        }
                    });
            }
        }

        setupAudio3();

        function getRecordedAudioBlob3() {
            return recordedAudioBlob3;
        }

        document.getElementById('delete_btn3').addEventListener('click', function () {
            // Remove the recorded audio blob
            recordedAudioBlob3 = null;

            // Remove the track display
            track3.style.display = 'none';

            // Clear the waveform display
            if (wavesurfer3) {
                wavesurfer3.destroy();
            }
            this.style.display = 'none';
            // Additional cleanup if needed
        });
    </script>

    <script>
        $(document).ready(function () {
            // Update the action attribute of the form with id "wrapped"
            $('#wrapped').attr('action', '{{ route('save_appointment') }}');
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#submit-btn').click(function () {
                $('.spinner-border').removeClass('d-none');
                $('#LoadingModel').modal('show');
                // Disable the submit button
                $('#submit-btn').addClass('disabled');
                // Serialize form data
                var formData = new FormData($('#wrapped')[0]);
                var recordedAudioBlob = getRecordedAudioBlob(); // Replace this function with your actual method to retrieve the blob
                var recordedAudioBlob2 = getRecordedAudioBlob2();
                var recordedAudioBlob3 = getRecordedAudioBlob3();
                if (recordedAudioBlob != null) {
                    formData.append('voice', recordedAudioBlob, 'voice.mp3');
                }
                if (recordedAudioBlob2 != null) {

                    formData.append('medications_voice', recordedAudioBlob2, 'medications_voice.mp3');
                }
                if (recordedAudioBlob3 != null) {
                    formData.append('compliant_voice', recordedAudioBlob3, 'compliant_voice.mp3');
                }
                // Send AJAX request
                $.ajax({
                    url: "{{ route('save_appointment') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $('.spinner-border').removeClass('d-none');
                        $('.LoadingModelBody').html("<div class='success-message text-center'><img  src='{{asset(config('constants.asset_path').'assets/front/img/survey/media/message.gif')}}' height='150' alt='image'> <h3 class='text-info' style='font-size:17px' >{{__('front.Congratulation Message')}} <span class='text-info'> {{Auth::user()->email }}</span></h3></div>");
                        setTimeout(() => {
                            window.location.href = '{{route('orders')}}';
                        }, 3000)
                    },
                    error: function (xhr, status, error) {
                        var response = JSON.parse(xhr.responseText);
                        var message = response.message;

                        toastr.error(message, 'Validation Error');
                    }
                });
            });
        });
    </script>

<script>
    /** Uploading Images Function preview */
    jQuery(document).ready(function () {
        fileUpload();
    });

    function fileUpload() {
        var fileWrap = "";
        var fileArray = [];

        $('.upload__inputfile1').each(function () {
            $(this).on('change', function (e) {
                fileWrap = $(this).closest('.upload__box').find('.upload__file-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (fileArray.length >= maxLength) {
                        return false;
                    } else {
                        var len = 0;
                        for (var i = 0; i < fileArray.length; i++) {
                            if (fileArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len >= maxLength) {
                            return false;
                        } else {
                            fileArray.push(f);

                            var fileName = f.name;
                            var fileExtension = fileName.split('.').pop().toLowerCase();
                            var fileIconClass = getFileIconClass(fileExtension);

                            var html = "<div class='upload__file-box'><div class='file-icon " + fileIconClass + "'></div><div class='file-name'>" + fileName + "</div><div class='upload__file-close' data-file='" + fileName + "'>&times;</div></div>";
                            fileWrap.append(html);
                            iterator++;
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__file-close", function (e) {
            var file = $(this).data("file");
            for (var i = 0; i < fileArray.length; i++) {
                if (fileArray[i].name === file) {
                    fileArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().remove();
        });
    }

    // Function to get file icon class based on file extension
    function getFileIconClass(extension) {
        // Add more file extensions and their corresponding icon classes as needed
        switch (extension) {
            case 'mp4':
            case 'avi':
            case 'mov':
            case 'mkv':
                return 'fa fa-file-video';
            case 'doc':
            case 'docx':
                return 'fa fa-file-word';
            case 'pdf':
                return 'fa fa-file-pdf';
            case 'xls':
            case 'xlsx':
                return 'fa fa-file-excel';
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                return 'fa fa-file-image'; // Change to appropriate image icon class
            // Add more cases for other file types
            default:
                return 'fa fa-file';
        }
    }
</script>



    <script>
        /** Upload First Images */
        jQuery(document).ready(function () {
            ImgUpload23();
        });

        function ImgUpload23() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile23').each(function () {
                $(this).on('change', function (e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap23');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function (f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function (e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>



    <script>
        /** Uploading  Image Function  privew */
        jQuery(document).ready(function () {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile2').each(function () {
                $(this).on('change', function (e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function (f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function (e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>

    <script>
        /*** Upload Image 4 */
        jQuery(document).ready(function () {
            ImgUpload4();
        });

        function ImgUpload4() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile4').each(function () {
                $(this).on('change', function (e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img4-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function (f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function (e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>


    <script>
        /** Uploading File Function preview */
        jQuery(document).ready(function () {
            fileUploadAndImages();
        });

        function fileUploadAndImages() {
            var fileWrapp = "";
            var fileArrayy = [];

            $('.upload__inputfile').on('change', function (e) {
                fileWrapp = $(this).closest('.upload__box').find('.upload__img-wrap2');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (fileArrayy.length >= maxLength) {
                        return false;
                    } else {
                        var len = 0;
                        for (var i = 0; i < fileArrayy.length; i++) {
                            if (fileArrayy[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len >= maxLength) {
                            return false;
                        } else {
                            fileArrayy.push(f);

                            var fileName = f.name;
                            var fileExtension = fileName.split('.').pop().toLowerCase();

                            var html = "<div class='upload__file-box upload_images_files'>";
                            // Check if the uploaded file is an image
                            if (f.type.match('image.*')) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    html += "<div class='file-preview' style='background-image: url(" + e.target.result + ")'></div>";
                                    html += "<div class='upload__file-close' data-file='" + fileName + "'>&times;</div>";
                                    fileWrapp.append(html);
                                }
                                reader.readAsDataURL(f);
                            } else {
                                // For non-image files, display only the file name
                                html += "<div class='file-icon fa fa-file'></div>";
                                html += "<div class='file-name'>" + fileName + "</div>";
                                html += "<div class='upload__file-close' data-file='" + fileName + "'>&times;</div>";
                                fileWrapp.append(html);
                            }
                            iterator++;
                        }
                    }
                });
            });

            $('body').on('click', ".upload__file-close", function (e) {
                var file = $(this).data("file");
                for (var i = 0; i < fileArrayy.length; i++) {
                    if (fileArrayy[i].name === file) {
                        fileArrayy.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().remove();
            });
        }
    </script>

    <script>
        /*
        function displayFileName() {
            const input = document.getElementById('file');
            const fileName = input.files[0].name;
            const fileNameDisplay = document.getElementById('file-name');
            fileNameDisplay.innerText = fileName;
        }
     */
        $(document).ready(function () {
            $('input[name="gender"]').change(function () {
                if ($(this).val() === 'Female') {
                    $('.female_status').removeClass('d-none');
                } else {
                    $('.female_status').addClass('d-none');
                }
            });

        });

    </script>

@endpush
