<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
   
    protected $fillable = [

        'email',
        'password',
        'idusers'
        
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacion uno a muchos

    public function productos(){

        return $this->hasMany('App\Models\Producto');
    }

    //relacion uno a muchos preguntas
    public function preguntas(){
        return $this->hasMany('App\Models\Pregunta');
    }

    //relacion una a muchos con ventas
    public function ventas(){
        return $this->hasMany('App\Models\Ventas');
    }
}
