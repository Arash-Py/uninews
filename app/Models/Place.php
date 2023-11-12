<?php

namespace App\Models;

use App\Enums\ParkStatus;
use App\Enums\PlaceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'number',
        'status',
        'station_id',
    ];

    protected $casts = [
        'status' => PlaceStatus::class
    ];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }

    public function watchmen(): BelongsToMany
    {
        return $this->belongsToMany(Watchman::class);
    }

    public function park(): HasMany
    {
        return $this->hasMany(Park::class);
    }

    public function lastPark()
    {
        return $this->hasOne(Park::class)->where('status', ParkStatus::park)->latest();
    }
}
