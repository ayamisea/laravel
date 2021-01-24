<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostMessageController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [FollowController::class,'showposts'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/search',[PostController::class,'search'] )->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [PostController::class,'index'])->name('home');

Route::get('/profile/{username}',[ProfileController::class,'index'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->post('/update-profile', [ProfileController::class,'store'])->name('update_profile');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete-profile-photo', [ProfileController::class,'deletePhoto'])->name('delete_profile_photo');

Route::middleware(['auth:sanctum', 'verified'])->post('/add-post', [PostController::class,'store'])->name('add_post');
Route::middleware(['auth:sanctum', 'verified'])->delete('/delete-post/{post}', [PostController::class,'destroy'])->name('delete_post');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit-post/{post}',[PostController::class,'edit'])->name('edit_post');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-post',[PostController::class,'update'])->name('update_post');

Route::middleware(['auth:sanctum', 'verified'])->post('/like-post/{post}', [PostLikeController::class,'store'])->name('like_post');
Route::middleware(['auth:sanctum', 'verified'])->delete('/unlike-post/{post}', [PostLikeController::class,'destroy'])->name('unlike_post');

Route::middleware(['auth:sanctum', 'verified'])->post('/follow-profile/{profile}', [FollowController::class,'store'])->name('follow_profile');
Route::middleware(['auth:sanctum', 'verified'])->delete('/unfollow-profile/{profile}', [FollowController::class,'destroy'])->name('unfollow_profile');
Route::get('/profile/{username}/follow',[FollowController::class,'follow'])->name('follow');
Route::get('/profile/{username}/follower',[FollowController::class,'follower'])->name('follower');

Route::middleware(['auth:sanctum', 'verified'])->post('/add-message', [PostMessageController::class,'store'])->name('add_message');
Route::middleware(['auth:sanctum', 'verified'])->delete('/delete-message/{message}', [PostMessageController::class,'destroy'])->name('delete_message');