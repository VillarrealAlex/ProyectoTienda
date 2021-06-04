<link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<body id="page-top">
@if (Session::has('message'))
    <div class="text-danger">
    {{Session::get('message')}}
    </div>
@endif
    <div id="wrapper">
          @include('layouts.sidebar')

          <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('layouts.header')

                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data" action="/actualizar/{{$user->id}}">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre (s)" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Correo Electronico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{$user->email}}" >
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="apat">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apat"  name="apat" value="{{$user->apat}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amat">Apellido Materno</label>
                                <input type="tex" class="form-control" id="amat" name="amat" value="{{$user->amat}}" >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Rol</label>
                            <select name="rol" class="form-control" id="exampleFormControlSelect1">
                              <option>{{$user->rol}}</option>
                              <option>Cliente</option>
                              <option>Administrador</option>
                              <option>Encargado</option>
                              <option>Supervisor</option>
                              <option>Contador</option>
                            </select>
                          </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Imagen:</label>
                            <br>
                             <img src="{{asset('storage'.'/'.$user->imagen)}}" width="200">
                            <br>
                            <input id="imagen" name="imagen" type="file" class="form-control" value="{{$user->imagen}}">    
                          </div>
                    
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </form>

                    <h4 style="margin-left: 200pt"><strong> Cambiar Contraseña</strong></h4>
                    <form style="margin-left: 100pt" method="POST"  action="/cambiar/password/{{$user->id}}">
                        {{ csrf_field() }}
                        @method('PUT')
                        
                        <div class="form-row">
                       {{--}} <div class="form-group col-md-6">
                            <label for="mypassword"><h5> Contraseña Actual </h5></label>
                            <input type="password" class="form-control"  placeholder="Contraseña Actual" name="mypassword" required value="">
                            <div class="text-danger">{{$errors->first('mypassword')}}</div>
                          </div>--}}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password"><h5> Nueva Contraseña</h5></label>
                                <input type="password" class="form-control" name="password" placeholder="Contraseña Nueva" required value="">
                                <div class="text-danger">{{$errors->first('password')}}</div>
                              </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for="password"><h5> Confirmar Contraseña Nueva </h5></label>
                              <input type="password" class="form-control" name="password_confirmation" placeholder="Contraseña Nueva" required value="">
                          </div>
                      </div>    
                          </div>
                        <button style="margin-left: 200pt" type="submit" class="btn btn-primary">Confirmar</button>
                  </form>
                </div>
            </div>
         </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Desea Cerrar Sesión?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Clic en "Aceptar" para cerrar sesion.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{url('/logout')}}">Aceptar</a>
            </div>
        </div>
    </div>
    </div>

</body>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/admin/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('/admin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('/admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('/admin/js/demo/chart-pie-demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>