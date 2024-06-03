
<td>
    <div class="form-check-size">
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input check-size active_status" id="{{ $order->id }}" type="checkbox" role="switch"  {{ $order->status == 'completed' ? 'disabled' : '' }}   {{ ($order->status != 'cancelled' && $order->status != 'completed') ? 'checked' : '' }}>
        </div>
    </div>
</td>
