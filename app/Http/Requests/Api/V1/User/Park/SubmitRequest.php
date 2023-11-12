<?php

namespace App\Http\Requests\Api\V1\User\Park;

use App\Rules\Api\V1\User\Car\CarIsOwn;
use App\Rules\Api\V1\User\Park\CheckPlaceConditionRule;
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
        return [
            "car_id" => ['required', new CarIsOwn],
            "place_number" => ['required', new CheckPlaceConditionRule]
        ];
    }
}
