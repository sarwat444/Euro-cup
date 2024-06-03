<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\DoctorsResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DoctorsController extends Controller
{
    public function index() {
        $lang   = App::getLocale();
        return  DoctorsResource::collection(User::whereHas('doctorInfo')->with(['doctorInfo:id,user_id,specialize_id,min_price,max_price,has_urgent,urgent_amount,appointment_examination_reply_time,alternative_medicine_price,alternative_medicine_reply_time', 'doctorInfo.specializeion:id'])->where('user_type' , 'doctor')->paginate(config('constants.PAGIBNATION_COUNT')));
    }
}
