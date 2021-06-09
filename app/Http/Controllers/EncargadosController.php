<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;

class EncargadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        //
        $Bcat = $request ->get('Bcategoria');
        $categorias = DB::table('categoria')
                        ->where('nombre','LIKE','%'.$Bcat.'%')
                        ->get();
       
        return view('usuarios.encargado.categorias',compact('categorias','Bcat'));

    }

    public function listarProd(){

        $productos = DB::table('productos')
        ->get();

        return view('usuarios.encargado.productos', compact('productos'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
