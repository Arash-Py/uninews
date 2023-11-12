<?php

namespace App\Services\Api\V1\Watchman;

use App\Enums\CarFinanceType;
use App\Enums\PointType;
use App\Models\Car;
use App\Services\Service;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarService extends Service
{
    use ApiResponser;

    public function model()
    {
        $this->model = Car::class;
    }


    public function getCarDept(Request $request)
    {
        $car = $this->model::findByPlaque($request->number, $request->word, $request->region_number);
        if ($car) {
            $dept = $car->balance < 0 ? $car->balance : 0;
            return $this->success(['dept' => number_format($dept)]);
        }
        return $this->error(trans('messages.wrong_car'), 422);
    }

    public function chargeCar(Request $request)
    {
        $car = $this->model::findByPlaque($request->number, $request->word, $request->region_number);
        if ($car) {
            $car->finance()->create([
                'amount' => $request->price,
                'type' => CarFinanceType::increase
            ]);
            $car->user->points()->create([
                'type' => PointType::increase,
                'amount' => 100
            ]);
            return $this->noContent();
        }

        return $this->error(trans('messages.wrong_car'), 422);

    }
}
