<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Question;
use App\Models\Specialize;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $appointments=  Appointment::count()  ;
        $doctors  = User::where('user_type' ,'doctor')->count() ;
        $medical_specialists  = Specialize::count() ;
        $questions  = Question::count() ;
        $blogs = Blog::count()  ;
        $orders = Order::count() ;
        $latest_orders  = Order::orderBy('id'  , 'DESC')->limit(4)->get();
        $data = [
            'appointments' => $appointments ,
            'doctors' => $doctors ,
            'medical_specialists' => $medical_specialists ,
            'questions' => $questions ,
            'blogs' => $blogs ,
            'orders' => $orders ,
            'latest_orders' => $latest_orders
        ];
        return view('panel.home',$data);
    }
}
