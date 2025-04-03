<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonasController;
use Illuminate\Http\Request;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AccesoController;

// Ruta principal que lleva al formulario de login
Route::get('/', function () {
    return view('auth.login');
});

// Rutas del CRUD de personas
Route::resource('personas', PersonasController::class);
Route::get('/personas', [PersonasController::class, 'index'])->name('personas.index');
Route::put('/personas/{persona}', [PersonasController::class, 'update'])->name('personas.update');

// Rutas para el login
Route::get('login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthLoginController::class, 'login']);
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');


// Rutas del CRUD de empresas
Route::resource('empresas', EmpresaController::class);
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
Route::put('/empresas/{persona}', [EmpresaController::class, 'update'])->name('empresas.update');


// Rutas por accesos 

Route::resource('accesos', AccesoController::class);
Route::get('/accesos', [AccesoController::class, 'index'])->name('accesos.index');
route::put('/accesos/{persona}', [AccesoController::class, 'update'])->name('accesos.update');



