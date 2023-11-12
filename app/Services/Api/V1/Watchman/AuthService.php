<?php

namespace App\Services\Api\V1\Watchman;

use App\Http\Resources\Api\V1\Watchman\WatchmanResource;
use App\Models\Watchman;
use App\Services\Service;
use App\Traits\ApiResponser;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    use ApiResponser;

    private ?string $phone = null;

    function __construct(Request $request)
    {
        $this->phone = convertPhone($request->phone);
    }

    public function doLogin(Request $request)
    {
        //TODO CHECK STATUS
        if ($user = Watchman::findByPhone($this->phone)->first()) {

            if (!Hash::check($request->password, $user->password)) {
                return $this->error(trans('messages.wrong_password'), 401);
            }
            return $this->login($user);
        }
        return $this->error(trans('messages.wrong_phone_number'), 401);
    }

    private function login(Watchman $watchman)
    {
        Auth::guard('watchman')->setUser($watchman);
        $watchman = Auth::guard('watchman')->user();
        $tokenResult = $watchman->createToken('Personal Access Token', ['watchman']);

        return $this->success(WatchmanResource::make($watchman, $tokenResult->accessToken));
    }
}
