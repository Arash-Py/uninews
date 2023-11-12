<?php

namespace App\Filter\Api\V1\User;

use App\Filter\Filter;

class ParkHistoryFilter extends Filter
{
    public function car_id($query,$car_id = null)
    {
        if ($car_id) {
            return $query->whereHas('car',fn($q) => $q->where('id',$car_id));
        }
        return $query;
    }
}
