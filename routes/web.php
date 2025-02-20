<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorasExtrasGenDetController;

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('horas_extras', HorasExtrasGenDetController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name(name: 'home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/crearEmpresa', [App\Http\Controllers\EmpresaController::class, 'create'])->name('admin.empresas.crear');
Route::get('/crearEmpresa/depto/{id_pais}', [App\Http\Controllers\EmpresaController::class, 'buscar_depto'])->name('admin.empresas.crear.buscar_deptos');
Route::get('/crearEmpresa/ciudad/{id_depto}', [App\Http\Controllers\EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.crear.buscar_ciudades');
Route::post('/crearEmpresa/create', [App\Http\Controllers\EmpresaController::class, 'store'])->name('admin.empresas.store');

//rutas de configuraciones
Route::get('/admin/configuracion', [App\Http\Controllers\EmpresaController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth');
Route::get('/admin/configuracion/depto/{id_pais}', [App\Http\Controllers\EmpresaController::class, 'buscar_depto'])->name('admin.empresas.crear.buscar_deptos');
Route::get('/admin/configuracion/ciudad/{id_depto}', [App\Http\Controllers\EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.crear.buscar_ciudades');
Route::put('/admin/configuracion/{id}', [App\Http\Controllers\EmpresaController::class, 'update'])->name('admin.configuracion.update');

//rutas de roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('admin.roles.show')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

//rutas de usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');

//rutas de cargos
Route::get('/admin/cargos', [App\Http\Controllers\CargoController::class, 'index'])->name('admin.cargos.index')->middleware('auth');
Route::get('/admin/cargos/create', [App\Http\Controllers\CargoController::class, 'create'])->name('admin.cargos.create')->middleware('auth');
Route::post('/admin/cargos/create', [App\Http\Controllers\CargoController::class, 'store'])->name('admin.cargos.store')->middleware('auth');
Route::get('/admin/cargos/{id}', [App\Http\Controllers\CargoController::class, 'show'])->name('admin.cargos.show')->middleware('auth');
Route::get('/admin/cargos/{id}/edit', [App\Http\Controllers\CargoController::class, 'edit'])->name('admin.cargos.edit')->middleware('auth');
Route::put('/admin/cargos/{id}', [App\Http\Controllers\CargoController::class, 'update'])->name('admin.cargos.update')->middleware('auth');
Route::delete('/admin/cargos/{id}', [App\Http\Controllers\CargoController::class, 'destroy'])->name('admin.cargos.destroy')->middleware('auth');

//rutas de horas extras unidas
Route::get('/admin/horas_extras', [App\Http\Controllers\HoraExtraGenDetController::class, 'index'])->name('admin.horas_extras.index')->middleware('auth');
Route::get('/admin/horas_extras/create', [App\Http\Controllers\HoraExtraGenDetController::class, 'create'])->name('admin.horas_extras.create')->middleware('auth');
Route::post('/admin/horas_extras/create', [App\Http\Controllers\HoraExtraGenDetController::class, 'store'])->name('admin.horas_extras.store')->middleware('auth');
Route::get('/admin/horas_extras/{id}', [App\Http\Controllers\HoraExtraGenDetController::class, 'show'])->name('admin.horas_extras.show')->middleware('auth');
Route::get('/admin/horas_extras/{id}/edit', [App\Http\Controllers\HoraExtraGenDetController::class, 'edit'])->name('admin.horas_extras.edit')->middleware('auth');
Route::get('/admin/horas_extras/clase/{id_depart}', [App\Http\Controllers\HoraExtraGenDetController::class, 'buscar_clase'])->name('admin.horas_extras.crear.buscar_clases')->middleware('auth');
Route::get('/admin/horas_extras/ccosto/{id_clase}', [App\Http\Controllers\HoraExtraGenDetController::class, 'buscar_ccosto'])->name('admin.horas_extras.crear.buscar_ccostos')->middleware('auth');
Route::put('/admin/horas_extras/{id}', [App\Http\Controllers\HoraExtraGenDetController::class, 'update'])->name('admin.horas_extras.update')->middleware('auth');
Route::delete('/admin/horas_extras/{id}', [App\Http\Controllers\HoraExtraGenDetController::class, 'destroy'])->name('admin.horas_extras.destroy')->middleware('auth');

// rutas de horas extras generales
Route::get('/admin/horas_extras_gen', [App\Http\Controllers\HoraExtraGeneralController::class, 'index'])->name('admin.horas_extras.index')->middleware('auth');
Route::get('/admin/horas_extras_gen/create', [App\Http\Controllers\HoraExtraGeneralController::class, 'create'])->name('admin.horas_extras.create')->middleware('auth');
Route::post('/admin/horas_extras_gen/create', [App\Http\Controllers\HoraExtraGeneralController::class, 'store'])->name('admin.horas_extras.store')->middleware('auth');
Route::get('/admin/horas_extras_gen/{id}', [App\Http\Controllers\HoraExtraGeneralController::class, 'show'])->name('admin.horas_extras.show')->middleware('auth');
Route::get('/admin/horas_extras_gen/{id}/edit', [App\Http\Controllers\HoraExtraGeneralController::class, 'edit'])->name('admin.horas_extras.edit')->middleware('auth');
Route::get('/admin/horas_extras/clase/{id_depart}', [App\Http\Controllers\HoraExtraGenDetController::class, 'buscar_clase'])->name('admin.horas_extras.crear.buscar_clases')->middleware('auth');
Route::get('/admin/horas_extras/ccosto/{id_clase}', [App\Http\Controllers\HoraExtraGenDetController::class, 'buscar_ccosto'])->name('admin.horas_extras.crear.buscar_ccostos')->middleware('auth');
Route::put('/admin/horas_extras_gen/{id}', [App\Http\Controllers\HoraExtraGeneralController::class, 'update'])->name('admin.horas_extras.update')->middleware('auth');
Route::delete('/admin/horas_extras/{id}', [App\Http\Controllers\HoraExtraGeneralController::class, 'destroy'])->name('admin.horas_extras.destroy')->middleware('auth');

// rutas de horas extras generales
Route::get('/admin/horas_extras_gen', [App\Http\Controllers\HoraExtraDetalleController::class, 'index'])->name('admin.horas_extras.index')->middleware('auth');
Route::get('/admin/horas_extras_gen/create', [App\Http\Controllers\HoraExtraDetalleController::class, 'create'])->name('admin.horas_extras.create')->middleware('auth');
Route::post('/admin/horas_extras_gen/create', [App\Http\Controllers\HoraExtraDetalleController::class, 'store'])->name('admin.horas_extras.store')->middleware('auth');
Route::get('/admin/horas_extras_gen/{id}', [App\Http\Controllers\HoraExtraDetalleController::class, 'show'])->name('admin.horas_extras.show')->middleware('auth');
Route::get('/admin/horas_extras_gen/{id}/edit', [App\Http\Controllers\HoraExtraDetalleController::class, 'edit'])->name('admin.horas_extras.edit')->middleware('auth');
Route::put('/admin/horas_extras_gen/{id}', [App\Http\Controllers\HoraExtraDetalleController::class, 'update'])->name('admin.horas_extras.update')->middleware('auth');
Route::delete('/admin/horas_extras/{id}', [App\Http\Controllers\HoraExtraDetalleController::class, 'destroy'])->name('admin.horas_extras.destroy')->middleware('auth');