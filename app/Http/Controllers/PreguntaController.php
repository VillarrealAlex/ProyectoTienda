<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class PreguntaController extends Controller
{
    
    public function index()
    {
        //
       
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    
    public function show(Pregunta $pregunta)
    {
        //
    }

    
    public function edit(Pregunta $pregunta)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
        $pregunta = request()->except(['_token','_method']);
        $pregunta['user_id']= Auth::user()->id;
        $pregunta['producto_id']= $id;
        Pregunta::insert($pregunta);
        Session::flash('pregunta_realizada','Pregunta Realizada, Espere a que el vendedor responda');
        return redirect()->back();
    }

    
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
