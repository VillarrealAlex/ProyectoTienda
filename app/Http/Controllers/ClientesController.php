<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Producto;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{

    public function veProductos(){

        return view('productos');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
   

    public function index($id)
    {
        $prod = Categoria::find($id);
        switch (Auth::user()->rol) {
            case 'Cliente':
                $cliente = Auth::user()->id;
                $productos = Producto::ActivoDos()

                            ->where('user_id','!=',[[$cliente]]) 
                            ->where('categoria_id','=',[[$id]])->get(); 
                            
                    return view("usuarios.client.comprar",compact("productos"));
                
                break;
            default:
            $productos = Producto::get();
                 return view("usuarios.supervisor.agregaProductos",compact("productos"));
            
                break;
        }
    }

    public function preguntar( $id){

       //$this->authorize('question',$id);
       $producto = Producto::find($id);

        $pregunta = DB::table('preguntas')
        ->join('users','preguntas.user_id','=','users.id')
        ->join('respuestas','preguntas.id_pregunta','=','respuestas.pregunta_id')
        ->select('users.name','preguntas.cuerpo','preguntas.id_pregunta','respuestas.pregunta_id','respuestas.respuesta')
        ->where('preguntas.producto_id','=',[[$id]])
        ->get();


        return view('usuarios.client.preguntas',compact('producto','pregunta'));
    }

    public function respuestas(Producto $id){

        $producto = Producto::where($id);
        //$this->authorize('product',$id);
        $revisar = DB::table('preguntas')
                    ->join('productos','productos.id','=','preguntas.producto_id')
                     ->where('preguntas.producto_id','=',$id)
                    
                    ->get();
        return view('usuarios.client.responder', compact('revisar'));
    }

    public function adquirir($id){

        $producto = Producto::find($id);
        return view('usuarios.client.adquirir_compra', compact('producto'));
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request, $id)
    {
       
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
            'password.min' => 'El m??nimo permitido son 8 caracteres',
            'password.max' => 'El m??ximo permitido son 18 caracteres',
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
                return redirect('/home')->with('status', 'Password cambiado con ??xito');
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
