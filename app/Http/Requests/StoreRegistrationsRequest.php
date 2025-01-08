<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationsRequest extends FormRequest
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
//            'course_id' => ['required'],
//            'full_name' => ['required', 'string'],
//            'phone' => ['required', 'string'],
//            'email' => ['required', 'string', 'email'],
//            'gender' => ['required', 'string'],
//            'address' => ['required', 'string'],
//            'notes' => ['required', 'string'],

//            'title' => ['required','max:255'],
//            'description' => ['nullable','string'],
//            'fee' => ['required','string'],
//            'start_date' => 'date|required',
//            'end_date' => 'date|required',
//            'hours' => ['required','integer'],
//            'language' => ['required', 'string'],
//            'code' => ['string','unique:submit_courses,code'],
//            'category_id' => ['integer','exists:categories,id'],
//            'venue_id' => ['integer','exists:venues,id'],
//            'name' => ['nullable','string'],
//            'email' => ['nullable','string'],
//            'url' => ['nullable','string'],
//            'job_title' => ['nullable','string'],
//            'cv_trainer' => ['nullable','file'],
//            'selection_training' => ['array'],
//            'selection_training.name' => ['string'],
//            'selection_training.email' => ['string'],
//            'selection_training.functional_specialization' => ['string'],
//            'selection_training.phone_number' => ['string'],
//            'selection_training.trainer_id' => ['nullable','exists:user_ids,id'],
//            'num_people' => ['required','integer'],
//            'entity_type' => ['required','string'],
//            'user_id' => ['nullable','exists:user_ids,id'],
//            'course_ad_id' => ['nullable','exists:course_ads,id'],
        ];
    }
}
