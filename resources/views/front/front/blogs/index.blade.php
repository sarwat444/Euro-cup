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
                    <h2 class="breadcrumb-title">{{__('front.Blogs')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> {{__('front.home')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.Blogs')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


<div class="container">
        <div class="row mt-3">
    <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item me-2">
               <a style="background-color: #19B9B7; border:1px solid #19B9B7" href="{{ route('blogs') }}" class="btn btn-primary active">{{ __('front.blogs') }}</a>
            </li>
            <li class="nav-item me-2">
                <a href="{{ route('questions.index') }}" class="btn btn-primary not-active">{{ __('front.Questions') }}</a>
            </li>
        </ul>
    </div>
</div>
</div>
    <section class="question-area pt-30px pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="card border-0">
                            <ul class="generic-list-item generic-list-item-highlight fs-15">
                                <li class="lh-26 active"><a href="{{route('blogs')}}"><i
                                                class="la la-home mr-1 text-black"></i><span
                                                class="badge badge-primary">{{$allCount}}</span> {{__('front.All')}}</a></li>
                                @forelse($Categories as $Category)
                                    <li class="lh-26"><a href="{{route('blogCategory' , $Category->id )}}"><i
                                                    class="la la-home mr-1 text-black"></i> <span
                                                    class="badge badge-primary"> {{$Category->blogs_count}} </span> {{$Category->name}}
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
</div>



@endsection

@push('scripts')
@endpush
