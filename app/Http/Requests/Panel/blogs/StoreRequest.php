<?php

namespace App\Http\Requests\Panel\blogs;

use App\Traits\ResponseJson;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    use ResponseJson;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'added_by' =>'nullable',
            'title_en'  => 'required|max:200',
            'title_ar'  => 'required|max:200',
            'title_fr'  => 'required|max:200',
            'en'      => 'required|max:5000',
            'ar'      => 'required|max:5000',
            'fr'      => 'required|max:5000',
        ];
    }

    public function messages() {
        return [
            'en.required' => __('the_en_details_field_is_required'),
            'en.string' => __('the_en_details_must_be_a_string'),
            'en.max' => __('the_en_details_may_not_be_greater_than_:max_characters', ['max' => 5000]),
            'ar.required' => __('the_ar_details_field_is_required'),
            'ar.string' => __('the_ar_details_must_be_a_string'),
            'ar.max' => __('the_ar_details_may_not_be_greater_than_:max_characters', ['max' => 5000]),
            'fr.required' => __('the_fr_details_field_is_required'),
            'fr.string' => __('the_fr_details_must_be_a_string'),
            'fr.max' => __('the_fr_details_may_not_be_greater_than_:max_characters', ['max' => 5000]),
            'title_en.required' => __('the_en_title_field_is_required'),
            'title_en.string' => __('the_en_title_must_be_a_string'),
            'title_en.max' => __('the_en_title_may_not_be_greater_than_:max_characters', ['max' => 200]),
            'title_ar.required' => __('the_ar_title_field_is_required'),
            'title_ar.string' => __('the_ar_title_must_be_a_string'),
            'title_ar.max' => __('the_ar_title_may_not_be_greater_than_:max_characters', ['max' => 200]),
            'title_fr.required' => __('the_fr_title_field_is_required'),
            'title_fr.string' => __('the_fr_title_must_be_a_string'),
            'title_fr.max' => __('the_fr_title_may_not_be_greater_than_:max_characters', ['max' => 200]),
        ];
    }

}
