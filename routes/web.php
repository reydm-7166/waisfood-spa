<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Users\IndexController;

use App\Http\Controllers\Users\GeneratorController;
use App\Http\Controllers\Users\MessageController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\NewsfeedController;
use App\Http\Controllers\Users\SettingsController;
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


Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');

Route::post('/login/attempt', [LoginController::class, 'authenticate'])->name('login.attempt');

Route::post('/clear-flash', [LoginController::class, 'clearFlash']);

Route::prefix('newsfeed')->middleware('auth')->group(function () {
    Route::resource('', NewsfeedController::class, [
        'names' => 'newsfeed',
        'parameters' => ['' => 'id']
    ]);
});

Route::prefix('profile')->group(function () {
    Route::resource('', ProfileController::class);
});


Route::prefix('generator')->group(function () {
    Route::resource('', GeneratorController::class, [
        'names' => 'generator',
        'parameters' => ['' => 'id']
    ]);
});

Route::prefix('messages')->group(function () {
    Route::resource('', MessageController::class);
});

Route::prefix('settings')->group(function () {
    Route::resource('', SettingsController::class);
});

