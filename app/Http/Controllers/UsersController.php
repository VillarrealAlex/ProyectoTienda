<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Arr;

class UsersController extends Controller
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
       
        //$users =request()->all();
        $users = request()->except('_token');
       // $users =request()->except('_token','password2');
        $users['password'] = Hash::make($users['password']);
        
        if($request->hasFile('imagen')){

            $users['imagen'] = $request->file('imagen')->store('uploads','public');

           
        }  
        User::insert($users);

        return redirect('/');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
