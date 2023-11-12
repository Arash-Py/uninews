<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Filter\Api\V1\User\ParkHistoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Park\SubmitRequest;
use App\Http\Resources\Api\V1\User\ParkResource;
use App\Models\Park;
use App\Services\Api\V1\User\ParkService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    use ApiResponser;
    public function __construct(private ParkService $service)
    {
    }

    public function submit(SubmitRequest $request)
    {
        return $this->service->submitPark($request);
    }

    public function details(Park $park)
    {
        //TODO 404 exception should be add
        $park->load('car','place.station');
        return $this->success(ParkResource::make($park));
    }

    public function calculate(Park $park){
        return $this->service->getPrice($park);
    }

    public function history(ParkHistoryFilter $filter){
        //TODO show if car pic uploaded
        return $this->service->getLastThreePark($filter);
    }

    public function callWatchman(Request $request){
        $request->validate(['place_id' => 'required']);

        return $this->service->sendNotificationToWatchman($request);
    }

    public  function endPark(Park $park)
    {
      return  $this->service->submitEndPark($park) ;
    }
}
