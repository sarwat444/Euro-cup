<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User,Winner , Advertisment,Vote};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $users  = User::count() ;
        $winners = Winner::count() ;
        $advertisments = Advertisment::count() ;
        $Votes = Vote::count() ;

        $data = [
            'users' => $users ,
            'winners' => $winners ,
            'advertisments' => $advertisments ,
            'Votes' => $Votes

        ];

        return view('panel.home',$data);
    }
}
