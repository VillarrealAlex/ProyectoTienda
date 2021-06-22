<?php

namespace App\Policies;

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

        if ($id == 1) {
            return true;
        }else if($id == "") {
            return false;

        }
    }
}
