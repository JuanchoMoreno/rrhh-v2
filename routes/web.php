<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoraExtraGenDetController;
use App\Http\Controllers\HoraExtraGeneralController;
use App\Http\Controllers\HoraExtraDetalleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/crearEmpresa', [App\Http\Controllers\EmpresaController::class, 'create'])->name('admin.empresas.crear');
Route::get('/crearEmpresa/depto/{id_pais}', [App\Http\Controllers\EmpresaController::class, 'buscar_depto'])->name('admin.empresas.crear.buscar_deptos');
Route::get('/crearEmpresa/ciudad/{id_depto}', [App\Http\Controllers\EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.crear.buscar_ciudades');
Route::post('/crearEmpresa/create', [App\Http\Controllers\EmpresaController::class, 'store'])->name('admin.empresas.store');

// Rutas de configuraciones
Route::get('/admin/configuracion', [App\Http\Controllers\EmpresaController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth');
Route::get('/admin/configuracion/depto/{id_pais}', [App\Http\Controllers\EmpresaController::class, 'buscar_depto'])->name('admin.empresas.crear.buscar_deptos');
Route::get('/admin/configuracion/ciudad/{id_depto}', [App\Http\Controllers\EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.crear.buscar_ciudades');
Route::put('/admin/configuracion/{id}', [App\Http\Controllers\EmpresaController::class, 'update'])->name('admin.configuracion.update');

// Rutas de roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('admin.roles.show')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

// Rutas de usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');

// Rutas de cargos
Route::get('/admin/cargos', [App\Http\Controllers\CargoController::class, 'index'])->name('admin.cargos.index')->middleware('auth');
Route::get('/admin/cargos/create', [App\Http\Controllers\CargoController::class, 'create'])->name('admin.cargos.create')->middleware('auth');
Route::post('/admin/cargos/create', [App\Http\Controllers\CargoController::class, 'store'])->name('admin.cargos.store')->middleware('auth');
Route::get('/admin/cargos/{id}', [App\Http\Controllers\CargoController::class, 'show'])->name('admin.cargos.show')->middleware('auth');
Route::get('/admin/cargos/{id}/edit', [App\Http\Controllers\CargoController::class, 'edit'])->name('admin.cargos.edit')->middleware('auth');
Route::put('/admin/cargos/{id}', [App\Http\Controllers\CargoController::class, 'update'])->name('admin.cargos.update')->middleware('auth');
Route::delete('/admin/cargos/{id}', [App\Http\Controllers\CargoController::class, 'destroy'])->name('admin.cargos.destroy')->middleware('auth');

// Rutas de horas extras unidas
Route::get('/admin/horas_extras', [HoraExtraGenDetController::class, 'index'])->name('admin.horas_extras.index')->middleware('auth');
Route::get('/admin/horas_extras/create', [HoraExtraGenDetController::class, 'create'])->name('admin.horas_extras.create')->middleware('auth');
Route::post('/admin/horas_extras/create', [HoraExtraGenDetController::class, 'store'])->name('admin.horas_extras.store')->middleware('auth');
Route::get('/admin/horas_extras/{id}', [HoraExtraGenDetController::class, 'show'])->name('admin.horas_extras.show')->middleware('auth');
Route::get('/admin/horas_extras/{id}/edit', [HoraExtraGenDetController::class, 'edit'])->name('admin.horas_extras.edit')->middleware('auth');
Route::put('/admin/horas_extras/{id}', [HoraExtraGenDetController::class, 'update'])->name('admin.horas_extras.update')->middleware('auth');
Route::delete('/admin/horas_extras/{id}', [HoraExtraGenDetController::class, 'destroy'])->name('admin.horas_extras.destroy')->middleware('auth');
Route::get('/admin/horas_extras/clase/{id_depart}', [HoraExtraGenDetController::class, 'buscar_clase'])->name('admin.horas_extras.crear.buscar_clases')->middleware('auth');
Route::get('/admin/horas_extras/ccosto/{id_clase}', [HoraExtraGenDetController::class, 'buscar_ccosto'])->name('admin.horas_extras.crear.buscar_ccostos')->middleware('auth');

// Rutas de horas extras generales
Route::get('/admin/horas_extras_gen', [HoraExtraGeneralController::class, 'index'])->name('admin.horas_extras_gen.index')->middleware('auth');
Route::get('/admin/horas_extras_gen/create', [HoraExtraGeneralController::class, 'create'])->name('admin.horas_extras_gen.create')->middleware('auth');
Route::post('/admin/horas_extras_gen/create', [HoraExtraGeneralController::class, 'store'])->name('admin.horas_extras_gen.store')->middleware('auth');
Route::get('/admin/horas_extras_gen/{id}', [HoraExtraGeneralController::class, 'show'])->name('admin.horas_extras_gen.show')->middleware('auth');
Route::get('/admin/horas_extras_gen/{id}/edit', [HoraExtraGeneralController::class, 'edit'])->name('admin.horas_extras_gen.edit')->middleware('auth');
Route::put('/admin/horas_extras_gen/{id}', [HoraExtraGeneralController::class, 'update'])->name('admin.horas_extras_gen.update')->middleware('auth');
Route::delete('/admin/horas_extras_gen/{id}', [HoraExtraGeneralController::class, 'destroy'])->name('admin.horas_extras_gen.destroy')->middleware('auth');

// Rutas de horas extras detalles
Route::get('/admin/horas_extras_det', [HoraExtraDetalleController::class, 'index'])->name('admin.horas_extras_det.index')->middleware('auth');
Route::get('/admin/horas_extras_det/create', [HoraExtraDetalleController::class, 'create'])->name('admin.horas_extras_det.create')->middleware('auth');
Route::post('/admin/horas_extras_det/create', [HoraExtraDetalleController::class, 'store'])->name('admin.horas_extras_det.store')->middleware('auth');
Route::get('/admin/horas_extras_det/{id}', [HoraExtraDetalleController::class, 'show'])->name('admin.horas_extras_det.show')->middleware('auth');
Route::get('/admin/horas_extras_det/{id}/edit', [HoraExtraDetalleController::class, 'edit'])->name('admin.horas_extras_det.edit')->middleware('auth');
Route::put('/admin/horas_extras_det/{id}', [HoraExtraDetalleController::class, 'update'])->name('admin.horas_extras_det.update')->middleware('auth');
Route::delete('/admin/horas_extras_det/{id}', [HoraExtraDetalleController::class, 'destroy'])->name('admin.horas_extras_det.destroy')->middleware('auth');