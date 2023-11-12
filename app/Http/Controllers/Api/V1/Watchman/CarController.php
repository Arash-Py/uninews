<?php

namespace App\Http\Controllers\Api\V1\Watchman;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\Watchman\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(private CarService $service)
    {
    }

    public function deptInfo(Request $request){
        $request->validate([
            'word' => 'required',
            'number' => 'required',
            'region_number' => 'required'
        ]);
        return $this->service->getCarDept($request);
    }

    public function charge(Request $request){
        $request->validate([
            'word' => 'required',
            'number' => 'required',
            'region_number' => 'required',
            'price' => 'required|numeric'
        ]);

        return $this->service->chargeCar($request);
    }
}
