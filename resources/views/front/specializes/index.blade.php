@extends('front.layouts')
@push('title',__('front.Medical specialties'))
@push('styles')
<style>
    .btn-close {
        margin: 0 !important
    }
    .modal-footer
    {
        display: block;
    }
</style>
@endpush
@section('content')
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{__('front.Medical specialties')}}</h2>
                    <ul>
                        <li>
                            <a href="{{__('front.home')}}">{{__('front.home')}}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{__('front.Medical specialties')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="search-area mb-4 mt-4" style="text-align: left">
        <div class="container">
            <div  class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-1 search-box text-center">
                            <span><i class="icofont-search-1"></i> </span>
                        </div>
                        <div class="col-10">
                            <input  type="text" class="form-control search-input" name="search" placeholder="{{__('front.Ex : Children , Brain And Nerves  , Stomach')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="departments-area pt-70">
        <div class="container">
            <div class="row" id="specializes-container">
                @forelse($specializes as $specilize)
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{route('specializes_doctors' , $specilize->id)}}">
                        <div class="department-item" >
                            @if(!empty($specilize->icon))
                                <img src="{{ asset(config('constants.asset_path').'uploads/specializes/'.$specilize->icon) }}" alt="category" height="90" class="mb-3">
                            @else
                                <img src="{{ asset(config('constants.asset_path').'assets/front/img/no-photo.png') }}" alt="category" height="90" class="mb-3">
                            @endif
                            <h3>{{$specilize->name}}</h3>
                        </div>
                        </a>
                    </div>
                @empty
                    <span class="text-danger text-center">{{__('front.No Category')}}</span>
                @endforelse
            </div>
        </div>
    </section>




@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.search-input').keyup(function() {
                var searchValue = $(this).val().trim();

                // AJAX call to fetch filtered data
                $.ajax({
                    url: "{{ route('search_specializes') }}",
                    method: 'GET',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        // Clear the previous data
                        $('#specializes-container').empty();

                        // Append the filtered data
                        if (response.length > 0) {
                            response.forEach(function(specilize) {
                                var iconUrl = specilize.icon ? "{{ asset(config('constants.asset_path').'uploads/specializes/') }}"+"/" + specilize.icon : "{{ asset(config('constants.asset_path').'assets/front/img/no-photo.png') }}";
                                var specializeItem = '<div class="col-sm-6 col-lg-4">' +
                                    '<a href="{{ route('specializes_doctors', ':id') }}'.replace(':id', specilize.id) + '">' +
                                    '<div class="department-item">' +
                                    '<img src="' + iconUrl + '" alt="category" height="90" class="mb-3">' +
                                    '<h3>' + specilize.name + '</h3>' +
                                    '</div>' +
                                    '</a>' +
                                    '</div>';

                                $('#specializes-container').append(specializeItem);
                            });
                        } else {
                            $('#specializes-container').append('<span class="text-danger text-center">{{__("front.No Category")}}</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
