<?php

namespace App\Http\Resources\Api\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarReesource extends JsonResource
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
            'name' => $this->name,
            'plaque' => $this->plaque,
            'number' => $this->number,
            'word' => $this->word,
            'region_number' => $this->region_number,
            'balance' => (int)$this->balance,
        ];
    }
}
