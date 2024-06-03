<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\specializes\StoreRequest;
use App\Models\Specialize;
use App\Repositories\Panel\AppointmentEloquent;
use App\Repositories\Panel\SpecializeEloquent;
use Illuminate\Http\Request;

class specializesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $specialize;
    public function __construct(SpecializeEloquent $SpecializeEloquent)
    {
        $this->specialize = $SpecializeEloquent;
    }


    public function index(Specialize $specialize)
    {
        return view('panel.specializes.index');
    }

    public function getDataTable()
    {
        return $this->specialize->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.specializes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->specialize->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->specialize->edit($id) ;
        return view('panel.specializes.create' , $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, StoreRequest $request)
    {
        $response = $this->specialize->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }


    public function delete($id)
    {
        $response = $this->specialize->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }

}
