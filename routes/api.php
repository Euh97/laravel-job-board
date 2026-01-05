<?php

use App\Http\Controllers\api\v1\PostApiController;
// use App\Http\Controllers\CommentController; 
// use App\Http\Controllers\TagController;
// use Illuminate\Support\Facades\Route;

// Rest API (Restful API) => HTTP Standard
// Request => GET > POST > DELETE > PUT > PATCH
// Response => 200, 201, .. , 301 , .. ,500

Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);
});
