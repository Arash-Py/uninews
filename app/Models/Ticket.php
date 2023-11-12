<?php

namespace App\Models;

use App\Enums\TicketStatus;
use App\Enums\TicketType;
use App\Filter\Api\V1\TicketFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ticketable_type',
        'ticketable_id',
        'title',
        'status',
        'type'
    ];

    protected $casts = [
        'status' => TicketStatus::class,
        'type' => TicketType::class
    ];

    public function scopeFilter($query, TicketFilter $filter){
        return $filter->apply($query);
    }
    public function ticketable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
}
