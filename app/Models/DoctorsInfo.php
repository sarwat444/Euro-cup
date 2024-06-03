<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DoctorsInfo extends Model
{
    use HasFactory , Translatable;
    protected $guarded = ['id'];

    public $translatedAttributes  = ['languages' , 'address' , 'details', 'country' ,'city'];

    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                if ($request->get($attribute . '_' . $key) != null && !empty($request->$attribute . $key)) {
                    $this->{$attribute . ':' . $key} = $request->get($attribute . '_' . $key);
                }
            }
            $this->save();
        }
        return $this;
    }
    public function specializeion()
    {
        return $this->belongsTo(Specialize::class ,'specialize_id');
    }
}
