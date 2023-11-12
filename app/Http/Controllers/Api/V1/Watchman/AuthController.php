<?php

namespace App\Http\Controllers\Api\V1\Watchman;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Watchman\Auth\LoginRequest;
use App\Services\Api\V1\Watchman\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $service)
    {
    }

    public function login(LoginRequest $request)
    {
        return $this->service->doLogin($request);
    }
}
