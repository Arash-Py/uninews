<?php

namespace App\Services\Api\V1\User;

use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\Activation;
use App\Models\User;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\matches;

class AuthService
{
    use ApiResponser;

    private ?string $phone = null;
    private ?int $code = null;
    private ?string $type = null;

    function __construct(Request $request)
    {
        $this->phone = convertPhone($request->phone);
        $this->code = $request->code;
        $this->type = $request->type;
    }

    public function doLogin(Request $request)
    {
        if ($user = User::findByPhone($this->phone)->first()) {
            if ($this->type == 'otp') {
                return $this->checkCode();
            }
            if (!Hash::check($request->password, $user->password)) {
                return $this->error(trans('messages.wrong_password'), 401);
            }
            return $this->login($user);
        }
        return $this->error(trans('messages.wrong_phone_number'), 401);
    }

    private function login(User $user)
    {
        Auth::guard('user')->setUser($user);
        $user = Auth::guard('user')->user();
        $tokenResult = $user->createToken('Personal Access Token', ['user']);

        return $this->success(new UserResource($user, $tokenResult->accessToken));
    }

    public function register(Request $request)
    {
        if (User::findByPhone($this->phone)->first()) {
            return $this->error(trans('messages.phone_number_already_used'), 401);
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $this->phone,
            'password' => Hash::make($request->password)
        ]);
        return $this->login($user);
    }

    public function checkMobile(Request $request): \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
    {
        if ($request->has('code') && filled($request->code)) {
            return $this->checkCode();
        }
        return $this->sendCode();
    }

    public function resetPassword(Request $request): \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
    {
        $user = User::findByPhone($this->phone)->first();
        if ($user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return $this->noContent();
        }

        return $this->error(trans('messages.wrong_phone_number'), 401);
    }

    private function sendCode(): \Illuminate\Http\JsonResponse
    {
        if ($this->type == 'register' && User::findByPhone($this->phone)->first()) {
            return $this->error(trans('messages.phone_number_already_used'), 401);
        }
        $this->generateCode();
        return $this->success(trans('messages.code_sent'), 200);
    }

    private function generateCode(): string
    {
        $code = substr(time() . $this->phone, rand(0, 5), 5);
        Activation::create([
            'code' => $code,
            'phone' => $this->phone,
            'expired_at' => Carbon::now()->addMinutes(5)
        ]);

        return $code;
    }

    private function checkCode(): \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    {
        $lastCode = Activation::getLatestActiveCode($this->phone, $this->code)->first();
        if ($this->code == '11111'){
            $lastCode = true;
        }//TODO remove this after development
        if (!$lastCode) {
            return $this->error(trans('messages.wrong_code'), 422);
        }
        //TODO uncomment it after development
//        $lastCode->update(['used_at' => now()]);

        if ($this->type == 'otp') {
            $user = User::findByPhone($this->phone)->first();
            return $this->login($user);
        }

        return $this->noContent();
    }
}
