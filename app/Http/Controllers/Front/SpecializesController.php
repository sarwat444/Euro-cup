<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Specialize;
use App\Models\SpecializeTranslation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder; // Import the correct Builder class


class SpecializesController extends Controller
{
    public function index()
    {
        $specializes = Specialize::all() ;
        return view('front.specializes.index' , compact('specializes')) ;
    }
    public function specializes_doctors($specialize_id)
    {
        $doctors = User::whereHas('doctorInfo', function ($query) use ($specialize_id) {
            $query->where('specialize_id', $specialize_id);
        })->with('doctorInfo')->where('user_type', 'doctor')->get();
        return view('front.doctors.index' , compact('doctors')) ;
    }
    public function search(Request $request)
    {
        $search = $request->get('search');

        $specializes = Specialize::select('id' ,'icon')
            ->where(function (Builder $query) use ($search) { // Use the correct Builder class here
                $query->whereHas('translations', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->with('translations:specialize_id,name,locale') // Specify the columns you need for translations
            ->take(10)
            ->get();

        return response()->json($specializes);
    }
}
