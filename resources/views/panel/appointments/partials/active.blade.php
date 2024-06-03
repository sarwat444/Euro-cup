<td>
    <div class="form-check-size">
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input check-size active_status" id="{{ $appointment->id }}" type="checkbox" role="switch"  {{ $appointment->status == 'completed' ? 'disabled' : '' }}   {{ ($appointment->status != 'cancelled' && $appointment->status != 'completed') ? 'checked' : '' }}>
        </div>
    </div>
</td>
