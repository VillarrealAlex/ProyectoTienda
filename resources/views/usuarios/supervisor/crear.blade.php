<link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<body id="page-top">
    <div id="wrapper">
          @include('layouts.sidebar')

          <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('layouts.header')

                <div class="container-fluid">
                    <form method="POST" enctype="multipart/form-data" action="/nuevo/usuario">
                        {{ csrf_field() }}
                        
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre (s)" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Correo Electronico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required >
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="apat">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apat"  name="apat" placeholder="Apellido Paterno" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amat">Apellido Materno</label>
                                <input type="tex" class="form-control" id="amat" name="amat" placeholder="Apellido Materno" required>
                            </div>
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Rol</label>
                            <select name="rol" class="form-control" id="exampleFormControlSelect1">
                              <option hidden>--</option>
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
                            
                            <br>
                            <input id="imagen" name="imagen" type="file" class="form-control" >    
                          </div>
                    
                        <button type="submit" class="btn btn-primary">Confirmar</button>
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