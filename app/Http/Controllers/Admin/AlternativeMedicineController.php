<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Panel\AlternativeMedicineEloquent;
use Illuminate\Http\Request;

class AlternativeMedicineController extends Controller
{
    private $order;
    public function __construct(AlternativeMedicineEloquent $order_eloquent)
    {
        $this->order = $order_eloquent;
    }

    public function index()
    {
        return view('panel.alternative_medicine.index');
    }

    public function getDataTable()
    {
        return $this->order->getDataTable();
    }

    public function operation(Request $request)
    {
        $response = $this->order->operation($request);
        return $this->response_api($response['status'], $response['message']);
    }
}
