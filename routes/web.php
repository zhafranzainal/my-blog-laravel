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
    Route::get('/blog', [BlogPostController::class, 'index'])->name('index');
    Route::get('/blog/create/post', [BlogPostController::class, 'create'])->name('create');
    Route::post('/blog/create/post',[BlogPostController::class, 'store'])->name('store');
    Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('show');
    Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('edit'); //shows edit post form
    Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update'])->name('update'); //commits edited post to the database 
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('destroy'); //deletes post from the database
});