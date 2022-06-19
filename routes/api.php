<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(static function () {

    Route::post('create-post/{website}', PostController::class); //invoke class.
    Route::post('subscribe/{user}', SubscribeController::class); // invoke class

    Route::post('signup', [UserController::class, 'signUp'])->name('sign-up');

    Route::prefix('website')->group(static function () {
        Route::post('/store', [WebsiteController::class, 'store'])->name('store');
    });

});
