@extends('front.layouts')
@push('title', __('front.Category Questions'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/questions.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.medical questions')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('front.home')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.medical questions')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="nav nav-tabs custom_tabs" id="myTab" role="tablist">
                    <li class="nav-item me-2">
                        <a  href="{{ route('blogs') }}" class="btn btn-primary not-active">{{__('front.Medical topics')}}</a>
                    </li>
                    <li class="nav-item me-2">
                        <a style="background-color: #19B9B7; border:1px solid #19B9B7" href="{{ route('blogQuestions') }}" class="btn btn-primary active">{{__('front.medical questions')}}</a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="{{ route('blog_public_questions') }}" class="btn btn-primary not-active">{{__('front.Public Questions')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <section class="question-area pt-30px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-primary dont-hedicated">{{__('front.Do not hesitate to ask any questions regarding the site')}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="card border-0">

                            <ul class="generic-list-item generic-list-item-highlight fs-15">
                                <li class="lh-26 "><a href="{{ route('blogQuestions') }}"><i
                                            class="la la-home mr-1 text-black"></i><span
                                            class="badge badge-primary">{{$allCount}}</span>{{__('front.All')}} </a></li>
                                        @forelse($Categories as $Category)
                                            <li class="lh-26 @if($selected_category->id  == $Category->id ) active @endif"><a href="{{route('blogquestionCategory' , $Category->id )}}"><i
                                                        class="la la-home mr-1 text-black"></i> <span
                                                        class="badge badge-primary"> {{$Category->questions_count}} </span> {{$Category->name}}
                                                </a></li>
                                        @empty
                                            <span class="text-danger">{{__('front.No Categories Data')}}</span>
                                        @endforelse
                            </ul>
                        </div><!-- end card -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-2 -->
                <div class="col-lg-9">
                    <div class="question-tabs mb-50px">
                        @if(!empty($Questions) && count($Questions) > 0 )
                     <div class="row">
                            <div class="col-md-10">
                                <ul class="nav nav-tabs generic-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <div class="anim-bar" style="left: 197.984px; width: 20.4531px;"></div>
                                    </li>
                                    <li class="nav-item me-2">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{__('front.All Quetions')}}</button>
                                    </li>
                                    <li class="nav-item me-2">
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('front.My Questions')}}</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                    <a href="{{route('questions.create')}}" class="btn btn-primary mb-2 add-quetion">{{__('front.Add New Quetion')}} </a>
                            </div>
                        </div>
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="question-main-bar all-question-bar">
                                        <div class="filters d-flex align-items-center justify-content-between pb-4">
                                        </div><!-- end filters -->
                                        <div class="questions-snippet">
                                            @forelse($Questions as $question)
                                                <div class="media media-card media--card align-items-center">
                                                    <div class="media-body">
                                                        <h5><a href="{{route('questions.show' , $question->id )}}"> {!! $question->details !!}</a></h5>
                                                        <small class="meta">
                                                            <span class="pr-1">{{ $question->created_at->format('d/m/Y') }}</span>
                                                        </small>
                                                    </div>
                                                </div><!-- end media -->
                                            @empty
                                                <span>{{__('front.No Questions Found')}}</span>
                                            @endforelse
                                            {{$Questions->links('pagination::bootstrap-5')}}
                                        </div><!-- end questions-snippet -->


                                    </div><!-- end question-main-bar -->
                                </div><!-- end tab-pane -->
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="question-main-bar best-question-bar">
                                        <div class="questions-snippet">
                                            @foreach($myQuestions as $question)
                                                <div class="media media-card media--card align-items-center">
                                                    <div class="media-body">
                                                        <h5><a href="{{route('questions.show' , $question->id )}}"> {!! $question->details !!}</a></h5>
                                                        <small class="meta">
                                                            <span class="pr-1">{{ $question->created_at->format('d/m/Y') }}</span>
                                                        </small>
                                                    </div>
                                                </div><!-- end media -->
                                            @endforeach
                                        </div><!-- end questions-snippet -->
                                    </div><!-- end question-main-bar -->
                                </div><!-- end tab-pane -->
                            </div><!-- end tab-content -->
                        @endif
                    </div><!-- end question-tabs -->
                </div><!-- end col-lg-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
