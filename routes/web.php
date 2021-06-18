<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
  
    Route::view('/', 'dashboard')->name('dashboard');

    Route::resource('users', UserController::class);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    });
});