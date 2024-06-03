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
            <div  class="alert alert-success ">
                <p>{{__('front.The appointment will be determined within and Send  Link to  you on')}} - 24 - {{__('front.hours')}}</p>
            </div>
            <div class="appointment-data pt-1">
                <div class="card">
                    <div class="card-body">
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
                                        class="answer text-info">{{$appointment->gender}} @if($appointment->gender == 'famale') - {{$appointment->breastfeeding_status}} @endif</span></p>
                            </div>
                            <div class="col-md-3">
                                <p>4- {{__('front.age')}} ? <span
                                        class="answer text-info"> {{$appointment->age}}   </span></p>
                            </div>
                            <div class="col-md-3">
                                <p>4- {{__('front.weight')}} ? <span
                                        class="answer text-info"> {{$appointment->weight}}   </span></p>
                            </div>
                            <div class="col-md-3">
                                <p>5- {{__('front.height')}} ? <span
                                        class="answer text-info"> {{$appointment->height}}   </span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>1- {{__('front.Place of residence')}}? <span
                                        class="answer text-info"> {{$appointment->country}} </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>2- {{__('front.Nationality')}} ? <span
                                        class="answer text-info"> {{$appointment->nationality}} </span>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p>1- {{__('front.Phone Number')}}? <span
                                        class="answer text-info"> {{$appointment->phone_number}} </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>2- {{__('front.Email')}} ? <span
                                        class="answer text-info"> {{$appointment->email}} </span>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p>5- {{__('front.Are You Smoker ?')}}? <span
                                        class="answer text-info"> @if($appointment->is_smoker == 0 )
                                            No
                                        @else
                                            Yes
                                        @endif  </span></p>
                            </div>

                            <div class="col-md-6">
                                <p>6- {{__('front.Do you drink alcohol ?')}} ? <span class="answer text-info"> @if($appointment->drink_alcohol == 0 )
                                            No
                                        @else
                                            Yes
                                        @endif  </span>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p>7- {{__('front.Have you had surgeries')}}  ? <span
                                        class="answer text-info">@if($appointment->had_surgeries == 0 )
                                            No
                                        @else
                                            Yes
                                                                     <br>
                                            <p>{{$appointment->surgeries_names}}</p>
                                        @endif </span></p>
                            </div>
                            <div class="col-md-6">
                                <p> 8- {{__('front.Do you have an allergy to certain medications')}} ? <span
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



                        <!--Recoding Voice -->
                        <div class="row">
                            <div class="col-md-6">
                                <p>10- {{__('front.Recording Voice')}} ?</p>
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
                        </div>

                        <!-- Complement Report  -->
                        <div class="row">
                            <div class="col-md-12">
                                <p>11- {{__('front.Put your medical complaint text or voice')}} ?
                                    <span class="answer text-info"> {{$appointment->notes}}  </span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>10- {{__('front.Recording Voice')}} ?</p>
                                <div class="track2">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <img id="play_btn2"
                                                 src="{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}">
                                        </div>
                                        <div class="col-md-10">
                                            <div id="waveform2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p>7-{{__('front.Uploaded Reports')}}</p>
                                @if(!empty($appointment->attachments2))
                                    <ul class="list-unstyled">
                                        @foreach($appointment->attachments2->attachment as $attachment)
                                            <li><a href="{{asset(config('constants.asset_path').$attachment)}}"><i
                                                        style="font-size: 30px" class="icofont-ui-file"></i> </a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    {{__('front.No Attachments')}}
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p>8- {{__('front.Description')}} ? <span
                                        class="answer text-info"> {{$appointment->compliant}} </span>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                9- {{__('front.Uploaded Reports')}}
                                <div class="track3">
                                    <div class="row">
                                        <div class="col-md-2  text-center">
                                            <img id="play_btn3"
                                                 src="{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}">
                                        </div>
                                        <div class="col-md-10">
                                            <div id="waveform3"></div>
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

@endsection
@push('scripts')
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    <script>
        $(document).ready(function () {
            /* Start Recording #1 View */

            var playBtn = document.getElementById('playBtn');
            var audioUrl = '{{ asset(config('constants.asset_path').'uploads/appointments/'.$appointment->id.'/audio/'.$appointment->attachments2->voice) }}';
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

            /* Start Recording #2 View */

            var playBtn2 = document.getElementById('play_btn2');
            var audioUrl2 = '{{ asset(config('constants.asset_path').'uploads/appointments/audio/'.json_decode($appointment->attachments2->medications_voice)) }}';
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
                    document.getElementById('uploadForm').submit();
                } else {
                    playBtn2.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                }
            }
            wavesurfer2.on('finish', function () {
                playBtn2.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                wavesurfer2.stop();
            });

            /* Start Recording #3 View */

            var playBtn3 = document.getElementById('play_btn3');
            var audioUrl3 = '{{ asset(config('constants.asset_path').'uploads/appointments/audio/'.json_decode($appointment->attachments2->compliant_voice)) }}';
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
                    document.getElementById('uploadForm').submit();
                } else {
                    playBtn3.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                }
            }
            wavesurfer3.on('finish', function () {
                playBtn3.src = "{{asset(config('constants.asset_path').'assets/front/img/survey/media/play.png')}}";
                wavesurfer2.stop();
            });
        });
    </script>

@endpush
