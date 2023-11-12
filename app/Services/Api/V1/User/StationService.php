<?php

namespace App\Services\Api\V1\User;

use App\Enums\StationStatus;
use App\Filter\Api\V1\User\StationFilter;
use App\Http\Resources\Api\V1\User\StationResource;
use App\Models\Station;
use App\Services\Service;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StationService extends Service
{
    public function model(): void
    {
        $this->model = Station::class;
    }

    public function getStations(StationFilter $filter): AnonymousResourceCollection
    {
        $stations = $this->model::where('status', StationStatus::active)->filter($filter)->paginate(20);

        return StationResource::collection($stations);
    }
}
