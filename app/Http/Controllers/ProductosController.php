<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pregunta;

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
                $productos = Producto::where('user_id','=',[[$cliente]])->get();  

                    return view("usuarios.client.productos",compact("productos"));
                
                break;
            case 'Encargado':
                //$cliente = Auth::user()->id;
                $productos = Producto::Activo()
                        ->join('categoria','productos.categoria_id','=','categoria.id')
                        ->select('productos.id','productos.nombre','productos.precio','productos.imagen','productos.descripcion','categoria.id')
                        ->get(); 

                    return view("usuarios.encargado.productos",compact("productos"));
                
                break;

            default:
            $productos = DB::table('productos')
                        ->join('categoria','productos.categoria_id','=','categoria.id')
                        ->select('productos.id','productos.nombre','productos.precio','productos.imagen','productos.descripcion','categoria.id')
                        ->get();
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
                //$revisar = Producto::find($id);
                $productos = Producto::Activo()
                            ->where('id','=',[[$id]]) 
                            //->where('consecionado','!=', 1)
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

    public function updateEn(Request $request, $id){

        $productos = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $prod = Producto::findOrFail($id);
            Storage::delete('public/'.$prod->imagen);
            $productos['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Producto::where('id','=',[[$id]])->update($productos);
        Session::flash('producto_revisado','El producto ha sido revisado');
        return redirect('/productos');
    }

    
    public function revisar( $id){

      //  $this->authorize('product',$id);
        $producto = Producto::where($id);
        
        $pro = DB::table('productos')->where('id','=',$id)->get();
        $revisar = DB::table('preguntas')
                    ->join('productos','productos.id','=','preguntas.producto_id')
                     ->where('preguntas.producto_id','=',$id)
                    ->get();
        return view('usuarios.client.responder', compact('revisar','producto','pro'));
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
