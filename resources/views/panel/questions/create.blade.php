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

@php
$englishTranslation = null;
$arabicTranslation = null;
$frenchTranslation = null;
if(isset($item)){
    $translations = $item['answers'][0]['translations'];
    foreach ($translations as $translation) {
        switch ($translation['locale']) {
            case 'en':
                $englishTranslation = $translation['details'];
                break;
            case 'ar':
                $arabicTranslation = $translation['details'];
                break;
            case 'fr':
                $frenchTranslation = $translation['details'];
                break;
        }
    }
}
@endphp

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>{{__('medical question')}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form id="form" method="{{isset($item) ? 'POST' : 'POST'}}"
                              to="{{url()->current()}}"
                              url="{{url()->current()}}" class="w-100">
                            @csrf
                            <div class="input-box mb-4 row">
                                <div class="col-6 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('select category') }}</label>
                                    <div class="form-group">
                                        <select class="form-control" name="category_id">
                                            <option selected disabled>{{ __('select category') }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ isset($item) && $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 input-box">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="input-box">
                                                <label class="font-size-14 text-black fw-medium mb-2">{{ __('answered') }}</label>
                                                <div class="form-group">
                                                    <div class="form-check form-switch form-check-inline">
                                                        <input class="form-check-input" name="is_answer" type="checkbox" role="switch" style="width: 60px; height: 30px;" {{ isset($item) && $item->is_answer ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-box">
                                                <label class="font-size-14 text-black fw-medium mb-2">{{ __('public') }}</label>
                                                <div class="form-group">
                                                    <div class="form-check form-switch form-check-inline">
                                                        <input class="form-check-input" name="is_public" type="checkbox" role="switch" style="width: 60px; height: 30px;" {{ isset($item) && $item->is_public ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input-box">
                                                <label class="font-size-14 text-black fw-medium mb-2">{{ __('private') }}</label>
                                                <div class="form-group">
                                                    <div class="form-check form-switch form-check-inline">
                                                        <input class="form-check-input" name="is_private" type="checkbox" role="switch" style="width: 60px; height: 30px;" {{ isset($item) && $item->is_private ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('question english') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2" name="en"  rows="10" cols="80">{{ isset($item) && $item->translate('en') ? $item->translate('en')->details :'' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2">{{ __('question arabic') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2" name="ar"  rows="10" cols="80">{{ isset($item) && $item->translate('ar') ? $item->translate('ar')->details :'' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2 mt-2">{{ __('question french') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2" name="fr"  rows="10" cols="80">{{ isset($item) && $item->translate('fr') ? $item->translate('fr')->details :'' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6 input-box">
                                    <input type="hidden" value="{{ isset($item) && $item['answers'][0] ? $item['answers'][0]->id : '' }}" name="answer_id">
                                    <label class="font-size-14 text-black fw-medium mb-2 mt-2">{{ __('answer english') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2" name="answerEnDetails" rows="10" cols="80">{{ isset($item) && $englishTranslation ? $englishTranslation : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2 mt-2">{{ __('answer arabic') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2" name="answerArDetails" rows="10" cols="80">{{ isset($item) && $arabicTranslation ? $arabicTranslation :'' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6 input-box">
                                    <label class="font-size-14 text-black fw-medium mb-2 mt-2">{{ __('answer french') }}</label>
                                    <div class="form-group">
                                        <textarea class="p-2" name="answerFrDetails" rows="10" cols="80">{{ isset($item) && $frenchTranslation ? $frenchTranslation :'' }}</textarea>
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
