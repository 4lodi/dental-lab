<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ClientWorkController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/home', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'getDataClients'])->name('dataClients');

Route::Resource('clientWork', ClientWorkController::class);
