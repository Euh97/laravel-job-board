<?php

use App\Http\Controllers\api\v1\PostApiController;
use App\Http\Controllers\api\v1\AuthController;
// use App\Http\Controllers\CommentController; 
// use App\Http\Controllers\TagController;
// use Illuminate\Support\Facades\Route;

// Rest API (Restful API) => HTTP Standard
// Request => GET > POST > DELETE > PUT > PATCH
// Response => 200, 201, .. , 301 , .. ,500

// POST /v1/auth/login
// POST /v1/auth/refresh
// GET /v1/auth/me
// POST /v1/auth/logout

Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class)->middleware('auth:api');

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);

        // only if iam authenticated with jwt token
        Route::middleware('auth:api')->group(function () {
            Route::get('me', [AuthController::class, 'me']);
            Route::post('logout', [AuthController::class, 'logout']);
            Route::post('refresh', [AuthController::class, 'refresh']);
        });
    });
});
