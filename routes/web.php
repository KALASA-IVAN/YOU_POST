<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function(){
    return view('home');
} )->name('home');

Route::get('/users/{user}/posts', [UserPostController::class, 'index'])->name('users.posts');


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostsController::class, 'store']);
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');
