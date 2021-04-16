<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;
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

Auth::routes();
Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::resource('/articles', ArticleController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', ArticleController::class)->only(['show']);

Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', [ArticleController::class, 'like'])->name('like')->middleware('auth');
    Route::delete('/{article}/like', [ArticleController::class, 'dislike'])->name('dislike')->middleware('auth');
});

Route::get('/tags/{name}', [TagController::class, 'show'])->name('tags.show');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', [UserController::class, 'show'])->name('show');
    Route::get('/{name}/likes', [UserController::class, 'likes'])->name('likes');
    Route::get('/{name}/followings', [UserController::class, 'followings'])->name('followings');
    Route::get('/{name}/followers', [UserController::class, 'followers'])->name('followers');
    Route::middleware('auth')->group(function () {
    Route::put('/{name}/follow', [UserController::class, 'follow'])->name('follow');
        Route::delete('/{name}/follow',[UserController::class, 'unfollow'])->name('unfollow');
        });
});