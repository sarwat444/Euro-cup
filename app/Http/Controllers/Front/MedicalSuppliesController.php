<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreMedicalSuppliesRequest;
use App\Models\Country;
use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class MedicalSuppliesController extends Controller
{
    public function create()
    {
        $lang = App::getLocale();
        $countries = Country::where('status', 1)->select('id', 'name_' . $lang . ' as name')->get();
        return view('front.medicalSupplies.create', compact('countries'));
    }

    public function storeMedicalSupplies(StoreMedicalSuppliesRequest $StoreMedicalSuppliesRequest)
    {
        try {
            Order::create($StoreMedicalSuppliesRequest->validated());
            return response()->json(['message' => 'Stored Successfully'], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // If there are validation errors, return them as JSON response
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}
