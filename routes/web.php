<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // The route we have created to show all blog posts.
    Route::get('/blog', [BlogPostController::class, 'index']);
    Route::get('/blog/{blogPost}', [BlogPostController::class, 'show']);
    Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']); //shows edit post form
    Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update']); //commits edited post to the database 
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy']); //deletes post from the database

});
