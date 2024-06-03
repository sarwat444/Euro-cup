<?php

namespace App\Repositories\Panel;

use App\Models\Appointment;
use App\Models\Country;
use App\Models\Specialize;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PatientEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $patients = User::select('*')->where('user_type', 'user')->get();
        return DataTables::of($patients)
            ->addIndexColumn()
            ->addColumn('name', function ($patient) {
                return $patient->first_name . ' ' . $patient->last_name;
            })->addColumn('created at', function ($patient) {
                return date('d.m.y H:i', strtotime($patient->created_at));
            })->addColumn('action', function ($patient) {
                return view('panel.patients.partials.actions', compact('patient'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            //$data['code_country'] = $country->phone_code;
            $data['user_type'] = 'user';
            $data['password'] = bcrypt('12345678');
            if(isset($data['image'])){
                $data['image'] = uploadImage($data['image'], 'patients');
            }
            User::updateOrCreate(['id' => 0], $data);
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch (\Exception $e) {
            $message = __('message_error');
            $status = false;
            DB::rollback();
            dd($e);
        }
        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }
    public function create(): array
    {
        $lang = App::getLocale();
        $data['specializes'] = Specialize::where('active',1)->get();
        return $data;
    }

    public function show($id) {
        return User::findOrFail($id);
    }

    public function getAllAppointments(): \Illuminate\Database\Eloquent\Collection
    {
        return Appointment::all();
    }

}
