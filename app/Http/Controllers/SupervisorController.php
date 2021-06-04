<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $users = DB::table('users')
                //->where('id','!=',[[$users->id]])
                ->paginate();
        return view('usuarios.supervisor.users', compact('users'));
    }

   
    public function create()
    {
        return view('usuarios.supervisor.crear');
    }

   
    public function store(Request $request)
    {
        //

         //$users =request()->all();
         $users = request()->except('_token');
         // $users =request()->except('_token','password2');
          $users['password'] = Hash::make($users['password']);
          
          if($request->hasFile('imagen')){
  
              $users['imagen'] = $request->file('imagen')->store('uploads','public');
              
  
             
          }  
          User::insert($users);
  
          return redirect('/usuarios');
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
        $user = User::findOrfail($id);
        return view('usuarios.supervisor.editar',compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        //
        
        $usuarios = request()->except(['_token','_method']);
        // return response()->json($usuarios);
          if ($request -> hasFile('imagen')) {
  
              $usuario = User::findOrFail($id);
              Storage::delete('public/'.$usuario->imagen);
              $usuarios['imagen']=$request->file('imagen')->store('uploads','public');
          }
          User::where('id','=',$id)->update($usuarios);
          return redirect('/usuarios');
    }

    public function updatePassword(Request $request, $id){

        $rules = [
            
            'password' => 'required|confirmed|min:8|max:18',
        ];
        $messages = [
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 8 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
            'status'=>'Contraseña Cambiada con exito',

        ];
            $user = new User;
            $user->where('email', '=', User::find($id)->email)
                 ->update(['password' => bcrypt($request->password)]);
            return redirect('/usuarios')->with('status', 'Password cambiado con éxito');
        
    }

    
    public function destroy($id)
    {
        //
        User::destroy($id);
        return redirect('/usuarios');
    }
}
