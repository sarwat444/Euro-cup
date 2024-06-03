<?php

namespace App\Repositories\Panel;

use App\Models\Appointment;

use App\Models\Category;
use App\Models\Country;
use App\Models\DoctorsInfo;
use App\Models\Specialize;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DoctorEloquent extends HelperEloquent
{

    public function getDataTable()
    {
        $doctors = User::select('*')->where('user_type', 'doctor')
            ->with([
                'doctorInfo.specializeion'
            ])
            ->get();
        return DataTables::of($doctors)
            ->addIndexColumn()
            ->addColumn('name', function ($doctor) {
                return $doctor->first_name . ' ' . $doctor->last_name;
            })->addColumn('specialize', function ($doctor) {
                return $doctor->doctorInfo?->specializeion->name;
            })->addColumn('max price', function ($doctor) {
                return $doctor->doctorInfo?->max_price;
            })->addColumn('min price', function ($doctor) {
                return $doctor->doctorInfo?->min_price;
            })
            ->addColumn('active', function ($doctor) {
                return view('panel.doctors.partials.active', compact('doctor'))->render();
            })
            ->addColumn('image', function ($doctor) {
                return view('panel.doctors.partials.image', compact('doctor'))->render();
            })->addColumn('created at', function ($doctor) {
                return date('d.m.y H:i', strtotime($doctor->created_at));
            })->addColumn('action', function ($doctor) {
                return view('panel.doctors.partials.actions', compact('doctor'))->render();
            })
            ->rawColumns(['image' , 'action' , 'active'])
            ->make(true);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $country = Country::FindOrFail($data['country_id']);
            $data['code_country'] = $country->phone_code;
            $data['user_type'] = 'doctor';
            $data['password'] = bcrypt('12345678');
            if(isset($data['image'])){
                $data['image'] = uploadImage($data['image'], 'doctors');
            }
            $doctor = User::updateOrCreate(['id' => 0], $data);
            $doctorInfo['user_id'] = $doctor->id;
            $doctor->has_urgent  = isset($data['has_urgent']) ? 1 : 0;
            $doctorInfo['specialize_id'] = $data['specialize_id'];
            $doctorInfo['min_price'] = $data['min_price'];
            $doctorInfo['max_price'] = $data['max_price'];
            $doctorInfo['alternative_medicine_price'] = $data['alternative_medicine_price'];
            $doctorInfo['appointment_examination_reply_time'] = $data['appointment_examination_reply_time'];
            $doctorInfo['urgent_amount'] = $data['urgent_amount'];
            $doctorInfo['has_urgent']  = isset($data['has_urgent']) ? 1 : 0;
            DoctorsInfo::updateOrCreate(['id' => 0], $doctorInfo)->createTranslation($request);
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
        $data['countries'] = Country::where('status',1)->select('id','name_'.$lang.' as name', 'phone_code')->orderBy('name')->get();
        $data['specializes'] = Specialize::where('active',1)->get();
        return $data;
    }

    public function show($id) {
        return User::with(['doctorInfo.specializeion', 'country', 'doctorAppointments.patient:id,first_name,last_name'])->findOrFail($id);
    }
    public function edit($id)
    {
        $lang = App::getLocale();
        $data['item'] = User::with('doctorInfo')->where('id', $id)->first();
        $data['countries'] = Country::where('status',1)->select('id','name_'.$lang.' as name', 'phone_code')->orderBy('name')->get();
        $data['specializes'] = Specialize::where('active',1)->get();
        if ($data['item'] == '') {
            abort(404);
        }
        return $data;
    }
    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if(isset($data['image'])){
                $data['image'] = uploadImage($data['image'], 'doctors');
            }
            $doctor = User::updateOrCreate(['id' => $id], $data);

            $doctorInfo['user_id'] = $doctor->id;
            $doctorInfo['specialize_id'] = $data['specialize_id'];
            $doctorInfo['min_price'] = $data['min_price'];
            $doctorInfo['max_price'] = $data['max_price'];
            $doctorInfo['alternative_medicine_price'] = $data['alternative_medicine_price'];
            $doctorInfo['appointment_examination_reply_time'] = $data['appointment_examination_reply_time'];
            $doctorInfo['urgent_amount'] = $data['urgent_amount'];
            $doctorInfo['has_urgent']  = isset($data['has_urgent']) ? 1 : 0;
            DoctorsInfo::updateOrCreate(['user_id' => $id], $doctorInfo)->createTranslation($request);
            $message = __('message_done');
            $status = true;
            DB::commit();
        }catch (\Exception $e) {
            $message = __('message_error');
            $status = false;
            DB::rollback();
        }

        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }
    public function changeStatus($id)
    {
        $doctor  = User::find($id);
        $doctor->is_active = !$doctor->is_active ;
        $doctor->save();
        $response = [
            'message' => __('message_done'),
            'status' => true,
        ];
        return $response;
    }
    public function getAllAppointments(): \Illuminate\Database\Eloquent\Collection
    {
        return Appointment::all();
    }

}
