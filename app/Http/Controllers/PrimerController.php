<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Producto;

class PrimerController extends Controller
{
   
    public function index(Request $request)
    {
        //
        $Bcategoria = $request ->get('Bcategoria');

        $categorias = DB::table('categoria')
                            //->where('activo','=',true)
                             ->where('nombre','LIKE','%'.$Bcategoria.'%')
                            ->get();

        return view('inicio', compact('categorias','Bcategoria'));

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

    public function veProductos(Request $request, $id){

        $prod = Categoria::find($id);
        $Bprod = $request->get('Bprod');

        if ($id != null) {
            $productos = Producto::activodos()->where('categoria_id',$id)
                        //->where('consecionado','=',1)
                        ->where('nombre','LIKE','%'.$Bprod.'%')
                        ->get();
            /*$prod = Producto::select('productos.nombre')
            ->join('categoria', 'productos.categoria_id', '=', 'categoria.id')
            //->where('productos.categoria_id','=',[[$id]])
            ->get();*/

            //return $product;
        return view('productos',compact('productos','prod','Bprod'));
        } else {
            # code...
        }
        
        
        
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
