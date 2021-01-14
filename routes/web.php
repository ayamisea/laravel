<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/{username}',[ProfileController::class,'index'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->post('/update-profile', [ProfileController::class,'store'])->name('update_profile');
Route::middleware(['auth:sanctum', 'verified'])->post('/add-post', [PostController::class,'store'])->name('add_post');