<?php

namespace App\Services\Api\V1\Watchman;

use App\Enums\PlaceStatus;
use App\Http\Resources\Api\V1\Watchman\PlaceResource;
use App\Models\Place;
use App\Notifications\RequestWatchmanNotification;
use App\Services\Service;

class PlaceService extends Service
{
    public function model()
    {
        $this->model = Place::class;
    }

    public function __construct(private \App\Services\Api\V1\User\ParkService $userParkService)
    {
    }

    public function getPlaces()
    {
        $watchman = \Auth::guard('watchman')
            ->user();
        $places = $watchman->places()
            ->whereNot('status', PlaceStatus::disabled)
            ->with('lastPark.car', 'lastPark.user', 'lastPark.watchman')
            ->get();

        $notifications = $watchman
            ->notifications()
            ->where([
                'type' => RequestWatchmanNotification::class,
                'read_at' => null
            ])->get()->pluck('data.place_id');
        return $this->success(['places_need_watchmen_ids' => $notifications, 'data' => PlaceResource::collection($places)]);
    }

    public function getPlaceDetails(Place $place)
    {
        $place->load('lastPark.car');
        $calculatedData = $this->userParkService->calculatePrice($place->lastPark);

        return $this->success(['data' => PlaceResource::make($place),'calculation' => $calculatedData]);
    }

}
