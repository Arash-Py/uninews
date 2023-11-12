<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Auth\CheckMobileRequest;
use App\Http\Requests\Api\V1\User\Auth\LoginRequest;
use App\Http\Requests\Api\V1\User\Auth\RegisterRequest;
use App\Http\Requests\Api\V1\User\Auth\ResetPasswordRequest;
use App\Services\Api\V1\User\AuthService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponser;

    public function __construct(private readonly AuthService $service)
    {
    }

    public function login(LoginRequest $request)
    {
        return $this->service->doLogin($request);
    }

    public function register(RegisterRequest $request)
    {
        return $this->service->register($request);
    }

    public function check(CheckMobileRequest $request)
    {
        return $this->service->checkMobile($request);
    }

}
