<?php

namespace App\Services\Api\V1;

use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function getUser()
    {
        $guard = null;
        $user = Auth::user();
        if (Auth::guard('admin')->check()) {
            $guard = 'admin';
        } elseif (Auth::guard('watchman')->check()) {
            $guard = 'watchman';
        }elseif (Auth::guard('user')->check()){
            $guard = 'user';
        }

        return ['guard' => $guard, 'user' => $user];
    }
}
