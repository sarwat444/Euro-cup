<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\doctors\StoreRequest;
use App\Models\Category;
use App\Repositories\Panel\DoctorEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $doctor;
    public function __construct(DoctorEloquent $doctorEloquent)
    {
        $this->doctor = $doctorEloquent;
    }

    public function index()
    {
        return view('panel.doctors.index');
    }

    public function getDataTable()
    {
        return $this->doctor->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->doctor->create();
        return view('panel.doctors.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->doctor->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = $this->doctor->show($id);
        return view('panel.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->doctor->edit($id);
        return view('panel.doctors.create', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $response = $this->doctor->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }
    public function changeStatus($id)
    {
        $response = $this->doctor->changeStatus($id);
        return $this->response_api($response['status'], $response['message']);
    }


}
