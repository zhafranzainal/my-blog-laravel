<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BlogController;

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

// To register
Route::post('register', [AuthController::class, 'register']);

// To login
Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum', 'verified')->group(function () {

    // To logout
    Route::get('logout', [AuthController::class, 'logout'])->name('api.logout');

    //blog
    Route::apiResource('blog', BlogController::class);
});
