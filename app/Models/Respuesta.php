<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $table ='respuestas';

    //relacion con user
    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    //relacion con preguntas
    public function pregunta(){
        return $this->belongsTo('App\Models\Pregunta');
    }

    
}
