@extends('layouts.main')

@section('content')
<style>
    .has-error{
        border-color:#f5a3a3;
    }
</style>
<div style="" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div  class="card-header"><h5 style="margin-left: 95pt">{{ __('Registrese') }}</h5></div>
                
                <div class="card-body">
                    <form id="register-form" action="{{route('nuevo')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Nombre" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="apat">Apellido Paterno</label>
                            <input type="text" name="apat" id="apat" tabindex="1" class="form-control" placeholder="Apellido Paterno" value="{{ old('apat') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="amat">Apellido Materno</label>
                            <input type="text" name="amat" id="amat" tabindex="1" class="form-control" placeholder="Apellido Materno" value="{{ old('amat') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electronico</label>
                            <input type="email" name="email" id="email" tabindex="1" class="form-control @error('email') is-invalid @enderror" placeholder="Correo Electronico" value="{{ old('email') }}" required>
                            <span id="error_email"></span> 
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
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
                            <input type="password" name="password" id="passwords" tabindex="2" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required>
                           <input type="checkbox" onclick="verPass()" style="color:rebeccapurple; margin-left:15pt">Ver Contraseña
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                             
                        </div><br>
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
                                    <button  type="submit" id="boton" tabindex="4"  value="Registrar Ahora" class="btn btn-primary">Registrar Ahora</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script type="text/javascript">
function verPass(){
            var x =document.getElementById("passwords");
            if(x.type== "password"){
            x.type="text";
            }else{
                x.type="password"
            }
        }
</script>

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
            $('#email').addClass('has-error');
            $('#boton').attr('disabled', 'disabled');
        }
        else{
            $.ajax({
                url:"/validarRegistro",
                method:"POST",
                data:{email:email, _token:_token},
                success:function(respuesta)
                {
                    if(respuesta == 'disponible')
                    {
                        $('#error_email').html('<label class="text-success">Dirección de correo disponible</label>');
                        $('#email').removeClass('has-error');
                        $('#boton').attr('disabled', false);
                    }
                    else
                    {
                        $('#error_email').html('<label class="text-danger">Direccion de correo no dispoible</label>');
                        $('#email').addClass('has-error');
                        $('#boton').attr('disabled', 'disabled');
                    }
                }
            })
        }
        
    }
    else{
        $('#error_email').html('<label class="text-danger">El correo es requerido</label>');
        $('#email').addClass('has-error');
        $('#boton').attr('disabled', 'disabled');
    }    
});

});
    </script>
@endsection

@endsection
