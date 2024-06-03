<td>
    <div class="form-check-size">
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input check-size active_status" id="{{ $doctor->id }}" type="checkbox" role="switch" {{ $doctor->is_active != 0 ? 'checked' : '' }}>
        </div>
    </div>
</td>
