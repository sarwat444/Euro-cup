<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeMedicineOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user() {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id' , 'id')->with('doctorInfo');
    }
}
