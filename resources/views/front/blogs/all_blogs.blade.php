@extends('front.layouts')
@push('title', __('front.Blogs'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/questions.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/blogs.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')

    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.Medical topics')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('front.home')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.Medical topics')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="question-area pt-30px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="question-tabs mb-50px">
                        @if(!empty($blogs) )
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="question-main-bar all-question-bar">
                                        <div class="filters d-flex align-items-center justify-content-between">
                                        </div><!-- end filters -->
                                        <div class="questions-snippet">
                                            @forelse($blogs as $blog)
                                                <div class="media media-card media--card align-items-center">
                                                    <div class="media-body">
                                                        <h5><a href="{{route('blogs.show' , $blog->id )}}"> {!! $blog->title !!}</a></h5>
                                                        <small class="meta">
                                                            <span class="pr-1">{{ $blog->created_at->format('d/m/Y') }}</span>
                                                        </small>
                                                    </div>
                                                </div><!-- end media -->
                                            @empty
                                                <span>{{__('front.No Blogs Found')}}</span>
                                            @endforelse
                                            {{$blogs->links('pagination::bootstrap-5')}}
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

@push('scripts')
@endpush
