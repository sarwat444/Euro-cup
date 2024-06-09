<?php

namespace App\Repositories\Panel;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class UserEloquent extends HelperEloquent
{

    public function getDataTable()
    {

        $users = User::select('*')->get();
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('first_name', function ($user) {
                return $user->first_name;
            })->addColumn('last_name', function ($user) {
                return  $user->last_name;
            })->addColumn('email', function ($user) {
                return $user->email;
            })->addColumn('phone', function ($user) {
                return $user->mobile;
            })->addColumn('pharmacy_name', function ($user) {
                return $user->pharmacy_name;
            })->addColumn('government', function ($user) {
                return $user->government;
            })->addColumn('gender', function ($user) {
                return $user->gender;
            })->addColumn('file', function ($user) {
                return view('panel.users.partials.file', compact('user'))->render();
            })->addColumn('created at', function ($user) {
                return date('d.m.y H:i', strtotime($user->created_at));
            })
            ->rawColumns(['file'])
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
                $data['image'] = uploadImage($data['image'], 'users');
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

    public function show($id) {
        return User::findOrFail($id);
    }


}
