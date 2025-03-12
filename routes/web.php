<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('products.show');
Route::get('/search', [HomeController::class, 'search'])->name('posts.search');

Route::middleware('auth')->group(function () {
    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::post('/store', [HomeController::class, 'store'])->name('store');
    Route::resource('/auth', HomeController::class);
    Route::get('posts/delete/{id}', [HomeController::class, 'delete'])->name('delete');
    Route::delete('/auth/destroy/{id}', [HomeController::class, 'destroy'])->name('auth.destroy');

    Route::post('posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
