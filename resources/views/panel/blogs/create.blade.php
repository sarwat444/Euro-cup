@extends('panel.layouts.master', ['sub_title' => 'Dashboard', 'is_active' => 'pages'])

@push('panel_css')
    <link href="{{asset(config('constants.asset_path').'assets/front/css/icofont.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/style.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- DataTables -->
    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/css/vendors/datatables.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset(config('constants.asset_path') . 'assets/panel/sweetalert2/sweetalert2.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{asset(config('constants.asset_path').'assets/front/css/questions.css')}}"  rel="stylesheet" type="text/css" />


@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <form id="form" method="{{isset($item) ? 'POST' : 'POST'}}"
                              to="{{url()->current()}}"
                              url="{{url()->current()}}" class="w-100">
                            @csrf
                            <div class="row">
                                <div class="col-4 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('title english') }}</label>
                                    <div class="form-group">
                                        <input class="p-2 form-control" name="title_en" value="{{ isset($item) && $item->translate('en') ? $item->translate('en')->title :'' }}" placeholder="{{ __('title english') }}">
                                    </div>
                                </div>
                                <div class="col-4 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('title arabic') }}</label>
                                    <div class="form-group">
                                        <input class="p-2 form-control" name="title_ar" value="{{ isset($item) && $item->translate('ar') ? $item->translate('ar')->title :'' }}" placeholder="{{ __('title arabic') }}">
                                    </div>
                                </div>
                                <div class="col-4 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('title french') }}</label>
                                    <div class="form-group">
                                        <input class="p-2 form-control" name="title_fr" value="{{ isset($item) && $item->translate('fr') ? $item->translate('fr')->title :'' }}" placeholder="{{ __('title french') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-4 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('details english') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2 form-control" name="en"  rows="10" cols="80" placeholder="{{ __('details english') }}">{{ isset($item) && $item->translate('en') ? $item->translate('en')->details :'' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-4 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('details arabic') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2 form-control" name="ar"  rows="10" cols="80" placeholder="{{ __('details arabic') }}">{{ isset($item) && $item->translate('ar') ? $item->translate('ar')->details :'' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-4 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('details french') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2 form-control" name="fr"  rows="10" cols="80" placeholder="{{ __('details french') }}">{{ isset($item) && $item->translate('fr') ? $item->translate('fr')->details :'' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 input-box mt-2">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('added by') }}</label>
                                    <div class="form-group">
                                        <input class="p-2 form-control" name="added_by" value="{{ isset($item) ? $item->added_by :'' }}" placeholder="{{ __('added by') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="input-box pt-2">
                                <div class="btn-box">
                                    <button type="submit" class="btn btn-primary send_question btn-block ">{{ __('save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('panel_js')

    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/sweetalert2/sweet-alerts.init.js')}}"></script>
    <script src="{{asset(config('constants.asset_path').'assets/panel/js/post.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize CKEditor on the textarea with ID 'editor1'
            // CKEDITOR.replace('editor_en');
            // CKEDITOR.replace('editor_ar');
            // CKEDITOR.replace('editor_fr');
            // CKEDITOR.replace('editor_answer_en');
            // CKEDITOR.replace('editor_answer_ar');
            // CKEDITOR.replace('editor_answer_fr');

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
                        window.location.href = '{{ route('questions.index') }}';
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
