<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/cliente', [HomeController::class, 'index'])->name('cliente');
Route::get('/jefe', [HomeController::class, 'index'])->name('jefe');
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
/* Crear solicitud */
Route::get('/crear-solicitud', [HomeController::class, 'crearSolicitud'])->name('crear-solicitud');
Route::post('/crear-solicitud', [HomeController::class, 'guardarSolicitud'])->name('crear-solicitud');
/* mostrar solicitudes */
Route::get('/mostrar-solicitudes-usuario', [HomeController::class, 'mostrarSolUsuario'])->name('mostrar-solicitudes-usuario');
/* update solicitud */
Route::post('/update-solicitud/443{id}221', [HomeController::class, 'updateSolicitud'])->name('update-solicitud');
/* init */
Route::get('/', [HomeController::class, 'index'])->name('index');
/* Enviar id al controllador procesar solicitudes */
Route::get('/procesar-solicitud/124{id}542', [HomeController::class, 'procesarSolicitud'])->name('procesar-solicitud');
/* Vehiculos */
Route::get('/mostrar-vehiculos', [HomeController::class, 'mostrarVehiculos'])->name('mostrar-vehiculos');
Route::get('/crear-vehiculo', [HomeController::class, 'crearVehiculo'])->name('crear-vehiculo');
Route::post('/guardar-vehiculo', [HomeController::class, 'guardarVehiculo'])->name('guardar-vehiculo');
/* editar vehiculo */
Route::post('/editar-vehiculo/234{id}556', [HomeController::class, 'editarVehiculo'])->name('editar-vehiculo');
/* Procesar solicitud aprobada */
Route::get('/imprimir-solicitud-aprobada', [HomeController::class, 'imprimirSolAprob'])->name('imprimir-solicitud-aprobada');
 /* aprobar solicitud */
 Route::post('/aprobar-solicitud/124{id}542', [HomeController::class, 'aprobarSolicitud'])->name('aprobar-solicitud');
 /* Eliminar ajax */
 Route::post('/eliminarArticulo/{id}', [HomeController::class, 'eliminarArticulo'])->name('eliminarArticulo');
 Route::post('eliminarUsuario/{id}', [HomeController::class, 'eliminarUsuario'])->name('eliminarUsuario');
 /* imprimir */
 Route::get('/solicitud/pdf{id}', [HomeController::class, 'createPDF'])->name('solicitud-pdf');
 /* editar usuarios */
 Route::get('/editar-usuarios', [HomeController::class, 'editarUsers'])->name('editar-usuarios');
 /* editar rol */
 Route::post('/editar-rol/{id}', [HomeController::class, 'editarRol'])->name('editar-rol');
 /* Solicitudes eliminadas trazas */
 Route::get('/solicitudes-eliminadas', [HomeController::class, 'solictudesEliminadas'])->name('solicitudes-eliminadas');
 /* trazas usuarios */
 Route::get('/trazas-usuarios', [HomeController::class, 'trazasUsuarios'])->name('trazas-usuarios');