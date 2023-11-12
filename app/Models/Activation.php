<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
//    use HasFactory;

    protected $fillable = ['code', 'phone', 'used_at', 'expired_at'];

    public function scopeGetLatestActiveCode($query, $phone, $code)
    {
        return $query->where(['phone' => $phone, 'code' => $code, 'used_at' => null])->where('expired_at', '>', now())->orderBy('id', 'desc')->get();
    }
}
