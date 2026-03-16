<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [AuthController::class, 'InicioSesion'])->name('login.admin');
Route::get('/home', [AdminController::class, 'index'])->name('home.admin');
Route::post('/iniciarsesion', [AuthController::class, 'IniciarSesion'])->name('login.usuario');

Route::get('/registro', [AuthController::class, 'InicioRegistro'])->name('registro.admin');
Route::post('/registro', [AuthController::class, 'Registro'])->name('registro.usuario');

Route::get('/materias', [AdminController::class, 'materias'])->name('materia.admin');
Route::post('/eliminarmateria/{id}', [AdminController::class, 'eliminarmateria'])->name('materia.eliminar');
Route::post('/agregarmateria', [AdminController::class, 'agregarmateria'])->name('materia.agregar');
Route::get('/mostrarmateria/{id}', [AdminController::class, 'mostrarmateria'])->name('materia.mostrar');
Route::post('/modificarmateria/{id}', [AdminController::class, 'modificarmateria'])->name('materia.modificar');

Route::get('/horarios', [AdminController::class, 'horarios'])->name('horario.admin');
Route::post('/eliminarhorario/{id}', [AdminController::class, 'eliminarhorario'])->name('horario.eliminar');
Route::post('/agregarhorario', [AdminController::class, 'agregarhorario'])->name('horario.agregar');
Route::get('/mostrarhorario/{id}', [AdminController::class, 'mostrarhorario'])->name('horario.mostrar');
Route::post('/modificarhorario/{id}', [AdminController::class, 'modificarhorario'])->name('horario.modificar');

Route::get('/grupos', [AdminController::class, 'grupos'])->name('grupo.admin');
Route::post('/eliminargrupo/{id}', [AdminController::class, 'eliminargrupo'])->name('grupo.eliminar');
Route::post('/agregargrupo', [AdminController::class, 'agregargrupo'])->name('grupo.agregar');
Route::get('/mostrargrupo/{id}', [AdminController::class, 'mostrargrupo'])->name('grupo.mostrar');
Route::post('/modificargrupo/{id}', [AdminController::class, 'modificargrupo'])->name('grupo.modificar');