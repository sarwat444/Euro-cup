<?php

namespace App\Http\Requests\Panel\appointments;

use App\Traits\ResponseJson;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ResponseJson;
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
            'doctor_id'             => ['required', 'exists:users,id'],
            'specialize_id'         => 'required|exists:specializes,id',
            'message'               => 'nullable|max:1000',
            'full_name'             => 'required|string|max:500',
            'gender'                => 'required|in:male,female',
            'breastfeeding_status'  => 'sometimes|in:pregnant,breastfeeding,not_breastfeeding',
            'age'                   => 'required|integer|min:0',
            'height'                => 'required|integer|min:0',
            'weight'                => 'required|integer|min:0',
            'country'               => 'required|string|max:100',
            'nationality'           => 'nullable|string|max:100',
            'work'                  => 'nullable|string|max:255',
            'email'                 => 'nullable|string|max:100',
            'phone_number'          => 'required|string|max:100',
            'medications_allergy'   => 'boolean',
            'is_smoker'             => 'boolean',
            'drink_alcohol'         => 'boolean',
            'allergy_medications_names'  => 'nullable',
            'had_surgeries'              => 'boolean',
            'surgeries_names'            => 'nullable',
            'had_hereditary_diseases'    => 'boolean',
            'hereditary_diseases_names'  => 'nullable',
            'take_medications_regularly' => 'boolean',
            'compliant'                  => 'nullable',
            'taking_medications'         => 'nullable',
            'urgent'                     => 'boolean',
            'voice'               => 'nullable',
            'medications_voice'   => 'nullable',
            'compliant_voice'     => 'nullable',
            'regularly_medications_image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
            'test_medical_attachment'     => 'nullable|array',
            'test_medical_attachment.*'   => 'file|mimes:pdf',
            'x_rays_images'               => 'nullable|array',
            'x_rays_images.*'             => 'image', // Adjust the max file size as needed
            'cd_reports_images'           => 'nullable|array',
            'cd_reports_images.*'         => 'image',
            'medications_images'          => 'nullable|array',
            'medications_images.*'        => 'image',
            'cd_reports_video'            => 'nullable',
            'chronic_diseases'        => 'nullable',
            'has_chronic_diseases'    => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'doctor_id.required'      => __('The_doctor_ID_field_is_required.'),
            'doctor_id.exists'        => __('The_selected_doctor_ID_is_invalid.'),
            'specialize_id.required'  => __('The_specialize_ID_field_is_required.'),
            'specialize_id.exists'    => __('The_selected_specialize_ID_is_invalid.'),
            'age.required'            => __('The_age_field_is_required.'),
            'age.integer'             => __('The_age_must_be_an_integer.'),
            'age.min'                 => __('The_age_must_be_at_least_:min.'),
            'height.required'         => __('The_height_field_is_required.'),
            'height.integer'          => __('The_height_must_be_an_integer.'),
            'height.min'              => __('The_height_must_be_at_least_:min.'),
            'sleep_average_hours.integer' => __('The_sleep_average_hours_must_be_an_integer.'),
            'sleep_average_hours.min' => __('The_sleep_average_hours_must_be_at_least_:min.'),
            'sleep_average_hours.max' => __('The_sleep_average_hours_must_not_exceed_:max.'),
            'meals_num_per_day.integer' => __('The_meals_number_per_day_must_be_an_integer.'),
            'meals_num_per_day.min' => __('The_meals_number_per_day_must_be_at_least_:min.'),
            'is_smoker.boolean' => __('The_is_smoker_field_must_be_a_boolean.'),
            'is_diabetes.boolean' => __('The_is_diabetes_field_must_be_a_boolean.'),
            'heart_problem.boolean' => __('The_heart_problem_field_must_be_a_boolean.'),
            'chronic_disease.boolean' => __('The_chronic_disease_field_must_be_a_boolean.'),
            'gender.required' => __('The_gender_field_is_required.'),
            'gender.in' => __('The_selected_gender_is_invalid.'),
            'notes.string' => __('The_notes_must_be_a_string.'),
            'notes.max' => __('The_notes_may_not_be_greater_than_:max_characters.'),
            'compliant.string' => __('The_compliant_must_be_a_string.'),
            'compliant.max' => __('The_compliant_may_not_be_greater_than_:max_characters.'),
            'medications.string' => __('The_medications_must_be_a_string.'),
            'medications.max' => __('The_medications_may_not_be_greater_than_:max_characters.'),
            'voice.mimes' => __('The_voice_must_be_a_sound_file_in_MP3_or_WAV_format.'),
            'medications_voice.mimes' => __('The_medications_voice_must_be_a_sound_file_in_MP3_or_WAV_format.'),
            'compliant_voice.mimes' => __('The_compliant_voice_must_be_a_sound_file_in_MP3_or_WAV_format.'),
            'attachment.array' => __('The_attachment_must_be_an_array.'),
            'attachment.*.file' => __('The_attachment_must_be_a_file.'),
            'attachment.*.mimes' => __('The_attachment_must_be_a_PDF_file.'),
            'images1.array' => __('The_images1_must_be_an_array.'),
            'images1.*.image' => __('The_images1_must_be_an_image_file.'),
            'images1.*.max' => __('The_images1_may_not_be_greater_than_:max_kilobytes.'),
            'images2.array' => __('The_images2_must_be_an_array.'),
            'images2.*.image' => __('The_images2_must_be_an_image_file.'),
            'images2.*.max' => __('The_images2_may_not_be_greater_than_:max_kilobytes.'),
        ];
    }
}
