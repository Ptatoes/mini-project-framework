<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Route - Display all posts
Route::get('/', [PostController::class, 'home'])->name('home');


// Resource Routes for Posts, Categories, Tags
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
