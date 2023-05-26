<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GestionOperadoresController;
use App\Http\Controllers\Admin\RegisterOperadorController;
use App\Http\Controllers\Admin\SeguimientoController;
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

Route::get('SuperAdmin/superAdminIndex', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

Route::get('SuperAdmin/GestionOperadores', [GestionOperadoresController::class,'index'])->name('admin.Gestion');
Route::get('SuperAdmin/RegistroOperadores', [GestionOperadoresController::class,'create'])->name('admin.Registro');
Route::post('SuperAdmin/RegistroOperadores', [GestionOperadoresController::class,'store'])->name('admin.store');



Route::get('SuperAdmin/RegistroOperadores', [RegisterOperadorController::class,'index'])->name('admin.Registro');
Route::get('/editar/{id}', [RegisterOperadorController::class,'edit'])->name('admin.Editar');


Route::get('SuperAdmin/Seguimiento', [SeguimientoController::class,'index'])->name('admin.Seguimiento');  