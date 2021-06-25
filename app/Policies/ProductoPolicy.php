<?php

namespace App\Policies;

use App\Models\Pregunta;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
    }*/

    public function product(User $user, Producto $id){

        if($user->id == $id->user_id){
            return true;
        }else {
            return false;
        }
    }

    public function question(User $user, Pregunta $id){
        if($user->id == $id->user_id){
            return true;
        }else{
            return false;
        }
    }
}
