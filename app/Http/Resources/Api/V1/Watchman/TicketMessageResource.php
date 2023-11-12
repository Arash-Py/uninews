<?php

namespace App\Http\Resources\Api\V1\Watchman;

use App\Models\Admin;
use App\Models\User;
use App\Models\Watchman;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketMessageResource extends JsonResource
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
            'from' => $this->messageable_type,
            'name' => $this->messageable->full_name,
            'message' => json_decode($this->message),
            'created_at' => verta($this->created_at)->format('Y/n/d h:i')
        ];
    }
}
