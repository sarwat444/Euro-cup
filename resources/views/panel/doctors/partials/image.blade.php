@if($doctor->image)
    <td>
        <div class="image mb-3">
            @if(!empty($doctor->image))
                <img style="height: 40px;margin-top: 20px;margin-right: 10px;" alt="" src="{{ asset(config('constants.asset_path') . $doctor->image) }}">
            @else
                <img style="height: 40px;margin-top: 20px;margin-right: 10px;" alt="" src="{{ asset(config('constants.asset_path') . 'assets/panel/images/no_iamge.jpg') }}" >
        @endif
    </td>
@else
    <td>
    <img style="height: 40px;margin-top: 20px;margin-right: 10px;" alt="" src="{{ asset(config('constants.asset_path') . 'assets/panel/images/no_iamge.jpg') }}" >
    </td>
@endif
