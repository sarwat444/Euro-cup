<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\SendVerificationCodeNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sendVerificationCode()
    {
        $code = "1234"; //substr(sprintf("%06d", mt_rand(1, 999999)), 0, 4);
        $this->validation_code = $code;
        $this->is_validation   = 1;
        $this->last_send_validation_code = Carbon::now();
        $this->update();
       // $this->notify(new SendVerificationCodeNotification($code));
    }

    public function doctorInfo()
    {
        return $this->hasOne(DoctorsInfo::class , 'user_id' , 'id')->with('specializeion');
    }

    public function country()
    {
        $lang = App::getLocale();
        return $this->belongsTo(Country::class , 'country_id' , 'id')->select('id','name_'.$lang.' as name', 'phone_code');
    }

    public function doctorAppointments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'id');
    }
    public function patientAppointments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Appointment::class, 'user_id', 'id');
    }

}
