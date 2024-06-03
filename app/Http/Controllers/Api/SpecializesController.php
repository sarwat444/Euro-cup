<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\DoctorsResource;
use App\Http\Resources\Api\SpecializesResource;
use App\Models\Specialize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SpecializesController extends Controller
{
    public function index() {
        return SpecializesResource::collection(Specialize::all());
    }
    public function doctors($specialize_id) {
        $lang   = App::getLocale();
        return  DoctorsResource::collection(User::whereHas('doctorInfo', function ($query) use ($specialize_id) {
                                            $query->where('specialize_id', $specialize_id);
                                })->with(['doctorInfo:id,user_id,specialize_id,min_price,max_price,has_urgent,urgent_amount,appointment_examination_reply_time' , 'doctorInfo.specializeion:id'])->where('user_type' , 'doctor')->paginate(config('constants.PAGIBNATION_COUNT')));
    }


}
