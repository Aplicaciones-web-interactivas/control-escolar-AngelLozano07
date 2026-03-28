<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [AuthController::class, 'InicioSesion'])->name('login.admin');
Route::get('/home', [AdminController::class, 'index'])->name('home.admin');
Route::post('/iniciarsesion', [AuthController::class, 'IniciarSesion'])->name('login.usuario');
Route::post('/cerrarsesion', [AuthController::class, 'CerrarSesion'])->name('logout.usuario');

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

Route::get('/inscripciones', [AdminController::class, 'inscripciones'])->name('inscripcion.admin');
Route::post('/eliminarinscripcion/{id}', [AdminController::class, 'eliminarinscripcion'])->name('inscripcion.eliminar');
Route::post('/agregarinscripcion', [AdminController::class, 'agregarinscripcion'])->name('inscripcion.agregar');
Route::get('/mostrarinscripcion/{id}', [AdminController::class, 'mostrarinscripcion'])->name('inscripcion.mostrar');
Route::post('/modificarinscripcion/{id}', [AdminController::class, 'modificarinscripcion'])->name('inscripcion.modificar');

Route::get('/calificaciones', [AdminController::class, 'calificaciones'])->name('calificacion.admin');
Route::post('/eliminarcalificacion/{id}', [AdminController::class, 'eliminarcalificacion'])->name('calificacion.eliminar');
Route::post('/agregarcalificacion', [AdminController::class, 'agregarcalificacion'])->name('calificacion.agregar');
Route::get('/mostrarcalificacion/{id}', [AdminController::class, 'mostrarcalificacion'])->name('calificacion.mostrar');
Route::post('/modificarcalificacion/{id}', [AdminController::class, 'modificarcalificacion'])->name('calificacion.modificar');

Route::get('/tareas', [AdminController::class, 'tarea'])->name('tarea.admin');
Route::post('/eliminartarea/{id}', [AdminController::class, 'eliminartarea'])->name('tarea.eliminar');
Route::post('/agregartarea', [AdminController::class, 'agregartarea'])->name('tarea.agregar');
Route::get('/mostrartarea/{id}', [AdminController::class, 'mostrartarea'])->name('tarea.mostrar');
Route::post('/modificartarea/{id}', [AdminController::class, 'modificartarea'])->name('tarea.modificar');