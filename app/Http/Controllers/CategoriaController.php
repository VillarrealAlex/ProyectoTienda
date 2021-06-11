<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
    }
    
    public function index(){


        return view('Categoria.index');
    }

   public function mostrarCategorias(){

            $categorias = DB::table('categoria')
                   ->get();

        return view('inicio', compact('categorias'));
   }

   public function listarCategorias(Request $request){
    
    if (auth()->user()) {
        # code...
        $user = auth()->user();
        $Bcat = $request->get('Bcategoria');
        $categorias  = DB::table('categoria')
                    ->where('nombre','LIKE','%'.$Bcat.'%')
                    ->paginate();
   
        return view('usuarios.supervisor.categorias', compact('categorias','Bcat'));
    }else{
    return view('/home');
    }}


    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
        if(auth()->user()){
        $users = request()->except('_token');
         
         if($request->hasFile('imagen')){
 
             $users['imagen'] = $request->file('imagen')->store('uploads','public');
             
 
            
         }  
         Categoria::insert($users);
 
         return redirect('/categorias');
        }else{
            return view('/home');
        }
    }

    public function storeE(Request $request)
    {
        //
        if(auth()->user()){
        $users = request()->except('_token');
         
         if($request->hasFile('imagen')){
 
             $users['imagen'] = $request->file('imagen')->store('uploads','public');
             
 
            
         }  
         Categoria::insert($users);
 
         return redirect('/encargado/categoria');
        }else{
            return view('/home');
        }
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
        if (auth()->user()){

            $categorias = request()->except(['_token','_method']);
      // return response()->json($usuarios);
        if ($request -> hasFile('imagen')) {

            $cate = Categoria::findOrFail($id);
            Storage::delete('public/'.$cate->imagen);
            $categorias['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Categoria::where('id','=',$id)->update($categorias);
        return redirect('/categorias');

        }else{
            return view('/home');
        }
    }

    public function updateE(Request $request, $id)
    {
        if (auth()->user()){

            $categorias = request()->except(['_token','_method']);
      // return response()->json($usuarios);
        if ($request -> hasFile('imagen')) {

            $cate = Categoria::findOrFail($id);
            Storage::delete('public/'.$cate->imagen);
            $categorias['imagen']=$request->file('imagen')->store('uploads','public');
        }
        Categoria::where('id','=',$id)->update($categorias);
        Session::flash('categoria_editada','Se Ha Editado Una Categoria ');
        return redirect('/encargado/categoria');

        }else{
            return view('/home');
        }
    }

    public function destroy($id)
    {
        //
        Categoria::destroy($id);
        Session::flash('categoria_eliminado','Categoria eliminada ');
        return redirect('/categorias');
    }
    public function eliminarE($id)
    {
        //
        Categoria::destroy($id);
        Session::flash('categoria_eliminado','Categoria eliminada ');
        return redirect('/encargado/categoria');
    }
}
