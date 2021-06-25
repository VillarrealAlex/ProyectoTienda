<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class RespuestaController extends Controller
{
    public function store(Request $request, $id){

        $respuesta = request()->except(['_token','_method']);
        $respuesta['user_id']= Auth::user()->id;
        $respuesta['pregunta_id']= $id;
        Respuesta::insert($respuesta);
        //Session::flash('pregunta_realizada','Pregunta Realizada, Espere a que el vendedor responda');
        return redirect()->back();
    }
}
