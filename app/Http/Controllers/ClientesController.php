<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        
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

    
    public function edit()
    {       
        return view('usuarios.client.perfil');

    }

    public function update(Request $request, $id)
    {
           $usuarios = request()->except(['_token','_method']);
      // return response()->json($usuarios);
        if ($request -> hasFile('imagen')) {

            $usuario = User::findOrFail($id);
            Storage::delete('public/'.$usuario->imagen);
            $usuarios['imagen']=$request->file('imagen')->store('uploads','public');
        }
        User::where('id','=',$id)->update($usuarios);
        return redirect('/home');
    }

    public function Password(){

        return view('usuarios.client.editarPassword');
    }

    public function updatePassword(Request $request, $id){

        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:8|max:18',
        ];
        
        $messages = [
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 8 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = validator($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('configuracion')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('/home')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('configuracion')->with('message', 'Credenciales incorrectas');
            }
        }
    }

    public function eliminarCuenta($id){

        User::destroy($id);
        return redirect('/');
    }

    
    public function destroy($id)
    {
        //
    }
}
