<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('post', [PostController::class, 'index'])->name('post.index');

Route::delete('post/{id}', [PostController::class, 'delete'])->name('post.delete');

Route::get('post/restore/one/{id}', [PostController::class, 'restore'])->name('post.restore');

Route::get('post/restore_all', [PostController::class, 'restore_all'])->name('post.restore_all');
