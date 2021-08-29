<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\RubrosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\NotificationsController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/juego', [App\Http\Controllers\GameController::class, 'index'])->name('game');

Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('/areas/nuevo', [AreaController::class, 'create'])->name('areas.create');
Route::get('/areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::get('/areas/{id}/editar', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

Route::get('/proyectos', [ProyectosController::class, 'index'])->name('proyectos.index');
Route::post('/proyectos', [ProyectosController::class, 'store'])->name('proyectos.store');
Route::get('/proyectos/nuevo', [ProyectosController::class, 'create'])->name('proyectos.create');
Route::get('/proyectos/{id}', [ProyectosController::class, 'show'])->name('proyectos.show');
Route::get('/proyectos/{id}/editar', [ProyectosController::class, 'edit'])->name('proyectos.edit');
Route::put('/proyectos/{id}', [ProyectosController::class, 'update'])->name('proyectos.update');
Route::delete('/proyectos/{id}', [ProyectosController::class, 'destroy'])->name('proyectos.destroy');
Route::get('/proyectos/{id}/siguiente', [ProyectosController::class, 'siguiente'])->name('proyectos.siguiente');
Route::get('/proyectos/{id}/autoriza', [ProyectosController::class, 'autoriza'])->name('proyectos.autoriza');
Route::get('/proyectos/{id}/rechaza', [ProyectosController::class, 'rechaza'])->name('proyectos.rechaza');
Route::put('/proyectos/{id}/asigna', [ProyectosController::class, 'asigna_pre'])->name('proyectos.asigna');
Route::get('/proyectos/{id}/asigna', [ProyectosController::class, 'asigna'])->name('proyectos.asigna');

Route::get('/estatus', [EstatusController::class, 'index'])->name('estatus.index');
Route::post('/estatus', [EstatusController::class, 'store'])->name('estatus.store');
Route::get('/estatus/nuevo', [EstatusController::class, 'create'])->name('estatus.create');
Route::get('/estatus/{id}', [EstatusController::class, 'show'])->name('estatus.show');
Route::get('/estatus/{id}/editar', [EstatusController::class, 'edit'])->name('estatus.edit');
Route::put('/estatus/{id}', [EstatusController::class, 'update'])->name('estatus.update');
Route::delete('/estatus/{id}', [EstatusController::class, 'destroy'])->name('estatus.destroy');

Route::get('/rubros', [RubrosController::class, 'index'])->name('rubros.index');
Route::post('/rubros', [RubrosController::class, 'store'])->name('rubros.store');
Route::get('/rubros/nuevo', [RubrosController::class, 'create'])->name('rubros.create');
Route::get('/rubros/{id}', [RubrosController::class, 'show'])->name('rubros.show');
Route::get('/rubros/{id}/editar', [RubrosController::class, 'edit'])->name('rubros.edit');
Route::put('/rubros/{id}', [RubrosController::class, 'update'])->name('rubros.update');
Route::delete('/rubros/{id}', [RubrosController::class, 'destroy'])->name('rubros.destroy');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/nuevo', [UserController::class, 'create'])->name('usuarios.create');
Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

Route::get('notifications/get', [NotificationsController::class, 'getNotificationsData'])->name('notifications.get');
