<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\V1\User\Profile\UpdateRequest;
use App\Services\Api\V1\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
    }

    public function profile()
    {
        //TODO add debt & points
        return $this->service->getProfile();
    }

    public function update(UpdateRequest $request)
    {
        return $this->service->updateProfile($request);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        return $this->service->resetPassword($request);
    }
}
