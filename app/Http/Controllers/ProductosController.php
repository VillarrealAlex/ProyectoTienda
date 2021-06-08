<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
   

    public function index($id){

        $prod = Categoria::find($id);

        if ($id != null) {
            
            $productos = DB::table('productos')
                        ->where('productos.categoria_id','=',[[$id]])
                        ->get();
               
                        return view('usuarios.supervisor.agregaProductos', compact('productos','prod'));
        }else{
            return redirect('/categorias');
        }
       
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        
        if(auth()->user()){
            $productos = request()->except('_token');
             
             if($request->hasFile('imagen')){
     
                 $productos['imagen'] = $request->file('imagen')->store('uploads','public');
                 
             }  
             Producto::insert($productos);
             //$request->session()->flash('producto_agregado','Producto Agregado Con Éxito');
             Session::flash('producto_agregado','Producto Agregado Con Éxito');
             return redirect('/categorias');
            }else{
                return view('/home');
            }
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
