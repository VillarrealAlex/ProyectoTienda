<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContadorController extends Controller
{
    
    public function index()
    {
        //
        $categorias = DB::table('categorias')->get();

        return view('usuarios.encargado.categorias',compact('categorias'));

    }

    public function index2(){

        return view('usuarios.contador.validar');
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
