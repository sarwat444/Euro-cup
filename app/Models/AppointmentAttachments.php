<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentAttachments extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getTestMedicalAttachmentAttribute($value)
    {
        return json_decode($value);
    }

    public function getXRaysImagesAttribute($value)
    {
        return json_decode($value);
    }

    public function getCdReportsImagesAttribute($value)
    {
        return json_decode($value);
    }

    public function getMedicationsImagesAttribute($value)
    {
        return json_decode($value);
    }

}
