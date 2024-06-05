<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Advertisment} ;

class HomeController extends Controller
{
    public function index()
    {
        $sliders  = Advertisment::where(['active' => 1])->limit(5)->get() ;
        return view('front.home' , compact('sliders'));
    }
}
