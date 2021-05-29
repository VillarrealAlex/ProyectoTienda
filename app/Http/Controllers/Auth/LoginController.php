<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        
        if (auth()->user()->rol =='Cliente') {
            return '/cliente';
        }
        if (auth()->user()->rol == 'Supervisor') {
            return '/supervisor';
        }
        if (auth()->user()->rol == 'Contador') {
            return '/contador';
        }
        if (auth()->user()->rol == 'Encargado') {
            return '/encargado';
        }
        if (auth()->user()->rol == 'Administrador') {
            return '/administrador';
        }

        return '/inicia_sesion';
    }

    /*public function index()
    {
        $credentials = $this->validate(request(),[

            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required|string|min:5'

        ]);

        if(auth()->user($credentials))
        {
            if(auth()->user()->rol=="Cliente")
            {
            return view('usuarios.client.clientes');
            }

            if(auth()->user()->rol=="Supervisor")
            {
            return view('usuarios.supervisor.supervisor');
            }

        }

            return back()->withErrors(['usuario' => 'El Usuario o Contraseña son Incorrectos'])->withInput(request(['usuario']));
    }*/

}
