@extends('layouts.main')

@section('content')
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
                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo Electronico" value="{{ old('email') }}" required>
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
                                    <button  type="submit"  tabindex="4"  value="Registrar Ahora" class="btn btn-primary">Registrar Ahora</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
