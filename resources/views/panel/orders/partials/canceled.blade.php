@if($order->cancelled)
    <span class="badge badge-danger">{{ __('yes') }}</span>
@else
    <span class="badge badge-success">{{ __('no') }}</span>
@endif
