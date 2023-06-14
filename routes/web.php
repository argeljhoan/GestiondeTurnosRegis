<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GestionOperadoresController;
use App\Http\Controllers\Admin\RegisterOperadorController;
use App\Http\Controllers\Informe\InformeController;
use App\Http\Controllers\Modulos\ModulosController;
use App\Http\Controllers\Tramites\TramiteController;
use App\Http\Controllers\Turnos\TurnoController;
use App\Http\Controllers\Dasboarh\DasbohardController;
USE App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/Inicio', [HomeController::class, 'index'])->name('admin.home');

Route::get('/Gestion-Operadores', [GestionOperadoresController::class,'index'])->name('admin.Gestion');


Route::get('/Registro-Operadores', [RegisterOperadorController::class,'create'])->name('admin.Registro');
Route::get('/Registro-Operadores', [RegisterOperadorController::class,'index'])->name('admin.modulo');
Route::post('/Gestion-Operadores', [RegisterOperadorController::class,'store'])->name('admin.store');
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
Route::get('/Modulos-Operador/{modulo}', [ModulosController::class,'turno'])->name('Modulos.Turnos');



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
Route::get('/Cargar-Citas', [TurnoController::class,'cargar'])->name('Turnos.Cargar');
Route::post('Cargar/Citas', [TurnoController::class, 'excel'])->name('Turnos.CargarExcel'); 
Route::get('Gestion-Turnos/Operadores/{id}', [TurnoController::class, 'citastabla'])->name('Turnos.Operadores'); 
Route::get('Gestion-Turnos/Atencion/{id}/{cita}', [TurnoController::class, 'atencion'])->name('Turnos.Atencion');
Route::get('Gestion-Turnos/Usuario/{cita}/{id}', [TurnoController::class, 'info'])->name('Turnos.info');
Route::post('Gestion-Turnos/Finalizar/{turno}', [TurnoController::class, 'guardarTiempoTranscurrido'])->name('Turnos.Tiempo');
Route::put('/Finalizar/Turno/{turno}', [TurnoController::class,'update'])->name('Turnos.Actualizar');
Route::get('Gestion-Turnos/Visualizar', [TurnoController::class,'visualizar'])->name('Turnos.Visualizar');
Route::get('Gestion-Turnos/Cedulas-Digitales', [TurnoController::class,'digital'])->name('Turnos.Digital');
Route::post('Gestion-Turnos/Cedulas-Digitales', [TurnoController::class, 'digitalstore'])->name('Turnos.CitasDigital');
Route::get('/Modulos-Operador/{modulo}', [TurnoController::class,'turno'])->name('Modulos.Turnos');


Route::get('/Reportes/{num}', [InformeController::class,'index'])->name('Informes.Reportes');
Route::post('/Generar-Reporte', [InformeController::class,'export'])->name('Informes.Generar');
Route::post('/Reportes-Citas/Rango', [InformeController::class, 'buscarRango'])->name('Informes.BusquedaRango');
Route::post('/Reportes-Citas/Estado', [InformeController::class, 'buscarestado'])->name('Informes.BusquedaEstado');
Route::post('/Reportes-Citas/Tramite', [InformeController::class, 'buscartramite'])->name('Informes.BusquedaTramite');
Route::post('/Reportes-Citas/Modulo', [InformeController::class, 'buscarmodulo'])->name('Informes.BusquedaModulo');



