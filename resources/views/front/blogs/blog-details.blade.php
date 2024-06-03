@extends('front.layouts')
@push('title', __('front.view blog'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/questions.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.view blog')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('blogs')}}">{{__('front.Blogs')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.view blog')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!--======================================
        START HERO AREA
======================================-->
    <section class="hero-area bg-white shadow-sm overflow-hidden pt-40px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="hero-content">
                        <h2 class="section-title  fs-20">
                            {!! $blog->title !!}
                        </h2>
                    </div><!-- end hero-content -->
                </div><!-- end col-lg-9 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!--======================================
            END HERO AREA
    ======================================-->

    <!-- ================================
             START QUESTION AREA
    ================================= -->
    <section class="question-area pt-40px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="question-main-bar mb-50px">
                        <div class="question d-flex">
                            <div class="question-post-body-wrap flex-grow-1">
                                <div class="question-post-body">
                                    @if(!empty($blog->details))
                                    {!!  $blog->details !!}
                                    @else
                                        <span class="alert text-danger"> {{__('front.No blog details')}}</span>
                                    @endif

                                </div>
                            </div><!-- end question-post-body-wrap -->
                        </div><!-- end question -->


                    </div><!-- end question-main-bar -->
                </div><!-- end col-lg-9 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end question-area -->




@endsection
