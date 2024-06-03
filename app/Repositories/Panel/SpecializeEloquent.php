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

class SpecializeEloquent extends HelperEloquent
{
    public function getDataTable()
    {
        $data = Specialize::select('*')
            ->with('translations:specialize_id,name,locale')
            ->orderByDesc('created_at')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function ($specilize) {
                return view('panel.specializes.partials.image', compact('specilize'))->render();
            })
            ->addColumn('action', 'panel.specializes.partials.actions')
            ->rawColumns(['image' , 'action'])
            ->make(true);
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if (!isset($data['active'])) {
                $data['active'] = 0;
            }

            if(isset($data['icon'])){
                $data['icon'] = uploadImage($data['icon'], 'specializes');
            }
            Specialize::updateOrCreate(['id' => 0], $data)->createTranslation($request);
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

    public function edit($id)
    {
        $data['item'] = Specialize::where('id', $id)->first();
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
            if (!isset($data['active'])) {
                $data['active'] = 0;
            }
            if(isset($data['icon'])){
                $data['icon'] = uploadImage($data['icon'], 'specializes');
            }
            Specialize::updateOrCreate(['id' => $id], $data)->createTranslation($request);
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
    public function delete($id)
    {
        $item = Specialize::find($id);
        if ($item) {
            $item->delete();
            $message =__('delete_done');
            $status = true;
            $response = [
                'message' => $message,
                'status' => $status,
            ];
            return $response;
        }
        $message = __('message_error');
        $status = false;

        $response = [
            'message' => $message,
            'status' => $status,
        ];
        return $response;
    }



}
