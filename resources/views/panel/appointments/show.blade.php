@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])
@push('panel_css')
    <style>
        .d-block {
            margin-bottom: 13px !important;
        }

        .pathent_message {
            margin-bottom: 13px !important;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid ">
        <div class="email-wrap bookmark-wrap">
            <div class="row">
                <div class="col-xl-3 box-col-6">
                    <div class="md-sidebar"><a class="btn btn-primary md-sidebar-toggle" href="javascript:void(0)">task
                            filter</a>
                        <div class="md-sidebar-aside job-left-aside custom-scrollbar">
                            <div class="email-left-aside">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="email-app-sidebar left-bookmark task-sidebar">
                                            <div class="common-flex align-items-center mb-3">
                                                <div class="media-size-email">
                                                    @if(!empty($appointment->patient->image) && file_exists(public_path(config('constants.asset_path') . 'uploads/patients/' . $appointment->patient->image)))
                                                        <img style="height: 50px" class="rounded-circle" alt=""
                                                             src="{{ asset(config('constants.asset_path') . 'uploads/patients/' . $appointment->patient->image) }}">
                                                    @else
                                                        <img style="height: 50px" class="rounded-circle" alt=""
                                                             src="{{ asset(config('constants.asset_path') . 'assets/panel/images/default_user.png') }}">
                                                    @endif

                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="f-w-600">{{ $appointment->patient->first_name . ' ' . $appointment->patient->last_name }}</h6>
                                                    <p>{{$appointment->patient->email}}</p>
                                                </div>
                                            </div>
                                            <ul class="nav main-menu" role="tablist">
                                                <li class="nav-item"><span
                                                        class="main-title mb-2">Patient Information</span></li>
                                                <li><span
                                                        class="title">{{ __('phone')}}: </span> {{$appointment->patient->mobile}}
                                                </li>
                                                <li><span
                                                        class="title">{{ __('gender')}}: </span> {{$appointment->gender}}
                                                </li>
                                                <li>
                                                    <hr>
                                                </li>
                                            </ul>
                                            <h4 class="mb-4">Doctor Information</h4>
                                            <div class="common-flex align-items-center mb-3">
                                                <div class="media-size-email">

                                                    @if(file_exists(public_path(config('constants.asset_path') . 'uploads/doctors/' . $appointment->doctor->image)))
                                                        <img style="height: 50px" class="rounded-circle" alt=""
                                                             src="{{ asset(config('constants.asset_path') . 'uploads/doctors/' . $appointment->doctor->image) }}">
                                                    @else
                                                        <img style="height: 50px" class="rounded-circle" alt=""
                                                             src="{{ asset(config('constants.asset_path') . 'assets/panel/images/default.png') }}">
                                                    @endif

                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="f-w-600">{{ $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name }}</h6>
                                                    <p>{{$appointment->doctor->email}}</p>
                                                </div>
                                            </div>
                                            <ul class="nav main-menu" role="tablist">
                                                <li class="nav-item"><span class="main-title">Doctor Information </span>
                                                </li>
                                                <li><span
                                                        class="title">{{ __('phone')}}: </span> {{$appointment->doctor->mobile}}
                                                </li>
                                                <li><span class="title">Gender: </span> {{$appointment->gender}}</li>
                                                <li><span
                                                        class="title">{{ __('specialize') }}: </span> {{$appointment->doctor->doctorInfo?->specializeion->name}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-12 box-col-12">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left mt-4">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                         aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex">
                                                <h4 class="mb-0">{{ __('medical report') }}</h4>
                                            </div>
                                            <div class="card-body filter-cards-view p-15">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2 ">{{ __('message') }} :</span>
                                                            <p class="d-inline ">
                                                                {{$appointment->message}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('full name') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->full_name}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('gender') }} :</span>
                                                            <p class="d-inline">
                                                                @if($appointment->gender == 'male')
                                                                    {{ __('male') }}
                                                                @elseif($appointment->gender == 'female')
                                                                    {{ __('female') }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('age') }} :</span>
                                                            <p class="d-inline">
                                                                {{ $appointment->age }}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('height') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->height}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('weight') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->weight}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('country') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->country}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('nationality') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->nationality}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('work') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->work}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('phone') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->phone_number}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('email') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->email}}
                                                            </p>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('smoker') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->is_smoker ? __('yes') : __('no')}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span
                                                                class="f-w-600 mb-2">{{ __('drink alcohol') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->drink_alcohol ? __('yes') : __('no')}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span
                                                                class="f-w-600 mb-2">{{ __('medications allergy') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->medications_allergy ? __('yes') : __('no')}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2 d-block">{{ __('allergy medications names') }} :</span>
                                                            <p>
                                                                {{$appointment->allergy_medications_names}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span
                                                                class="f-w-600 mb-2">{{ __('had surgeries') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->had_surgeries ? __('yes') : __('no')}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2 d-block">{{ __('surgeries names') }} :</span>
                                                            <p>
                                                                {{$appointment->surgeries_names}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('had hereditary diseases') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->had_hereditary_diseases ? __('yes') : __('no')}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2 d-block">{{ __('hereditary diseases names') }} :</span>
                                                            <p>
                                                                {{$appointment->hereditary_diseases_names}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('take medications regularly') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->take_medications_regularly ? __('yes') : __('no')}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2 d-block">{{ __('taking medications') }} :</span>
                                                            <p>
                                                                {{$appointment->taking_medications}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2">{{ __('has chronic diseases') }} :</span>
                                                            <p class="d-inline">
                                                                {{$appointment->has_chronic_diseases ? __('yes') : __('no')}}
                                                            </p>
                                                        </div>
                                                        <div class="d-block">
                                                            <span class="f-w-600 mb-2 d-block">{{ __('chronic diseases') }} :</span>
                                                            <p>
                                                                {{$appointment->chronic_diseases}}
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            @php
                                                                $image = $appointment->attachments->regularly_medications_image;
                                                                $voice = $appointment->attachments->voice;
                                                            @endphp
                                                            <span class="f-w-600 mb-4 mt-3 d-block">{{ __('attachments') }} :</span>
                                                            @if($voice)
                                                                <div class="col-6">
                                                                    <p>
                                                                        <audio controls class="mt-5">
                                                                            <source
                                                                                src="{{asset(config('constants.asset_path') . $voice)}}"
                                                                                type="audio/mpeg">
                                                                            Your browser does not support the audio
                                                                            element.
                                                                        </audio>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            @if($image)
                                                                <div class="col-6">
                                                                    <p>
                                                                        <a class="mx-2"
                                                                           href="{{asset(config('constants.asset_path') . $image)}}"
                                                                           target="_blank">
                                                                            <img
                                                                                src="{{asset(config('constants.asset_path') . $image)}}"
                                                                                style="width: 150px; height: 150px;"
                                                                                alt="">
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            @endif
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-0">
                                <div class="card-header d-flex">
                                    <h4 class="mb-0">{{ __('medical complaint') }}</h4>
                                </div>
                                <div class="card-body filter-cards-view">
                                                        <span
                                                            class="f-w-600 mb-2 d-block">{{ __('compliant') }} :</span>
                                    <p>
                                        {{$appointment->compliant}}
                                    </p>
                                    <div class="row">
                                        @php
                                            $compliant_voice = $appointment->attachments->compliant_voice;
                                        @endphp
                                        <span class="f-w-600 mb-4 mt-3 d-block">{{ __('compliant voice') }} :</span>
                                        @if($compliant_voice)
                                            <div class="col-6">
                                                <p>
                                                    <audio controls>
                                                        <source
                                                            src="{{asset(config('constants.asset_path') . $compliant_voice)}}"
                                                            type="audio/mpeg">
                                                        Your browser does not support the audio
                                                        element.
                                                    </audio>
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-0">
                                <div class="card-header d-flex">
                                    <h4 class="mb-0">{{ __('medical Files') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <span class="f-w-600 mb-4 mt-3 d-block">{{ __('medical tests files') }} :</span>
                                        <div>
                                            <p>
                                                @php
                                                    $test_medical_attachments = $appointment->attachments->test_medical_attachment;
                                                @endphp
                                                @if($test_medical_attachments)
                                                    @foreach($test_medical_attachments as $file)
                                                        <a class="mx-2"
                                                           href="{{asset(config('constants.asset_path') . $file)}}"
                                                           target="_blank"><img class="mb-3"
                                                                                src="{{asset(config('constants.asset_path') . 'assets/panel/images/pdf.png')}}"
                                                                                style="width: 150px; height: 150px;"
                                                                                alt=""></a>
                                                    @endforeach
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                                        <span
                                                            class="f-w-600 mb-4 mt-3 d-block">{{ __('x-rays images') }} :</span>
                                        <div>
                                            <p>
                                                @php
                                                    $x_rays_images = $appointment->attachments->x_rays_images;
                                                @endphp
                                                @if($x_rays_images)
                                                    @foreach($x_rays_images as $image)
                                                        <a class="mx-2"
                                                           href="{{asset(config('constants.asset_path') . $image)}}"
                                                           target="_blank">
                                                            <img
                                                                src="{{asset(config('constants.asset_path') . $image)}}"
                                                                style="width: 150px; height: 150px;"
                                                                alt="">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                                            <span
                                                                class="f-w-600 mb-4 mt-4 d-block">{{ __('cd video') }} :</span>
                                        <div>
                                            <p>
                                                @php
                                                    $cd_reports_video = $appointment->attachments->cd_reports_video;
                                                @endphp
                                                @if($cd_reports_video)
                                                    <video controls
                                                           style="width: 650px; height: 300px;">
                                                        <source
                                                            src="{{asset(config('constants.asset_path') . $cd_reports_video)}}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                                            <span
                                                                class="f-w-600 mb-4 mt-3 d-block">{{ __('cd images') }} :</span>
                                        <div>
                                            <p>
                                                @php
                                                    $cd_reports_images = $appointment->attachments->cd_reports_images;
                                                @endphp
                                                @if($cd_reports_images)
                                                    @foreach($cd_reports_images as $image)
                                                        <a class="mx-2"
                                                           href="{{asset(config('constants.asset_path') . $image)}}"
                                                           target="_blank">
                                                            <img
                                                                src="{{asset(config('constants.asset_path') . $image)}}"
                                                                style="width: 150px; height: 150px;"
                                                                alt="">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                                        <span
                                                            class="f-w-600 mb-4 mt-3 d-block">{{ __('medications images') }} :</span>
                                        <div>
                                            <p>
                                                @php
                                                    $medications_images = $appointment->attachments->medications_images;
                                                @endphp
                                                @if($medications_images)
                                                    @foreach($medications_images as $image)
                                                        <a class="mx-2"
                                                           href="{{asset(config('constants.asset_path') . $image)}}"
                                                           target="_blank">
                                                            <img
                                                                src="{{asset(config('constants.asset_path') . $image)}}"
                                                                style="width: 150px; height: 150px;"
                                                                alt="">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <span
                                        class="f-w-600 mt-4 mb-2 d-block">{{ __('taking medications') }} :</span>
                                    <p>
                                        {{$appointment->taking_medications}}
                                    </p>
                                    <div class="row">
                                        @php
                                            $medications_voice = $appointment->attachments->medications_voice;
                                        @endphp
                                        <span
                                            class="f-w-600 mb-4 mt-3 d-block">{{ __('medications voice') }} :</span>
                                        @if($medications_voice)
                                            <div>
                                                <p>
                                                    <audio controls>
                                                        <source
                                                            src="{{asset(config('constants.asset_path') . $medications_voice)}}"
                                                            type="audio/mpeg">
                                                        Your browser does not support the audio
                                                        element.
                                                    </audio>
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('panel_js')

@endpush
