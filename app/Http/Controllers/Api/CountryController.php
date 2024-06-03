<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\App;

class CountryController extends Controller
{
    use ResponseJson;
    public function index() {
        $lang        = App::getLocale();
        $countries   = Country::where('status',1)->select('id','name_'.$lang.' as name')->orderBy('name')->get();
        return $this->sendResponse( __('done_success') , $countries);
    }
}
