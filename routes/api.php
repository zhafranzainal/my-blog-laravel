<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BlogPostController;

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

// To login
Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum', 'verified')->group(function () {

    // To logout
    Route::get('logout', [AuthController::class, 'logout'])->name('api.logout');

    // Route::get('/blog', [BlogPostController::class, 'index']);
    // Route::get('/blog/create/post', [BlogPostController::class, 'create']);
    // Route::post('/blog/create/post',[BlogPostController::class, 'store']);
    // Route::get('/blog/{blogPost}', [BlogPostController::class, 'show']);
    // Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']); //shows edit post form
    // Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update']); //commits edited post to the database 
    // Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy']); //deletes post from the database
});
