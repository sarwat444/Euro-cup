<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
   public function doctor_details($doctor_id)
   {
       $doctor = User::whereHas('doctorInfo')->with('doctorInfo')->where(['user_type'=>  'doctor'  , 'id' => $doctor_id])->first();
       return view('front.doctors.doctor-details' , compact('doctor')) ;
   }
    public function doctors()
    {
        $doctors = User::whereHas('doctorInfo')->with('doctorInfo')->where(['user_type'=>  'doctor'])->get();
        return view('front.doctors.all-doctors' , compact('doctors')) ;
    }

}
