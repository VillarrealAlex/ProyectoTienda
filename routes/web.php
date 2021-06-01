<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimerController;
use App\Http\Controllers\CategoriasController;
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

Route::get('/',[PrimerController::class,'index']);
Route::get('/inicia-sesion',[PrimerController::class,'sesion'])->name('login');
Route::get('/registrar/usuario',[PrimerController::class,'registrar']);

Route::post('/usuario/nuevo', [UsersController::class,'store'])->name('nuevo');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout',[LoginController::class,'logout'])->middleware('auth');

//Route::get('/admin',[UsersController::class,'admin'])->middleware('auth');

Route::resource('categoria','App\Http\Controllers\CategoriaController');