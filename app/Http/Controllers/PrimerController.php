<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Producto;

class PrimerController extends Controller
{
   
    public function index()
    {
        //
        $categorias = DB::table('categoria')
                            ->paginate();

        return view('inicio', compact('categorias'));

       // return view('inicio');
    }

    public function sesion()
    {
        return view('auth.login');
    }

    public function registrar()
    {
        return view('auth.register');
    }

    public function veProductos(){

        $productos = DB::table('productos')
                    ->join('categoria','productos.categoria_id','=','categoria.id')
                    ->select('productos.nombre','productos.precio','productos.descripcion','productos.imagen')
                    ->groupBy('productos.nombre','productos.precio','productos.descripcion','productos.imagen')
                    ->paginate(6);

        return view('productos',compact('productos'));
    }
   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
