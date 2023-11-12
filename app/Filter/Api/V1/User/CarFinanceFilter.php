<?php

namespace App\Filter\Api\V1\User;

use App\Filter\Filter;

class CarFinanceFilter extends Filter
{
    public function amount($amount = null)
    {
        if ($amount) {
            return $this->builder->where('amount', $amount);
        }
        return $this->builder;
    }

    public function type($type = null)
    {
        if ($type) {
            return $this->builder->where('type', $type);
        }
        return $this->builder;
    }
    public function start_date($start_date = null)
    {
        if ($start_date) {
            $start_date =  persian_to_gregorian($start_date);
            return $this->builder->where('car_finances.created_at', '>=', $start_date);
        }
        return $this->builder;
    }

    public function stop_date($stop_date = null)
    {
        if ($stop_date) {
            $stop_date =  persian_to_gregorian($stop_date);
            return $this->builder->where('car_finances.created_at', '<=', $stop_date);
        }
        return $this->builder;
    }
}
