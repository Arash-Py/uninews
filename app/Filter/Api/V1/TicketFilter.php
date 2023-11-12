<?php

namespace App\Filter\Api\V1;

use App\Enums\TicketStatus;
use App\Filter\Filter;

class TicketFilter extends Filter
{
    public function type($type = null)
    {
        if ($type) {
            return $this->builder->where('type', $type);
        }
        return $this->builder;
    }

    public function status($status = null)
    {
        if ($status) {
            if ($status == 'going_on') {
                return $this->builder->whereIn('status', [TicketStatus::wait_for_answer, TicketStatus::answered]);
            }
            return $this->builder->where('status', $status);
        }
        return $this->builder;
    }
}
