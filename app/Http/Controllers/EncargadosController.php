<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
      

    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        
    
    }

    
    public function destroy($id)
    {
       
    }
}
