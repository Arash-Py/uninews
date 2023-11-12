<?php

namespace App\Http\Resources\Api\V1\Watchman;

use App\Http\Resources\Api\V1\User\ParkResource;
use App\Http\Resources\Api\V1\User\StationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
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
            'number' => $this->number,
            'status' => $this->status,
            'fa_status' => $this->status->label(),
            'station' => StationResource::make($this->whenLoaded('station')),
            'park' => ParkResource::make($this->whenLoaded('lastPark'))
        ];
    }
}
