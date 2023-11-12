<?php

namespace App\Filter\Api\V1\User;

use App\Filter\Filter;

class StationFilter extends Filter
{
    public function name($name = null)
    {
        if ($name) {
            return $this->builder->where('name', 'LIKE', "%{$name}%");
        }
        return $this->builder;
    }
}
