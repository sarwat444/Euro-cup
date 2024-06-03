@if($appointment->urgent)
    <span class="badge badge-success">{{ __('yes') }}</span>
@else
    <span class="badge badge-danger">{{ __('no') }}</span>
@endif
