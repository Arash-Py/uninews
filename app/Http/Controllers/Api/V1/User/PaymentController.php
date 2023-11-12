<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Filter\Api\V1\User\CarFinanceFilter;
use App\Http\Controllers\Controller;
use App\Services\Api\V1\User\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $service)
    {
    }

    public function history(CarFinanceFilter $filter)
    {
        return $this->service->getHistory($filter);
    }
}
