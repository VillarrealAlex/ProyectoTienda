<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use User;
use Validator;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function perfil()
    {
        return view('usuarios.client.perfil');
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

    
    public function edit($id, Request $request)
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
