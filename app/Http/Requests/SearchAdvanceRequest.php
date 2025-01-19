<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAdvanceRequest extends FormRequest
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
            'languages.*'=>['string'],
            'languages'=>['array'],
            'title' => ['string'],
            'code' => ['string'],
            'venue_ids.*'=>['integer'],
            'venue_ids'=>['array'],
            'category_ids'=>['array'],
            'category_ids.*'=>['integer'],
            'months.*'=>['required'],
            'months'=>['array'],
            'years.*'=>['required'],
            'years'=>['array'],
        ];
    }
}
