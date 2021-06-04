<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    //relacion uno a muchos con users

    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    //relacion con users
    public function categoria(){

        return $this->belongsTo('App\Models\Categoria');
    }
}
