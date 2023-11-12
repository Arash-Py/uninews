<?php

namespace App\Services\Api\V1\Watchman;

use App\Enums\ParkStatus;
use App\Enums\PlaceStatus;
use App\Models\Car;
use App\Models\CarFinance;
use App\Models\Park;
use App\Models\Place;
use App\Services\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParkService extends Service
{
    public function model()
    {
        $this->model = Park::class;
    }

    public function __construct(private \App\Services\Api\V1\ParkService $masterParkService)
    {
    }
    public function submitPark(Request $request, Place $place)
    {
        $car = Car::firstOrCreate(['number' => $request->number, 'word' => $request->word, 'region_number' => $request->region_number]);

        $place->park()->create([
            'watchman_id' => \Auth::guard('watchman')->user()->id,
            'user_id' => $car->user_id,
            'car_id' => $car->id,
            'status' => ParkStatus::park,
            'start' => now()
        ]);
        $place->update(['status' => PlaceStatus::unavailable]);
        return $this->noContent();
    }

    public function endPark(Place $place, Request $request): Response|JsonResponse
    {
        $park = $place->lastPark;
        $calculatedData = $this->masterParkService->calculatePrice($park);

        if (($park->car->balance <= 0 || $park->car->balance < $calculatedData['price']) && $request->pay_type == 'verbal') {
            $data = $calculatedData['price'] + ($park->car->balance < 0 ? -($park->car->balance) : $park->car->balance);
            $mesage = trans('messages.not_enough_balance') . number_format($data);
            return $this->error($mesage, 400);
        }

        $this->masterParkService->endPark($park);

        return $this->noContent();
    }
}
