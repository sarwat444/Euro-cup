<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = User::whereHas('doctorInfo.specializeion')->with('doctorInfo.specializeion')->where('user_type', 'doctor')->limit(5)->get() ;
        return view('front.home' , compact('doctors')) ;
    }
    public function about()
    {
        return view('front.about')  ;
    }
    public function services()
    {
        return view('front.services')  ;
    }
    public function privacy_policy()
    {
        return view('front.privacy_policy') ;
    }
    public function appointment_steps()
    {
        return view('front.appointment_steps') ;
    }
    public function Terms_of_Service()
    {
        return view('front.Terms_of_Service') ;
    }
}
