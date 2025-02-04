<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreplanRegisterRequest extends FormRequest
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
            'training_plan_id' => ['nullable'],
            'full_name' => ['required', 'string', 'min:1', 'max:255'],
            'phone' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email', 'min:3', 'max:320'],
        ];

    }
}
