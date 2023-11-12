<?php

namespace App\Rules\Api\V1\User\Park;

use App\Enums\PlaceStatus;
use App\Models\Place;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckPlaceConditionRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $place = Place::where('number', $value)->whereNot('status', PlaceStatus::disabled)->first();
        if ($place) {
            if ($place->status == PlaceStatus::unavailable) {
                $fail(trans('messages.taken_place'));
            }
        } else {

            $fail(trans('messages.wrong_place_number'));
        }
    }
}
