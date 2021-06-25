@extends('layouts.main')
@section('agregar')

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
                           
                            <form id="register-form" action="{{route('nuevo')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Nombre" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="apat">Apellido Paterno</label>
                                    <input type="text" name="apat" id="apat" tabindex="1" class="form-control" placeholder="Apellido Paterno" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="amat">Apellido Materno</label>
                                    <input type="text" name="amat" id="amat" tabindex="1" class="form-control" placeholder="Apellido Materno" value="" required>

                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electronicoooo</label>
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo Electronico" value="" required>
                                    <span id="error_email"></span> 
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
                                <!--div class="form-group">
                                    <label for="password2"> Confirmar Contraeñas</label>
                                    <input type="password" name="password2" id="password2" tabindex="2" class="form-control" placeholder="Confirmar Contraseña" required>
                                </div-->
                                <!--div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div-->
                                <div class="form-group">
                                    <label for="imagen">Agregar imagen</label>
                                    <input type="file" name="imagen" id="imagen" tabindex="1" class="form-control"  value="" >
                                </div>
                                <div>
                                    <div class="row" style="margin-top: 15pt; margin-left:90pt">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button  type="submit"  tabindex="4" id="boton" value="Registrar Ahora" class="btn btn-primary">Registrar Ahora</button>
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

@section('conAjax')
    <script>
    $(document).ready(function(){

    $('#email').blur(function(){
    var error_email = '';
    var email = $('#email').val();
    var _token = $('input[name="_token"]').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if($.trim(email).length > 0)
    {
        if(!filter.test(email))
        {       
            $('#error_email').html('<label class="text-danger">Error de Correo</label>');
            /*$('#email').addClass('has-error');*/
            $('#boton').attr('disabled', 'disabled');
        }
        else{

        }
        
    }
    else{

    }    
});

});
    </script>
@endsection
@endsection