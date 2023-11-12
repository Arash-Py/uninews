<?php

namespace App\Http\Resources\Api\V1\Watchman;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WatchmanResource extends JsonResource
{
    public function __construct($resource, protected $token = null)
    {
        parent::__construct($resource);
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'total_points' => $this->total_points,
            'token' => $this->when($this->token !== null, $this->token),
            //TODO give better soulotion for places
            'work_station' => $this->places->first()->station->name
        ];
    }
}
