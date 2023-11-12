<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Car\StoreRequest;
use App\Http\Requests\Api\V1\User\Car\UpdateRequest;
use App\Models\Car;
use App\Services\Api\V1\User\CarService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(private CarService $service)
    {
    }

    public function index()
    {
        return $this->service->getCustomerCars();
    }

    public function details(Car $car)
    {
        return $this->service->getCarDetails($car);
    }

    public function store(StoreRequest $request)
    {
        return $this->service->createNewCar($request);
    }

    public function update(UpdateRequest $request, Car $car)
    {
        return $this->service->updateCustomerCar($request, $car);
    }

    public function delete(Car $car)
    {
        return $this->service->deleteCustomerCar($car);
    }

    public function charge(Car $car, Request $request)
    {
        return $this->service->chargeCar($car, $request);
    }
}
