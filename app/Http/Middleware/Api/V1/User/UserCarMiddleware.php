<?php

namespace App\Http\Middleware\Api\V1\User;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class UserCarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset(Route::current()->parameters()['car'])){
            if ((Route::current()->parameters()['car']['user_id'] != \Auth::user()->id)){
                abort(404);
            }
        }
        return $next($request);
    }
}
