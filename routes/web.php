<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/test', function () {
    return view('test');
})->name('test');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [PostController::class,'index'])->name('home');

Route::get('/profile/{username}',[ProfileController::class,'index'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->post('/update-profile', [ProfileController::class,'store'])->name('update_profile');

Route::middleware(['auth:sanctum', 'verified'])->post('/add-post', [PostController::class,'store'])->name('add_post');
Route::middleware(['auth:sanctum', 'verified'])->delete('/delete-post/{post}', [PostController::class,'destroy'])->name('delete_post');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-post/{post}',[PostController::class,'edit'])->name('edit_post');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-post',[PostController::class,'update'])->name('update_post');

Route::middleware(['auth:sanctum', 'verified'])->post('/like-post/{post}', [PostLikeController::class,'store'])->name('like_post');
Route::middleware(['auth:sanctum', 'verified'])->delete('/unlike-post/{post}', [PostLikeController::class,'destroy'])->name('unlike_post');