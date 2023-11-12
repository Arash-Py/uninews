<?php

namespace App\Models;

use App\Enums\ParkStatus;
use App\Filter\Api\V1\User\ParkHistoryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Park extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'watchman_id',
        'place_id',
        'car_id',
        'status',
        'price',
        'start',
        'stop',
    ];

    protected $casts = [
        'status' => ParkStatus::class,
        'start' => 'datetime'
    ];

    public function scopeFilter($query, ParkHistoryFilter $filter){
        return $filter->apply($query);
    }
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    public function station(): \Illuminate\Database\Eloquent\Relations\HasOneThrough
    {
        return $this->hasOneThrough(Station::class,Place::class);
    }

    public function watchman(): BelongsTo
    {
        return $this->belongsTo(Watchman::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
