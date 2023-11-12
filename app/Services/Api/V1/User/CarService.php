<?php

namespace App\Services\Api\V1\User;

use App\Enums\CarFinanceType;
use App\Enums\PointType;
use App\Http\Resources\Api\V1\User\CarReesource;
use App\Models\Car;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarService extends Service
{
    public function model()
    {
        $this->model = Car::class;
    }

    public function getCustomerCars(): \Illuminate\Http\JsonResponse
    {
        $cars = Auth::user()->cars;
        return $this->success(CarReesource::collection($cars));
    }

    public function createNewCar(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        if ($user->cars()->count() < 2) {
            $car = $user->cars()->create([
                'name' => $request->name,
                'number' => $request->number,
                'word' => $request->word,
                'region_number' => $request->region_number,
                'balance' => 0
            ]);

            return $this->success(CarReesource::make($car));
        }
        return $this->error(trans('messages.cars_are_full'), 422);
    }

    public function updateCustomerCar(Request $request, Car $car): \Illuminate\Http\JsonResponse
    {
        if ($car->verified_at) {
            $car->update([
                'name' => $request->name,
            ]);
        } else {
            $car->update($request->validated());
        }

        return $this->success(CarReesource::make($car));
    }

    public function getCarDetails(Car $car): \Illuminate\Http\JsonResponse
    {
        return $this->success(CarReesource::make($car));
    }

    public function deleteCustomerCar(Car $car): \Illuminate\Http\Response
    {
        $car->delete();
        return $this->noContent();
    }

    public function chargeCar(Car $car, Request $request)
    {
        $request->validate(['price' => 'required|integer|min:30000']);
        $car->finance()->create([
            'amount' => $request->price,
            'type' => CarFinanceType::increase
        ]);
        Auth::user()->points()->create([
            'type' => PointType::increase,
            'amount' => 100
        ]);
        return $this->success(['added_point' => 100], 200);
    }
}
