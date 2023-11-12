<?php

namespace App\Http\Resources\Api\V1\User;

use App\Http\Resources\Api\V1\Watchman\WatchmanResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkResource extends JsonResource
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
            'place' => PlaceResource::make($this->whenLoaded('place')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'watchman' => WatchmanResource::make($this->whenLoaded('watchman')),
            'car' => CarReesource::make($this->whenLoaded('car')),
            'status' => $this->status,
            'price' => $this->price,
            'fa_status' => $this->status->label(),
            'start' => $this->start ? verta($this->start)->format('H:i') : null,
            'stop' => $this->stop ? verta($this->stop)->format('H:i') : null,
            'date' => verta($this->created_at)->format('Y/n/d')
        ];
    }
}
