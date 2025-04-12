<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonasController;
use Illuminate\Http\Request;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ReporteController;

// Ruta principal que lleva al formulario de login
Route::get('/', function () {
    return view('auth.login');
});
// Ruta para la vista de inicio
Route::get('/home', function () {
    return view('home');
})->name('home');
// Rutas del CRUD de personas

Route::resource('personas', PersonasController::class);
Route::get('/personas', [PersonasController::class, 'index'])->name('personas.index');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::put('/personas/{personas}', [PersonasController::class, 'update'])->name('personas.update');
});


// Rutas para el login
Route::get('login', [AuthLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthLoginController::class, 'login']);
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

// Ruta para cerrar sesión
Route::post('/logout', function (Request $request) {
    $request->session()->flush();
    return redirect()->route('login');
})->name('logout');

// Rutas del CRUD de empresas
Route::resource('empresas', EmpresaController::class);
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
Route::put('/empresas/{persona}', [EmpresaController::class, 'update'])->name('empresas.update');


// Rutas del CRUD de accesos

Route::resource('accesos', AccesoController::class);
Route::get('/accesos', [AccesoController::class, 'index'])->name('accesos.index');
Route::put('/accesos/{acceso}', [AccesoController::class, 'update'])->name('accesos.update');

//ingresos 
Route::resource('ingresos', IngresoController::class);
Route::get('/ingresos/create', [IngresoController::class, 'create'])->name('ingresos.create');
Route::post('/ingresos', [IngresoController::class, 'store'])->name('ingresos.store');
Route::get('/ingresos', [IngresoController::class, 'index'])->name('ingresos.index');

//Rutas para el reporte
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

// Ruta para descargar reportes 
Route::get('/reportes/pdf', [ReporteController::class, 'descargarPDF'])->name('reportes.pdf');
