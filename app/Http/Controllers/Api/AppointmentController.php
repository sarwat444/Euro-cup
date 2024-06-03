<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Appointment\AppointmentRequest;
use App\Repositories\Api\AppointmentEloquent;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointment_eloquent;
    public function __construct(AppointmentEloquent $appointment_eloquent)
    {
        $this->appointment_eloquent = $appointment_eloquent;
    }
    public function store(AppointmentRequest $request) {
        $response = $this->appointment_eloquent->store($request);
        return $response;
    }

    public function show($id) {
        $response = $this->appointment_eloquent->show($id);
        return $response;
    }

    public function userAppointments() {
        $type     = request()->header('type')??'current';
        $response = $this->appointment_eloquent->userAppointments($type);
        return $response;
    }
}
