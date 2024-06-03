<?php

namespace App\Repositories\Panel;

use App\Models\Appointment;
use App\Models\Country;
use App\Models\Order;
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class OrderEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $orders = Order::select('*')
            ->with([
                'user:id,first_name,last_name',
                'country',
            ])->get();
        return DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('user', function ($order) {
                return $order->user->first_name . ' ' . $order->user->last_name;
            })->addColumn('country', function ($order) {
                return $order->country->name;
            })->addColumn('canceled', function ($order) {
                return view('panel.orders.partials.canceled', compact('order'))->render();
            })->addColumn('active', function ($order) {
                return view('panel.orders.partials.active', compact('order'))->render();
            })->addColumn('created at', function ($order) {
                return date('d.m.y H:i', strtotime($order->created_at));
            })->addColumn('action', function ($order) {
                return view('panel.orders.partials.actions', compact('order'))->render();
            })->rawColumns(['action', 'canceled', 'active'])
            ->make(true);
    }

    public function show($id) {
        return Order::with(['user', 'country'])->findOrFail($id);
    }

    public function create(): array
    {
        $lang = App::getLocale();
        $data['countries'] = Country::where('status',1)->select('id','name_'.$lang.' as name', 'phone_code')->orderBy('name')->get();
        return $data;
    }
    public function store($request) {
        DB::beginTransaction();
        try {
            $data            = $request->all();
            $data['user_id'] = $this->getUser(true)->id;
            Order::updateOrCreate(['id' => 0], $data);
            DB::commit();
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch(Exception $e) {
            $message = __('message_error');
            $status = false;
            DB::rollback();
        }
        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }

    public function changeStatus($id)
    {
        $appointment = Order::find($id);
        if ($appointment->status == 'cancelled'){
            $appointment->status = 'pending';
        }else{
            $appointment->status = 'cancelled';
        }
        $appointment->save();

        $response = [
            'message' => __('message_done'),
            'status' => true,
        ];
        return $response;
    }

    public function delete($id)
    {
        $order = Order::find($id);

        if(!$order) {
            return [
                'message' => __('message_error'),
                'status' => false,
            ];
        }

        $order->cancelled = 1;
        $order->save();

        $response = [
            'message' => __('message_done'),
            'status' => true,
        ];
        return $response;
    }

}
