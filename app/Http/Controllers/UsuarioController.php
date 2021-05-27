<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Usuario;

class UsuarioController extends Controller
{
    
    public function index()
    {
        //
        return view ('usuarios.clientes');
    }

    public function index2()
    {
        //
        return view ('usuarios.admin');
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //nuevo 
        //$users =request()->all();
        $users =request()->except('_token');
       // $users =request()->except('_token','password2');
        $users['password'] = Hash::make($users['password']);
        
        if($request->hasFile('imagen')){

            $users['imagen']=$request->file('imagen')->store('uploads','public');

        }
        Usuario::insert($users);
        return redirect('/');
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
