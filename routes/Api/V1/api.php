<?php

use App\Http\Controllers\Api\V1\User\AuthController;
use App\Http\Controllers\Api\V1\User\CarController;
use App\Http\Controllers\Api\V1\User\ParkController;
use App\Http\Controllers\Api\V1\User\PaymentController;
use App\Http\Controllers\Api\V1\User\StationController;
use App\Http\Controllers\Api\V1\User\TicketController;
use App\Http\Controllers\Api\V1\User\UploadController;
use App\Http\Controllers\Api\V1\User\UserController;
use App\Http\Middleware\Api\V1\User\UserCarMiddleware;
use Illuminate\Support\Facades\Route;
use App\Models\File;
use Illuminate\Http\Request;



Route::post('/test',function (Request $request){
    $user = \App\Models\User::first();
//    $user->addMediaFromRequest('image')->toMediaCollection('avatar');
    $fileModel = File::find($request->attachment['temporary_file_id']);
//    dd($fileModelFolderName = ($fileModel->path));
    if ($fileModel) {
        // TODO make contract class to file upload
        if (Storage::disk('sftp')->exists($fileModel->path)) {
            $fileModelFolderName = dirname($fileModel->path);
            $user->addMediaFromDisk($fileModel->path)->toMediaCollection('avatar', 'sftp');
            Storage::deleteDirectory($fileModelFolderName);
            $fileModel->delete();
        }
    }
});
Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
    Route::post('check', 'check');
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::group(['middleware' => ['auth:user']], function () {
    Route::group(['prefix' => 'user', 'controller' => UserController::class], function () {
        Route::group(['prefix' => 'profile'], function () {
            Route::get('', 'profile');
            Route::post('update', 'update');
            Route::post('reset-password', 'resetPassword');
        });
        Route::group(['prefix' => 'cars', 'middleware' => UserCarMiddleware::class, 'controller' => CarController::class], function () {
            Route::get('', 'index');
            Route::get('details/{car}', 'details');
            Route::post('create', 'store');
            Route::post('update/{car}', 'update');
            Route::post('delete/{car}', 'delete');
            Route::post('charge/{car}', 'charge');
        });
        Route::group(['prefix' => 'payments', 'controller' => PaymentController::class], function(){
            Route::get('history', 'history');
        });
    });
    Route::group(['prefix' => 'stations', 'controller' => StationController::class], function () {
        Route::get('', 'index');
    });
    Route::group(['prefix' => 'parks', 'controller' => ParkController::class], function () {
        Route::post('submit', 'submit');
        Route::post('call-watchman','callWatchman');
        Route::get('details/{park}', 'details');
        Route::get('history', 'history');
        Route::get('calculate/{park}', 'calculate');
        Route::post('end-park/{park}' , 'endPark');
    });
    Route::group(['prefix' => 'tickets', 'controller' => TicketController::class], function () {
        Route::get('', 'index');
        Route::get('messages/{ticket}','messages');
        Route::post('reply/{ticket}','reply');
        Route::post('submit', 'submit');
    });

    Route::get('file/{file}', [UploadController::class, 'retrieveFile'])
        ->name('file.retrieve')
        ->middleware('signed');
    Route::post('file/upload', UploadController::class);
});
