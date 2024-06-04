
<td>
    <div class="form-check-size">
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input check-size active_status" id="{{ $vote->id }}" type="checkbox"
                   @if(checkWinner($vote->id, $vote->user_id)) checked @endif
                   data-id="{{ $vote->id }}" data-user-id="{{ $vote->user_id }}" role="switch">
        </div>
    </div>
</td>
