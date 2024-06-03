@extends('front.layouts')
@push('title', __('front.view blog'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/appointment_details.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="page-title-area page-title-two">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{__('front.Appointment Details')}}</h2>
                    <ul>
                        <li>
                            <a href="{{route('orders')}}">
                                {{__('front.home')}}
                            </a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{__('front.Appointment Details')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="appointment-details pt-3">
        <div class="appointment-time">
        </div>
        <div class="container">
            <div class="appointment-data pt-1">
                <div class="card">
                    <div class="card-body">
                        <div class="appointment-details d-none">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>1- {{__('front.Write your message')}} ? <span
                                            class="answer text-info"> {{$appointment->message}} </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>2- {{__('front.Name')}} ? <span
                                            class="answer text-info"> {{$appointment->full_name}} </span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>3- {{__('front.gender')}} ? <span
                                            class="answer text-info">{{$appointment->gender}} @if($appointment->gender == 'famale')
                                                - {{$appointment->breastfeeding_status}}
                                            @endif</span></p>
                                </div>
                                <div class="col-md-3">
                                    <p>4- {{__('front.age')}} ? <span
                                            class="answer text-info"> {{$appointment->age}}   </span></p>
                                </div>
                                <div class="col-md-3">
                                    <p>5- {{__('front.weight')}} ? <span
                                            class="answer text-info"> {{$appointment->weight}}   </span></p>
                                </div>
                                <div class="col-md-3">
                                    <p>6- {{__('front.height')}} ? <span
                                            class="answer text-info"> {{$appointment->height}}   </span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>7- {{__('front.Place of residence')}}? <span
                                            class="answer text-info"> {{$appointment->country}} </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>8- {{__('front.Nationality')}} ? <span
                                            class="answer text-info"> {{$appointment->nationality}} </span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>9- {{__('front.Phone Number')}}? <span
                                            class="answer text-info"> {{$appointment->phone_number}} </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>10- {{__('front.Email')}} ? <span
                                            class="answer text-info"> {{$appointment->email}} </span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>11- {{__('front.Are You Smoker ?')}}? <span
                                            class="answer text-info"> @if($appointment->is_smoker == 0 )
                                                No
                                            @else
                                                Yes
                                            @endif  </span></p>
                                </div>

                                <div class="col-md-6">
                                    <p>12- {{__('front.Do you drink alcohol ?')}} ? <span class="answer text-info"> @if($appointment->drink_alcohol == 0 )
                                                No
                                            @else
                                                Yes
                                            @endif  </span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>13- {{__('front.Have you had surgeries')}} ? <span
                                            class="answer text-info">@if($appointment->had_surgeries == 0 )
                                                No
                                            @else
                                                Yes
                                                <br>
                                                <p>{{$appointment->surgeries_names}}</p>
                                            @endif </span></p>
                                </div>
                                <div class="col-md-6">
                                    <p> 14- {{__('front.Do you have an allergy to certain medications')}} ? <span
                                            class="answer text-info"> @if($appointment->had_hereditary_diseases == 0 )
                                                No
                                            @else
                                                Yes
                                                <p>{{$appointment->hereditary_diseases_names}}</p>
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>15- {{__('front.Do you suffer from hereditary diseases?')}} ? <span
                                            class="answer text-info">@if($appointment->had_hereditary_diseases == 0 )
                                                No
                                            @else
                                                Yes
                                                <br>
                                                <p>{{$appointment->hereditary_diseases_names}}</p>
                                            @endif </span></p>
                                </div>
                                <div class="col-md-6">
                                    <p> 16- {{__('front.Do you take medications regularly?')}} ? <span
                                            class="answer text-info"> @if($appointment->take_medications_regularly == 0 )
                                                No
                                            @else
                                                Yes
                                                <p>{{$appointment->take_medications_regularly}}</p>
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center doctor-info">
                                <h1 class="mb-3"> <span class="text-primary"> {{__('front.Doc')}} </span>   : {{$appointment->doctor->first_name }} {{$appointment->doctor->last_name }}</h1>
                                <p>{{ mb_strimwidth($appointment->doctor->doctorInfo->details, 0, 300, '...') }}</p>
                                <h4>{{$appointment->doctor->doctorInfo->specializeion->name}}</h4>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <ul class="list-unstyled appointment-calender" >
                                    <li><span>{{ __('front.Reservation Date')}} : </span> {{$appointment->created_at->format('d.m.Y')}} </li>
                                    <li><span>{{ __('front.fees')}} : </span>  100 $</li>
                                </ul>
                            </div>
                        </div>
                         <div class="row mb-2">
                                <div class="col-md-12">
                                    <p> <span class="answer text-info"> {{__('front.medical complaint')}} : </span>
                                         {{$appointment->compliant}}  </span></p>
                                </div>
                          </div>
                          <!--Recoding Voice -->
                              @if(!empty($appointment->attachments->compliant_voice))
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <p>{{__('front.Recording Voice')}} ?</p>
                                            <div class="track">
                                                <div class="row">
                                                    <div class="col-md-2 text-center">
                                                        <img id="playBtn"
                                                             src="{{ asset(config('constants.asset_path').'assets/front/img/survey/media/play.png') }}">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div id="waveform">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{__('front.Recording Voice')}} ?</p>
                                            <div class="track2">
                                                <div class="row">
                                                    <div class="col-md-2 text-center">
                                                        <img id="playBtn2"
                                                             style="margin-top: 28px;"
                                                             src="{{ asset(config('constants.asset_path').'assets/front/img/survey/media/play.png') }}">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div id="waveform2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                          <!-- Complement Report  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('scripts')
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    @if(!empty($appointment->attachments->compliant_voice))
    <script>
        $(document).ready(function () {
            /* Start Recording #1 View */
            var playBtn = document.getElementById('playBtn');
            var audioUrl = '{{ asset(config('constants.asset_path').'uploads/appointments/'.$appointment->id.'/audio/'.$appointment->attachments->compliant_voice) }}';

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
        });
            /* Start Recording #2 View */
    </script>
    @endif
    @if(!empty($appointment->attachments->medications_voice))
    <script>
        $(document).ready(function () {
    /* Start Recording #2 View */
            var playBtn2 = document.getElementById('playBtn2');
            var audioUrl2 = '{{ asset(config('constants.asset_path').'uploads/appointments/'.$appointment->id.'/audio/'.$appointment->attachments->medications_voice) }}';
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

            /* Start Recording #3 View */
        });
    </script>
    @endif

@endpush
