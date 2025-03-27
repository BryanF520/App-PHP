<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonasController;
use Illuminate\Http\Request;
use App\Http\Controllers\EmpresaController;

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

// Rutas protegidas según el rol
Route::get('/admin/index', function () {
    return view('admin.index');
})->name('admin.index')->middleware('rol:admin');

Route::get('/recepcionista/index', function () {
    return view('recepcionista.index');
})->name('recepcionista.index')->middleware('rol:recepcionista');

Route::view('/admin/index', 'admin.index')->name('admin.index');
Route::view('/recepcionista/index', 'recepcionista.index')->name('recepcionista.index');

// Ruta para cerrar sesión
Route::post('/logout', function (Request $request) {
    $request->session()->flush();
    return redirect()->route('login');
})->name('logout');

// Rutas del CRUD de empresas
Route::resource('empresas', EmpresaController::class);
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
Route::put('/empresas/{persona}', [EmpresaController::class, 'update'])->name('empresas.update');
