<?php

namespace App\Http\Resources\Api\V1\Watchman;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'fa_status' => $this->status->label(),
            'type' => $this->type,
            'fa_type' => $this->type->label(),
            'created_at' => verta($this->created_at)->format('Y/n/d')
        ];
    }
}
