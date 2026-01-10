<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


// ## Public Routes
Route::get('/', IndexController::class);
Route::get('/contact', ContactController::class);

Route::get('/job', [JobController::class, 'index']);

Route::post('/signup',[AuthController::class,'signup']);
Route::post('/login',[AuthController::class,'login']);

// ## Protected Routes
Route::middleware('auth')->group(function(){

    // Admin
    Route::middleware('role:admin')->group(function(){
        Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('blog.destroy');
    });
        
    // Editor, Admin
    Route::middleware('role:editor,admin')->group(function(){
        Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
        Route::post('/blog', [PostController::class, 'store'])->name('blog.store');

        Route::middleware('can:update,post')->group(function(){ // can bde 23ml update w t7a2a2 3l post 
            Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('blog.edit');
            Route::patch('/blog/{post}', [PostController::class, 'update'])->name('blog.update');
        });
            // Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('blog.edit')->can('update', 'post');
    });
    
    // Viewer, Editor, Admin
    Route::middleware('role:viewer,editor,admin')->group(function(){
        Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
        Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');
        Route::resource('comments', CommentController::class);
    });
    
    Route::resource('tags', TagController::class);
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('/signup',[AuthController::class,'showSignupForm'])->name('signup');
    Route::get('/login',[AuthController::class,'showLoginForm'])->name('login'); 
});

Route::middleware('onlyMe')->group(function(){
    Route::get('/about', AboutController::class);
});


