<?php

namespace App\Http\Controllers\Api\V1\Watchman;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\Watchman\WatchmanService;
use Illuminate\Http\Request;

class WatchmanController extends Controller
{
    public function __construct(private WatchmanService $service)
    {
    }

    public function profile(){
        return $this->service->getProfile();
    }
}
