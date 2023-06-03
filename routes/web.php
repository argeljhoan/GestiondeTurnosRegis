<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GestionOperadoresController;
use App\Http\Controllers\Admin\RegisterOperadorController;
use App\Http\Controllers\Admin\SeguimientoController;
use App\Http\Controllers\Modulos\ModulosController;
use App\Http\Controllers\Tramites\TramiteController;
use App\Http\Controllers\Turnos\TurnoController;
USE App\Http\Controllers\HomeController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/SuperAdmin', [HomeController::class, 'index'])->name('admin.home');

Route::get('/GestionOperadores', [GestionOperadoresController::class,'index'])->name('admin.Gestion');
Route::get('/Registro-Operadores', [GestionOperadoresController::class,'create'])->name('admin.Registro');


Route::get('/Registro-Operadores', [RegisterOperadorController::class,'index'])->name('admin.Registro');
Route::post('/GestionOperadores', [RegisterOperadorController::class,'store'])->name('admin.store');
Route::get('/Editar-Operadores/{user}', [RegisterOperadorController::class,'edit'])->name('admin.Editar');
Route::put('/GestionOperadores/{user}', [RegisterOperadorController::class,'update'])->name('admin.Actualizar');
Route::delete('GestionOperadores/{user}', [RegisterOperadorController::class,'destroy'])->name('admin.Eliminar');
Route::get('Eliminar-Operador/{user}', [RegisterOperadorController::class,'eliminando'])->name('admin.Eliminando');


Route::get('/Gestion-Modulos', [ModulosController::class,'index'])->name('Modulos.Gestion');
Route::get('/Registro-Modulo', [ModulosController::class,'create'])->name('Modulos.Registro');
Route::post('/Registro-Modulo', [ModulosController::class,'store'])->name('Modulos.store');
Route::get('/Editar-Modulos/{moduloData}', [ModulosController::class,'edit'])->name('Modulos.Editar');
Route::put('/Actualizar-Modulos/{modulo}', [ModulosController::class,'update'])->name('Modulos.Actualizar');
Route::delete('Eliminar-Modulo/{modulo}', [ModulosController::class,'destroy'])->name('Modulos.Eliminando');
Route::get('Eliminar-Modulo/{modulo}', [ModulosController::class,'eliminando'])->name('Modulos.Eliminar');

Route::get('/Gestion-Tramites', [TramiteController::class,'index'])->name('Tramites.Gestion');
Route::get('/Registro-Tramite', [TramiteController::class,'create'])->name('Tramites.Registrar');
Route::post('/Registro-Tramite', [TramiteController::class,'store'])->name('Tramites.store');
Route::get('/Editar-Tramite/{tramite}', [TramiteController::class,'edit'])->name('Tramites.Editar');
Route::put('/Actualizar-Tramite/{tramite}', [TramiteController::class,'update'])->name('Tramites.Actualizar');
Route::get('Eliminar-Tramite/{tramite}', [TramiteController::class,'eliminando'])->name('Tramites.Eliminar');
Route::delete('Eliminando-Tramite/{tramite}', [TramiteController::class,'destroy'])->name('Tramites.Eliminando');

Route::get('/Gestion-Turnos', [TurnoController::class,'index'])->name('Turnos.Gestion');
Route::post('/Gestion-Turnos', [TurnoController::class,'show'])->name('Turnos.Buscar');
Route::get('/Su-Turno', [TurnoController::class,'create'])->name('Turnos.Registrar');
Route::post('/Generar-Turnos', [TurnoController::class,'generar'])->name('Turnos.Generar');
Route::post('Registro-Turnos/{cita}', [TurnoController::class, 'store'])->name('Turnos.store');


Route::get('SuperAdmin/Seguimiento', [SeguimientoController::class,'index'])->name('admin.Seguimiento');  
