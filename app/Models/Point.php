<?php

namespace App\Models;

use App\Enums\ParkStatus;
use App\Enums\PointType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'pointable_type',
        'pointable_id',
        'type',
        'amount',
        'comment',
    ];

    protected $casts = [
        'status' => PointType::class
    ];

    public function pointable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
