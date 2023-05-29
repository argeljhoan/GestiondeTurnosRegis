<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GestionOperadoresController;
use App\Http\Controllers\Admin\RegisterOperadorController;
use App\Http\Controllers\Admin\SeguimientoController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('SuperAdmin/Seguimiento', [SeguimientoController::class,'index'])->name('admin.Seguimiento');  