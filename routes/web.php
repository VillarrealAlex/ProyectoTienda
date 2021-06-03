<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimerController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductosController;
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




Route::resource('categoria','App\Http\Controllers\CategoriaController');