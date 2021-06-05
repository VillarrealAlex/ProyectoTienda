<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Categoria.index');
    }

   public function mostrarCategorias(){

        $categorias = DB::table('categoria')
                            ->get();

        return view('inicio', compact('categorias'));

   }

   public function listarCategorias(){
    if (auth()->user()) {
        # code...
        $user = auth()->user();
    $categorias  = DB::table('categoria')
                    ->paginate();
   
        return view('usuarios.supervisor.categorias', compact('categorias'));
    }else{
    return view('/home');
    }
}


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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categoria::destroy($id);
        return redirect('/categorias');
    }
}
