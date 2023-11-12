<?php

namespace App\Models;

use App\Enums\PlaceStatus;
use App\Enums\StationStatus;
use App\Filter\Api\V1\User\StationFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'price',
        'status',
        'lat',
        'lng',
        'city_id',
    ];

    protected $casts = [
        'status' => StationStatus::class
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function scopeFilter($query, StationFilter $filter){
        return $filter->apply($query);
    }

    public function places(): HasMany
    {
        return $this->hasMany(Place::class);
    }

    public function getAvailablePlacesCountAttribute(){
        return $this->places()->select('id','status')->where('status',PlaceStatus::available)->count();
}
}
