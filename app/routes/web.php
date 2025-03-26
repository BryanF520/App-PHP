<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonasController;

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('personas', PersonasController::class);
Route::get('login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthLoginController::class, 'login']);
