<?php

use App\Http\Controllers\Api\V1\Watchman\AuthController;
use App\Http\Controllers\Api\V1\Watchman\CarController;
use App\Http\Controllers\Api\V1\Watchman\PlaceController;
use App\Http\Controllers\Api\V1\Watchman\TicketController;
use App\Http\Controllers\Api\V1\Watchman\WatchmanController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth', 'as' => 'auth.', 'controller' => AuthController::class], function () {
    Route::post('login', 'login');
});

Route::group(['middleware' => ['auth:watchman']], function () {
    Route::group(['prefix' => 'profile', 'controller' => WatchmanController::class], function () {
        Route::get('', 'profile');
    });
    Route::group(['prefix' => 'places', 'controller' => PlaceController::class], function () {
        Route::get('', 'index');
        Route::post('{place}/submit-park', 'submitPark');
        Route::get('{place}/details', 'details');
        Route::post('{place}/end-park', 'endPark');
    });
    Route::group(['prefix' => 'cars', 'controller' => CarController::class], function () {
        Route::post('dept-info', 'deptInfo');
        Route::post('charge', 'charge');
    });
    Route::group(['prefix' => 'tickets', 'controller' => TicketController::class], function () {
        Route::get('', 'index');
        Route::get('messages/{ticket}','messages');
        Route::post('reply/{ticket}','reply');
        Route::post('submit', 'submit');
    });
});
