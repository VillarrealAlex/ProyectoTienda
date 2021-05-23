@section('agregar')
<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">
        <img src="{{asset('images/cat.png')}}" width="40" height="30" class="d-inline-block align-top" alt="">
      </a>
  </nav>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-span m-3">
                            <h4 >Agregar Nuevo Usuario</h4>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="register-form" action="#" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Nombre" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="appellido_pat">Apellido Paterno</label>
                                    <input type="text" name="appellido_pat" id="appellido_pat" tabindex="1" class="form-control" placeholder="Apellido Paterno" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="appellido_mat">Apellido Materno</label>
                                    <input type="text" name="appellido_mat" id="appellido_mat" tabindex="1" class="form-control" placeholder="Apellido Materno" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo Electronico" value="" required>
                                </div>
                                <!--div class="form-group">
                                    <select name="rol" class="form-select" aria-label="Default select example" tabindex="1">
                                        <option selected>Rol</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="Supervisor">Cliente</option>
                                      </select>
                                </div-->
                                <div class="form-group">
                                    <label for="password"> Contraseña</label>
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña" required>
                                </div>
                                <div class="form-group">
                                    <label for="password2"> Confirmar Contraeñas</label>
                                    <input type="password" name="password2" id="password2" tabindex="2" class="form-control" placeholder="Confirmar Contraseña" required>
                                </div>
                                <!--div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div-->
                                <div class="form-group">
                                    <label for="imagen">Agregar imagen</label>
                                    <input type="file" name="imagen" id="imagen" tabindex="1" class="form-control"  value="" >
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button><input type="submit"  tabindex="4"  value="Registrar Ahora"></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection