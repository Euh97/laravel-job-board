<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Rest API (Restful API) => HTTP Standard
// Request => GET > POST > DELETE > PUT > PATCH
// Response => 200, 201, .. , 301 , .. ,500
Route::post('/blog', [PostController::class, 'create']);
Route::delete('/blog/{id}', [PostController::class, 'delete']);

Route::post('/comments', [CommentController::class, 'create']);


