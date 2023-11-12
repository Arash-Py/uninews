<?php

namespace App\Services\Api\V1\Watchman;

use App\Http\Resources\Api\V1\Watchman\WatchmanResource;
use App\Models\Watchman;
use App\Services\Service;
use Illuminate\Http\Request;

class WatchmanService extends Service
{
    public function model(): void
    {
         $this->model = Watchman::class;
    }

    public function getProfile(){
        $watchman = \Auth::guard('watchman')->user();

        return WatchmanResource::make($watchman);
    }
}
