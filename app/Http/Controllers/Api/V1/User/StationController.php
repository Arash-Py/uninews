<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Filter\Api\V1\User\StationFilter;
use App\Http\Controllers\Controller;
use App\Services\Api\V1\User\ParkService;
use App\Services\Api\V1\User\StationService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class StationController extends Controller
{
    use ApiResponser;
    public function __construct(private StationService $service, private ParkService $parkService)
    {
    }

    public function index(StationFilter $filter){
        return $this->success([
            'active_park' => $this->parkService->getUserActivePark(),
            'data' => $this->service->getStations($filter)
        ],200);
    }
}
