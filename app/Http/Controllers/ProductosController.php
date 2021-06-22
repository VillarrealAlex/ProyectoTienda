<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){

        $prod = Categoria::find($id);

    
            $productos = DB::table('productos')
                        ->where('productos.categoria_id','=',[[$id]])
                        ->get();
               
                        return view('usuarios.supervisor.agregaProductos', compact('productos','prod'));
       
    }

    public function indexC()
    {
        
        switch (Auth::user()->rol) {
            case 'Cliente':
                $cliente = Auth::user()->id;
                $productos = DB::table('productos')->where('user_id','=',[[$cliente]])->get();  

                    return view("usuarios.client.productos",compact("productos"));
                
                break;
            case 'Encargado':
                //$cliente = Auth::user()->id;
                $productos = Producto::get();  

                    return view("usuarios.encargado.productos",compact("productos"));
                
                break;

            default:
            $productos = Producto::get();
                 return view("usuarios.supervisor.agregaProductos",compact("productos"));
            
                break;
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
             $productos['user_id']=Auth::user()->id;
            
             Producto::insert($productos);
             //$request->session()->flash('producto_agregado','Producto Agregado Con Éxito');
             Session::flash('producto_agregado','Producto Agregado Con Éxito');
             return redirect('/productos');
            }else{
                return view('/productos');
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
        $revisar = Producto::find($id);
        switch (Auth::user()->rol) {
            case 'Cliente':
                $cliente = Auth::user()->id;
                $productos = DB::table('productos')->where('user_id','=',[[$cliente]])->get();  

                    return view("usuarios.client.productos",compact("productos"));
                
                break;
            case 'Encargado':
                //$cliente = Auth::user()->id;
                $revisar = Producto::find($id);
                $productos = DB::table('productos')
                            ->where('id','=',[[$id]]) 
                            ->get();
                    return view("usuarios.encargado.revisar",compact('productos','revisar'));
                
                break;

            default:
            $productos = Producto::get();
                 return view("usuarios.supervisor.agregaProductos",compact("productos"));
            
                break;
        }
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
      
         $productos = request()->except(['_token','_method']);
      // return response()->json($usuarios);
        if ($request -> hasFile('imagen')) {

            $prod = Producto::findOrFail($id);
            Storage::delete('public/'.$prod->imagen);
            $categorias['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Producto::where('id','=',$id)->update($productos);
        Session::flash('producto_editado','Producto Editado Correctamente');
        return redirect('/productos');

    }
    public function UpdateE(Request $request, $id){

        $productos = request()->except(['_token','_method']);
      // return response()->json($usuarios);
        if ($request -> hasFile('imagen')) {

            $prod = Producto::findOrFail($id);
            Storage::delete('public/'.$prod->imagen);
            $categorias['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Producto::where('id','=',$id)->update($productos);
        Session::flash('producto_editado','Producto Editado Correctamente');
        return redirect('/productos');
    }

    public function revisar(Request $request, $id){
        
       // $this->authorize('product',$id);

        $productos = request()->except(['_token','_method']);
        // return response()->json($usuarios);
          if ($request -> hasFile('imagen')) {
  
              $prod = Producto::findOrFail($id);
              Storage::delete('public/'.$prod->imagen);
              $categorias['imagen']=$request->file('imagen')->store('uploads','public');
          }
          Producto::where('id','=',$id)->update($productos);
          Session::flash('producto_revisado','Este Producto ha sido revisado');
          return redirect('/productos');
    }
   
    public function destroy($id)
    {
        //
        Producto::destroy($id);
        Session::flash('producto_eliminado','Producto eliminado Con Éxito');
        return redirect('/productos');
    }

    public function destroyE($id)
    {
        //
        Producto::destroy($id);
        Session::flash('producto_eliminado','Producto eliminado Con Éxito');
        return redirect('/productos');
    }
}
