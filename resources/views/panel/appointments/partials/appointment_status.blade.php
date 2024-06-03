@if($appointment->payment_status == 'pending')
    <span class="badge badge-warning">Pending</span>
@elseif($appointment->payment_status == 'paid')
    <span class="badge badge-success">Paid</span>
@elseif($appointment->payment_status == 'cancelled')
    <span class="badge badge-danger">Canceled</span>
@endif
