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

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home',[
        'user' => Auth::user(),
    ]);
})->name('home');

Route::get('/{username}',[ProfileController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->post('/home', [ProfileController::class,'store'])->name('update_profile');
