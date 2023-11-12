<?php

namespace App\Models;

use App\Enums\PointType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Watchman extends Authenticatable
{
    use HasApiTokens, SoftDeletes, HasFactory, Notifiable;

    protected $fillable = ['first_name', 'last_name', 'status', 'phone'];

    protected $hidden = [
        'password',
    ];
    protected $appends = [
        'total_points'
    ];

    public function scopeFindByPhone($query, $phone)
    {
        return $query->where('phone', $phone)->get();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function places(): BelongsToMany
    {
        return $this->belongsToMany(Place::class);
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }

    public function points(): MorphMany
    {
        return $this->morphMany(Point::class, 'pointable');
    }

    public function getTotalPointsAttribute()
    {
        $points = $this->points;
        $totalPoints = 0;
        foreach ($points as $point) {
            $totalPoints += $point->type == PointType::decrease->value ?
                ($point->amount * -1)
                : $point->amount;
        }

        return $totalPoints;
    }

    public function tickets(): MorphMany
    {
        return $this->morphMany(Ticket::class,'ticketable');
    }
}
