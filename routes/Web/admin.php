<?php

use App\Http\Middleware\checkUserIsAdmin;
use App\Livewire\Admin\Admins\CreateAdmin;
use App\Livewire\Admin\Admins\EditAdmin;
use App\Livewire\Admin\Admins\IndexAdmin;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Dashboard\DashboardIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class)->name('login');
Route::get('/logout', function () {
    auth('admin')->logout();
    return to_route('admin.login');
})->name('logout');

Route::group(['middleware' => checkUserIsAdmin::class], function () {
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');
    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', IndexAdmin::class)->name('admin');
        Route::get('/create', CreateAdmin::class)->name('create');
        Route::get('/edit/{admin}', EditAdmin::class)->name('edit');
    });
});
