<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post}',[PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function(){
    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
    Route::get('/admin/post',[PostController::class, 'index'])->name('post.index');

    Route::post('/admin/post',[AdminsController::class, 'store'])->name('post.store');
    Route::get('/admin/post/create', [AdminsController::class, 'create'])->name('post.create');

    Route::get('/admin/post/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/post/{post}', [PostController::class, 'patch'])->name('post.patch');

    Route::delete('/admin/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
