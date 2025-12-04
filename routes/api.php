<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function() {
    Route::prefix('posts')->group(function() {
        Route::get('/', [PostController::class, 'index']);
        Route::post('/', [PostController::class, 'store']);
        Route::get('{id}', [PostController::class, 'show']);
        Route::put('{id}', [PostController::class, 'update']);
        Route::delete('{id}', [PostController::class, 'destroy']);
    });

    Route::prefix('comments')->group(function() {
        Route::post('/', [CommentController::class, 'store']);
        Route::delete('{id}', [CommentController::class, 'destroy']);
    });

    Route::prefix('likes')->group(function() {
        Route::post('/', [LikeController::class, 'store']);
        Route::delete('{id}', [LikeController::class, 'destroy']);
    });

    Route::prefix('messages')->group(function() {
        Route::post('/', [MessageController::class, 'store']);
        Route::get('{id}', [MessageController::class, 'show']);
        Route::get('getMessages/{id}', [MessageController::class, 'getMessages']);
        Route::delete('{id}', [MessageController::class, 'destroy']);
    });
    
});