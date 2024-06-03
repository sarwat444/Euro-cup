<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ChangePasswordRequest;
use App\Http\Requests\Api\User\LoginRequest;
use App\Http\Requests\Api\User\RegisterRequest;
use App\Http\Requests\Api\User\updateProfileRequest;
use App\Http\Requests\Api\User\VerifyCodeRequest;
use App\Repositories\Api\AuthEloquent;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $auth_eloquent;

    public function __construct(AuthEloquent $auth_eloquent)
    {
        $this->auth_eloquent = $auth_eloquent;
    }

    public function register(RegisterRequest $request)
    {
        $repopnse = $this->auth_eloquent->register($request);
        return $repopnse;
    }

    public function verify(VerifyCodeRequest $request) {

        $repopnse = $this->auth_eloquent->verify($request);
        return $repopnse;
    }

    public function login(LoginRequest $request) {

        $repopnse = $this->auth_eloquent->login($request);
        return $repopnse;
    }

    public function user_info() {
        $repopnse = $this->auth_eloquent->user_info();
        return $repopnse;
     }
    public function updateProfile(updateProfileRequest $request) {
        $repopnse = $this->auth_eloquent->updateProfile($request);
        return $repopnse;
    }

    public function changePassword(ChangePasswordRequest $request) {
        $repopnse = $this->auth_eloquent->changePassword($request);
        return $repopnse;
    }

    public function contact_us( Request $request ) {
        $repopnse = $this->auth_eloquent->contact_us($request);
        return $repopnse;
    }

    public function reset_password_request(Request $request) {

        $repopnse = $this->auth_eloquent->reset_password_request($request);
        return $repopnse;
    }

    public function verify_token(Request $request) {
        $repopnse = $this->auth_eloquent->verify_token($request);
        return $repopnse;
    }

    public function reset_password_submit(Request $request)
    {
        $repopnse = $this->auth_eloquent->reset_password_submit($request);
        return $repopnse;
    }
}
