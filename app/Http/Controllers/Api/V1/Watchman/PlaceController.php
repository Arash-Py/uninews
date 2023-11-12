<?php

namespace App\Http\Controllers\Api\V1\Watchman;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Watchman\Park\SubmitRequest;
use App\Models\Park;
use App\Models\Place;
use App\Services\Api\V1\Watchman\ParkService;
use App\Services\Api\V1\Watchman\PlaceService;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function __construct(private PlaceService $service, private ParkService $parkService)
    {
    }

    public function index()
    {
        return $this->service->getPlaces();
    }

    public function submitPark(SubmitRequest $request, Place $place)
    {
        return $this->parkService->submitPark($request, $place);
    }

    public function details(Place $place)
    {
        return $this->service->getPlaceDetails($place);
    }

    public function endPark(Request $request, Place $place)
    {
        return $this->parkService->endPark($place, $request);
    }
}
