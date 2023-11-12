<?php

namespace App\Services\Api\V1\User;

use App\Enums\ParkStatus;
use App\Enums\PlaceStatus;
use App\Filter\Api\V1\User\ParkHistoryFilter;
use App\Http\Resources\Api\V1\User\ParkResource;
use App\Models\Park;
use App\Models\Place;
use App\Models\Notification as NotificationModel;
use App\Notifications\RequestWatchmanNotification;
use App\Services\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ParkService extends Service
{
    public function model(): void
    {
        $this->model = Park::class;
    }

    public function __construct(private \App\Services\Api\V1\ParkService $masterParkService)
    {
    }

    public function submitPark(Request $request)
    {
        $place = Place::where('number', $request->place_number)->whereNot('status', PlaceStatus::unavailable)->first();
        \Auth::user()->parks()->create([
            'place_id' => $place->id,
            'car_id' => $request->car_id,
            'status' => ParkStatus::park,
            'price' => 0,
            'start' => now()
        ]);

        $place->update(['status' => PlaceStatus::unavailable]);

        return $this->noContent();
    }

    public function getPrice(Park $park): JsonResponse
    {
        $calculatedData = $this->masterParkService->calculatePrice($park);

        return $this->success(['park_time' => $calculatedData['parkTime'], 'price' => $calculatedData['price']]);

    }

    public function getLastThreePark(ParkHistoryFilter $filter): \Illuminate\Http\JsonResponse
    {
        //TODO change filter after get last park not from all of them
        $parks = Auth::user()->lastParks()->with('car', 'place.station')->filter($filter)->get();

        return $this->success(ParkResource::collection($parks));
    }

    public function getUserActivePark()
    {
        $park = Auth::user()->parks()->where('status', ParkStatus::park)->orderByDesc('id')->first();
        is_null($park) ?: $park->load('place.station', 'car');
        return is_null($park) ? null : ParkResource::make($park);
    }

    public function sendNotificationToWatchman(Request $request): Response|JsonResponse
    {
        $place = Place::find($request->place_id);
        $existNotifications = NotificationModel::where(['type' => RequestWatchmanNotification::class, 'data->place_id' => $place->id])->get();
        if ($existNotifications->count() > 0){
            return $this->error(trans('messages.watchman_request_exist'),400);
        }
        Notification::send($place->watchmen, new RequestWatchmanNotification($place));

        return $this->noContent();
    }

    public function submitEndPark(Park $park)
    {
        $calculatedData = $this->masterParkService->calculatePrice($park);
        if ($park->car->balance > 0 && $park->car->balance > $calculatedData['price']) {
            $this->masterParkService->endPark($park);

            return $this->noContent();
        } else {
            $data = $calculatedData['price'] + ($park->car->balance < 0 ? -($park->car->balance) : $park->car->balance);
            $mesage = trans('messages.not_enough_balance') . number_format($data);
            return $this->error($mesage, 400);
        }

    }

}
