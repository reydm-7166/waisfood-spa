<?php

use App\Http\Controllers\Users\IndexController;

use App\Http\Controllers\Users\GeneratorController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\NewsfeedController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::prefix('newsfeed')->group(function () {
    Route::resource('', NewsfeedController::class);
});

Route::prefix('profile')->group(function () {
    Route::resource('', ProfileController::class);
});

Route::prefix('generator')->group(function () {
    Route::resource('', GeneratorController::class);
});

