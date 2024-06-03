<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\StoreRequest;
use App\Repositories\Api\OrdersEloquent;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $order_eloquent;

    public function __construct(OrdersEloquent $order_eloquent)
    {
        $this->order_eloquent = $order_eloquent;
    }
    public function index(Request $request) {
        $type     = request()->header('type')??'current';
        $response = $this->order_eloquent->myOrders($type);
        return $response;
    }

    public function store(StoreRequest $request) {
        $response = $this->order_eloquent->store($request);
        return $response;
    }
    public function update($id , StoreRequest $request) {
        $response = $this->order_eloquent->update($id , $request);
        return $response;
    }

    public function show($id) {
        $response = $this->order_eloquent->show($id);
        return $response;
    }

    public function cancel($id) {
        $response = $this->order_eloquent->cancel($id);
        return $response;
    }
}
