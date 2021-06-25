<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    //relacion con user
    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    //relacion con productos
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }


    public function respuestas(){
        return $this->hasMany('App\Models\Respuesta');
    }

    public function scopePregunta($query){
        
    return $query->where('cuerpo', true);
    }

}
