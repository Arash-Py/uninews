<?php

namespace App\Models;

use App\Enums\CarFinanceType;
use App\Filter\Api\V1\User\CarFinanceFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarFinance extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'car_id',
        'type',
        'amount',
        'park_id',
        'pay_id',
        'watchman_id',
    ];

    protected $casts = [
        'type' => CarFinanceType::class
    ];
    public function scopeFilter($query, CarFinanceFilter $filter){
        return $filter->apply($query);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function park(): BelongsTo
    {
        return $this->belongsTo(Park::class);
    }
}
