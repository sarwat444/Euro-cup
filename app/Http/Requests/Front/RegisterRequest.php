<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users' ,
            'code_country' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'country_id' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'plz_code' => 'required|string|max:255',
            'street' => 'nullable|string|max:255',
            'password' => 'required|string|min:8',
            'gender' => 'required'
        ];
    }
}
