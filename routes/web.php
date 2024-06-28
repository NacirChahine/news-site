<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/articles/{id}/like', [ArticleController::class, 'like'])->name('article.like')->middleware('auth');
Route::post('/article/{id}/comment', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');

Auth::routes();
