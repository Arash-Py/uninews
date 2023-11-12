<?php

namespace App\Rules;

use App\Lib\NationalCode;
use Illuminate\Contracts\Validation\Rule;

class VerifyNationalcodeRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return NationalCode::check($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'کد ملی اشتباه است';
    }
}
