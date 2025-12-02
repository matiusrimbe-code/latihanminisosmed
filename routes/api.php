<?php

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
});