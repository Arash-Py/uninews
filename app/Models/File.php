<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasUUID;

    protected $fillable = [
        'name',
        'path',
        'auth_guard',
        'accessable_id',
        'accessable_type',
        'expires_at'
    ];

    protected $dates = [
        'expires_at'
    ];

    public function accessable()
    {
        return $this->morphTo();
    }
}
