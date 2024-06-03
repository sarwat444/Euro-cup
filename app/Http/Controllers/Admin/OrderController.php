<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\orders\StoreRequest;
use App\Repositories\Panel\OrderEloquent;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $order;
    public function __construct(OrderEloquent $orderEloquent)
    {
        $this->order = $orderEloquent;
    }


    public function index()
    {
        return view('panel.orders.index');
    }

    public function getDataTable()
    {
        return $this->order->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->order->create();
        return view('panel.orders.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->order->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = $this->order->show($id);
        return view('panel.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->order->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }

    public function changeStatus($id)
    {
        $response = $this->order->changeStatus($id);
        return $this->response_api($response['status'], $response['message']);
    }
}
