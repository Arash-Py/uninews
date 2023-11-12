<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'number',
        'word',
        'region_number',
        'balance',
        'user_id',
        'verified_at',
    ];

    public function getPlaqueAttribute()
    {
        return substr($this->number, 2) . $this->word . substr($this->number, -3) . $this->region_number;
    }

    public function finance(){
        return $this->hasMany(CarFinance::class);
    }

    static public function findByPlaque($number,$word,$regionNumber){
        return self::where(['number' => $number, 'word' => $word, 'region_number' => $regionNumber])->first();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
