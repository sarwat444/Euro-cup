<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\advertisments\StoreRequest;
use App\Models\Advertisment;
use App\Repositories\Panel\advertismentEloquent;
use Illuminate\Http\Request;

class advertismentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $advertisment;
    public function __construct(advertismentEloquent $advertismentEloquent)
    {
        $this->advertisment = $advertismentEloquent;
    }


    public function index(Advertisment $advertisment)
    {
        return view('panel.advertisments.index');
    }

    public function getDataTable()
    {
        return $this->advertisment->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.advertisments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->advertisment->store($request);
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
        $data = $this->advertisment->edit($id) ;
        return view('panel.advertisments.create' , $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, StoreRequest $request)
    {
        $response = $this->advertisment->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }


    public function delete($id)
    {
        $response = $this->advertisment->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }

}
