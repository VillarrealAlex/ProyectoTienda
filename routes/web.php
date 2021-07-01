<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimerController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EncargadosController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SupervisorController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//****************************************    PRIMERAS RUTAS    ********************************** */
Route::get('/',[PrimerController::class,'index'])->middleware('guest');
Route::get('/inicia-sesion',[PrimerController::class,'sesion'])->name('login');
Route::get('/registrar/usuario',[PrimerController::class,'registrar']);
Route::post('/validarRegistro',[UsersController::class,'storeAjax']);

Route::post('/usuario/nuevo', [UsersController::class,'store'])->name('nuevo');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',[LoginController::class,'logout'])->middleware('auth');

//******************************** RUTAS CLIENTES  *************************************************** */
Route::get('users/perfil',[ClientesController::class,'edit'])->name('perfil');
Route::put('perfil/{id}',[ClientesController::class,'update']);
Route::get('configuracion',[ClientesController::class,'Password'])->name('config');
Route::post('configuracion/{id}',[ClientesController::class,'updatePassword'])->name('nuevoPass');
Route::delete('eliminar-cuenta/{id}',[ClientesController::class,'eliminarCuenta'])->name('eliminar');
Route::get('ver-productos/{id}',[ClientesController::class,'index']);

Route::get('productos/{id}/{nombre}',[PrimerController::class,'veProductos']);
Route::get('productos',[ProductosController::class,'indexC'])->middleware('auth')->name('productos');

//--comprador

Route::get('preguntas/{id}',[ClientesController::class,'preguntar'])->middleware('auth')->name('preguntar');
Route::put('guardar/pregunta/{id}',[PreguntaController::class,'update']);
Route::get('adquirir/este/producto/{id}',[ClientesController::class,'adquirir']);

//--vendedor

Route::get('revisar/producto/{id}',[ProductosController::class,'revisar'])->middleware('auth');
Route::put('responder/pregunta/{id}',[RespuestaController::class,'store'])->middleware('auth');

//********************************************* RUTAS SUPERVISOR********************************* */
Route::get('usuarios',[SupervisorController::class,'index'])->middleware('auth')->name('users');
Route::get('editar/usuario/{id}',[SupervisorController::class,'edit'])->middleware('auth');
Route::get('detalles/usuario/{id}',[SupervisorController::class,'show'])->middleware('auth');
Route::put('actualizar/{id}',[SupervisorController::class,'update'])->middleware('auth');
Route::delete('eliminar/usuario/{id}',[SupervisorController::class,'destroy'])->middleware('auth');
Route::put('cambiar/password/{id}',[SupervisorController::class,'updatePassword'])->middleware('auth');
Route::get('crear-nuevo-usuario',[SupervisorController::class,'create'])->middleware('auth')->name('nuevoUsuario');
Route::post('nuevo/usuario',[SupervisorController::class,'store'])->middleware('auth');

Route::get('categorias',[CategoriaController::class,'listarCategorias'])->name('categorias')->middleware('auth');
Route::post('nueva/categoria',[CategoriaController::class,'store'])->middleware('auth')->name('nueva.categoria');
Route::put('editar/categoria/{id}',[CategoriaController::class,'update'])->middleware('auth');
Route::delete('eliminar/categoria/{id}',[CategoriaController::class,'destroy'])->middleware('auth');

Route::get('productos/{id}',[ProductosController::class,'index'])->middleware('auth');
Route::post('nuevo/producto',[ProductosController::class,'store'])->middleware('auth')->name('nuevo.producto');
Route::delete('eliminar/producto/{id}',[ProductosController::class,'destroy'])->middleware('auth');
Route::put('editar/producto/{id}',[ProductosController::class,'update'])->middleware('auth');
//*************************************************   RUTAS DE ENCARGADO ***************************** */

Route::get('categorias/encargado',[EncargadosController::class,'index'])->middleware('auth')->name('categoria.encargado');
Route::post('nueva/categoria/encargado',[CategoriaController::class,'storeE'])->middleware('auth')->name('nueva.categoria.E');
//Route::put('editar/categoria/encargado/{id}',[CategoriaController::class,'UpdateE']);
Route::delete('eliminar/categoria/encargado/{id}', [CategoriaController::class,'eliminarE']);

Route::put('actualizar/producto/{id}',[ProductosController::class,'updateEn'])->middleware('auth');

//******************************************************RUTAS CONTADOR****************+**** */
Route::get('validar/pago', [ContadorController::class,'index2'])->name('validar');
Route::get('listar/pagos', [ContadorController::class,'index2'])->name('listar');
Route::get('generar/nuevo/pago', [ContadorController::class,'index2'])->name('generar');

Route::resource('categoria','App\Http\Controllers\CategoriaController');