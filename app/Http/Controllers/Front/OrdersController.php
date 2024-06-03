<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth ;

class OrdersController extends Controller
{
    public function index()
    {
        $appointements = Appointment::with('doctor' , 'doctor.doctorInfo' ,  'doctor.doctorInfo.specializeion')->where('user_id', Auth::id())->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
        $orders  = Order::where('user_id', Auth::id())->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;;
        return view('front.orders.index', compact('appointements' , 'orders'));
    }

    public function delete_appointmet($id)
    {
        try {
            $appointement = Appointment::find($id);

            if ($appointement) {

            }
            $appointement->delete();

            return redirect()->back()->with('message', 'Deleted Successfuly');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // If there are validation errors, return them as JSON response
            return response()->json(['errors' => $e->errors()], 422);
        }

    }

    public function delete_order($id = null)
    {
            try {
                $order = Order::find($id);

                if ($order) {

                }
                $order->delete();

                return redirect()->back()->with('message', 'Deleted Successfuly');

            } catch (\Illuminate\Validation\ValidationException $e) {
                // If there are validation errors, return them as JSON response
                return response()->json(['errors' => $e->errors()], 422);

            }
    }
    public  function orders_details($id = null)
    {
        try {

            $lang        = App::getLocale();
            $order = Order::with(['country' => function($query) use ($lang) {
                $query->select('id', 'phone_code', 'name_'.$lang.' as name');
            }])->find($id);
            return  view('front.orders.orders_details' , compact('order'));
            } catch (\Illuminate\Validation\ValidationException $e) {
            // If there are validation errors, return them as JSON response
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}
