<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
       //return view('layouts.second_main');
        
       $user = Auth::user();
       if ($user->rol== 'Administrador') {
           # code...
           return view('usuarios.admin.admin');
       } else 
            if($user->rol=='Cliente') {
                $productos = DB::table('categoria')->get();
                return view('usuarios.client.clientes',compact('productos'));
       }else 
             if($user->rol == 'Supervisor'){
                return view('usuarios.supervisor.supervisor');
       }else 
            if($user->rol == 'Contador'){
                return view('usuarios.contador.contador');
       }else 
            if($user->rol == 'Encargado'){
                return view('usuarios.encargado.encargado');
            }else {
                return redirect('/');
            }
       
    }
}
