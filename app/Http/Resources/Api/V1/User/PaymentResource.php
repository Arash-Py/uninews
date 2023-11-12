<?php

namespace App\Http\Resources\Api\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'car' => CarReesource::make($this->whenLoaded('car')),
            'type' => $this->type,
            'fa_type' => $this->type->label(),
            'park' => ParkResource::make($this->whenLoaded('park')),
            'amount' => number_format($this->amount),
            'date' => verta($this->created_at)->format('Y/n/d')
        ];
    }
}
