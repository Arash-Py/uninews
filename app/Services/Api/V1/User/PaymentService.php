<?php

namespace App\Services\Api\V1\User;

use App\Filter\Api\V1\User\CarFinanceFilter;
use App\Http\Resources\Api\V1\User\PaymentResource;
use App\Models\CarFinance;
use App\Services\Service;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PaymentService extends Service
{
    use ApiResponser;
    public function model()
    {
        $this->model = CarFinance::class;
    }

    public function getHistory(CarFinanceFilter $filter)
    {
        $histories = \Auth::user()->PaymentHistories()->filter($filter)->with('car','park')->paginate(20);

        return $this->success(PaymentResource::collection($histories));
    }
}
