<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



// Authentication Routes
Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});


// Route::get('/posts',[PostController::class, 'index'])->name('posts.index');

// Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
// Route::post('/posts',[PostController::class, 'store'])->name('posts.store');

// Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');

// Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
// Route::patch('/posts/{post}',[PostController::class, 'update'])->name('posts.update');

// Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');



Route::middleware('auth')->group(function(){

    Route::resource('posts', PostController::class);

    Route::patch('/posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::delete('/posts/{post}/force-delete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');
});


// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
