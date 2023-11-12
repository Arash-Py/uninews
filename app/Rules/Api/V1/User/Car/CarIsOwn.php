<?php

namespace App\Rules\Api\V1\User\Car;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class CarIsOwn implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $car = Auth::user()->cars()->where('id',$value)->first();
        if (!$car)
            $fail(trans('messages.wrong_car'));
    }
}
