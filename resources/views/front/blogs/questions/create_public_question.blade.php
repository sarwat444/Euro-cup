@extends('front.layouts')
@push('title', __('front.Create Question'))
@push('styles')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/questions.css')}}"  rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{__('front.Ask New Quetion')}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('questions.index')}}">{{__('front.Questions')}} </a></li>
                            <li class="breadcrumb-item" aria-current="page">{{__('front.Ask New Quetion')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="question-area pt-80px pb-40px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card card-item">
                        <form id="questionForm" action="{{ route('questions.store') }}" method="post" class="card-body">
                            @csrf
                            <div class="input-box">
                                <input type="hidden" value="12" name="category_id">
                                <label class="font-size-14 text-black fw-medium mb-0">{{ __('front.Details') }}</label>
                                <div class="form-group">
                                    <textarea name="details" id="editor1" rows="10" cols="80" required></textarea>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box pt-2">
                                <div class="btn-box">
                                    <button type="submit" class="btn btn-primary send_question btn-block ">{{ __('front.Send') }}</button>
                                </div>
                            </div>
                        </form>

                    </div><!-- end card -->
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end question-area -->

@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize CKEditor on the textarea with ID 'editor1'
            CKEDITOR.replace('editor1');

            $('#questionForm').submit(function (event) {
                event.preventDefault();

                // Update the original textarea with CKEditor content
                CKEDITOR.instances.editor1.updateElement();

                // Get the updated value of the textarea
                var editorData = $('textarea[name="details"]').val();

                // Append the editor data to the FormData object
                var formData = new FormData($(this)[0]);
                formData.set('details', editorData); // Set the updated value of 'details'

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        toastr.success('Question Stored Successfully');
                        window.location.href = '{{ route('blog_public_questions') }}';
                    },
                    error: function (xhr, status, error) {
                        var errors = xhr.responseJSON;
                        toastr.error(errors.message);
                    }
                });
            });
        });
    </script>


@endpush
