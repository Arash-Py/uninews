<?php

namespace App\Http\Requests\Api\V1\Watchman\Park;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        //TODO validation for region and word
        return [
            'word' => 'required',
            'region_number' => 'required',
            'number' => 'required'
        ];
    }
}
