<?php

namespace App\Services\Api\V1\User;

use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use App\Services\Service;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserService extends Service
{
    public function model()
    {
        $this->model = User::class;
    }

    public function getProfile()
    {
        $user = Auth::guard('user')->user();
        return UserResource::make($user);
    }

    public function resetPassword(Request $request): Response|JsonResponse
    {
        $user = Auth::guard('user')->user();
        if ($user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return $this->noContent();
        }

        return $this->error(trans('messages.wrong_phone_number'), 401);
    }

    public function updateProfile(Request $request)
    {
        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => convertPhone($request->phone),
            'national_code' => $request->national_code
        ]);

        $user = Auth::guard('user')->user();
        return UserResource::make($user);
    }
}
