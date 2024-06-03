<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Order extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = ['id'];
    public function user() {
       return $this->belongsTo(User::class);
    }
    public function country()
    {
        $lang = App::getLocale();
        return $this->belongsTo(Country::class , 'country_id' , 'id')->select('id','name_'.$lang.' as name');
    }

}
