<?php

namespace App\Http\Requests\Panel\doctors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mobile'                    => 'nullable|string|min:5|max:20',
            'first_name'                => 'required|string|min:3|max:255',
            'last_name'                 => 'required|string|min:3|max:255',
            'email'                     => 'required|email|max:50|unique:users,email',
            'country_id'                => ['required',Rule::exists('countries','id')],
            'languages_en'              => 'required|max:200',
            'languages_ar'              => 'required|max:200',
            'languages_fr'              => 'required|max:200',
            'country_en'                => 'required|max:200',
            'country_ar'                => 'required|max:200',
            'country_fr'                => 'required|max:200',
            'city_en'                   => 'required|max:200',
            'city_ar'                   => 'required|max:200',
            'city_fr'                   => 'required|max:200',
            'details_en'                => 'required|max:200',
            'details_ar'                => 'required|max:200',
            'details_fr'                => 'required|max:200',
            'image'                     => ['mimes:jpeg,png,jpg,gif,svg,bmp', 'max:4096'],
            'gender'                    => 'required|in:male,female',
            'specialize_id'             => ['required',Rule::exists('specializes','id')],
            'min_price'                 => 'required|numeric|min:1|max:10000',
            'max_price'                 => 'required|numeric|min:1|max:10000',
            'alternative_medicine_price' => 'required|numeric|min:1|max:10000',
            'appointment_examination_reply_time'   => 'required|numeric|min:1|max:10000',
            'urgent_amount'             => 'required|numeric|min:1|max:10000',
        ];
    }
}
