<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AlternativeMedicineController extends Controller
{
    public function doctors()
    {
        $doctors = User::whereHas('doctorInfo')->with('doctorInfo')->where(['user_type'=>  'doctor'])->get();
        return view('front.AlternativeMedicine.doctors' , compact('doctors')) ;
    }

    public function doctor_details($doctor_id)
    {
        $doctor = User::whereHas('doctorInfo')->with('doctorInfo')->where(['user_type'=>  'doctor'  , 'id' => $doctor_id])->first();
        return view('front.AlternativeMedicine.doctor-details' , compact('doctor')) ;
    }

}
