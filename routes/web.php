<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimerController;

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

Route::get('/','PrimerController@index');
Route::get('/inicia-sesion','PrimerController@sesion');
Route::get('/registrar/usuario','PrimerController@registrar');

Route::get('/magnus-store/acceso', 'UsuarioController@index');
Route::get('/magnus-store/acceso/admin', 'UsuarioController@index2');
Route::post('/usuario/nuevo', 'UsuarioController@store');
