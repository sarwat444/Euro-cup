<?php

namespace App\Http\Requests\Panel\questions;

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
            'category_id'  => 'required|exists:categories,id',
            'is_public'  => 'nullable',
            'is_answer'  => 'nullable',
            'is_private'  => 'nullable',
            'en'      => 'required|max:5000',
            'ar'      => 'required|max:5000',
            'fr'      => 'required|max:5000',
        ];
    }

    public function messages() {
        return [
            'category_id.required' => __('the_category_id_field_is_required'),
            'category_id.exists' => __('the_selected_category_is_invalid'),
            'en.required' => __('the_en_details_field_is_required'),
            'en.string' => __('the_en_details_must_be_a_string'),
            'en.max' => __('the_en_details_may_not_be_greater_than_:max_characters', ['max' => 2000]),
            'ar.required' => __('the_ar_details_field_is_required'),
            'ar.string' => __('the_ar_details_must_be_a_string'),
            'ar.max' => __('the_ar_details_may_not_be_greater_than_:max_characters', ['max' => 2000]),
            'fr.required' => __('the_fr_details_field_is_required'),
            'fr.string' => __('the_fr_details_must_be_a_string'),
            'fr.max' => __('the_fr_details_may_not_be_greater_than_:max_characters', ['max' => 2000]),
        ];
    }

}
