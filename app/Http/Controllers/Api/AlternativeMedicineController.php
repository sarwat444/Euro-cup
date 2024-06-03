<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AlternativeMedicine\AlternativeMedicineRequest;
use Illuminate\Http\Request;
use App\Repositories\Api\AlternativeMedicineEloquent;

class AlternativeMedicineController extends Controller
{
    protected $alternative_medicine_eloquent;
    public function __construct(AlternativeMedicineEloquent $alternative_medicine_eloquent)
    {
        $this->alternative_medicine_eloquent = $alternative_medicine_eloquent;
    }

    public function show ($id) {
        $response = $this->alternative_medicine_eloquent->show($id);
        return $response;
    }

    public function userOrders() {
        $type     = request()->header('type')??'current';
        $response = $this->alternative_medicine_eloquent->userOrders($type);
        return $response;
    }

    public function store(AlternativeMedicineRequest $request) {
        $response = $this->alternative_medicine_eloquent->store($request);
        return $response;
    }
}
