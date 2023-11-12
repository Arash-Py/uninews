<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PlaceFactory extends Factory
{
    protected $model = Place::class;
    private $usedDigits = [];

    public function definition(): array
    {
        $this->model::query()->delete();
        $stations = Station::pluck('id')->toArray();
        return [
            'number' => $this->getRandomUniqueDigit(),
            'status' => $this->faker->randomElement(['available','unavailable','disabled']),
            'station_id' => $this->faker->randomElement($stations),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    private function getRandomUniqueDigit()
    {
        $availableDigits = array_diff(range(10, 123456), $this->usedDigits);

        if (empty($availableDigits)) {
            throw new Exception("All digits have been used.");
        }

        $randomDigit = $this->faker->randomElement($availableDigits);
        $this->usedDigits[] = $randomDigit;

        return $randomDigit;
    }
}
