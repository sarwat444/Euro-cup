<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialize extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class , 'doctor_id' ,  'id')->with('doctorInfo') ;
    }
    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id' ,  'id') ;
    }
    public function specialize(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Specialize::class , 'specialize_id' ,  'id') ;
    }
    public function attachments(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AppointmentAttachments::class , 'appointment_id' ,  'id') ;
    }

    public function meeting_info() {
        return $this->hasOne(UserMeeting::class  ,  'id' , 'meeting_id') ;
    }

}
