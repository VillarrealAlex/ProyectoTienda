
<link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <!-- data tables-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"> 
<!-- Custom styles for this template-->
<link href="{{ asset('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

<div id="wrapper" >
    @include('layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

       <div id="content">
            @include('layouts.header')

            <div class="container-fluid">
                
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2><b></b>Productos</h2>
                                    @if (Session::has('producto_revisado'))
                                        <p style="color: red">{{session('producto_revisado')}}</p>
                                    @endif

                                    @if (Session::has('producto_eliminado'))
                                    <p style="color: red">{{session('producto_eliminado')}}</p>
                                @endif
                                </div>
        
                           <div class="container" style="margin-top: 30pt">
                               <table id="prod" class="table table-striped ">
                                    <thead id="prod" class="thead thead-dark">
                                        <tr>
                                            <th scope="col"  class="text-center">#</th>
                                            <th scope="col"  class="text-center">Imagen</th>
                                            <th scope="col"  class="text-center">Nombre</th>
                                             <th scope="col"  class="text-center">Descripción</th>
                                            <th scope="col"  class="text-center">Precio</th>
                                        
                                            <th scope="col"  class="text-center">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                         @forelse ($productos as $producto)
                            
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td class="text-center">
                                                    <img src="{{asset('storage'.'/'.$producto->imagen)}}" alt="Avatar" width="110px" height="100px">
                                                </td>
                                                <td class="text-center" >{{$producto->nombre}}</td>
                                                <td class="text-center" >{{$producto->descripcion}}</td>
                                                <td class="text-center" >${{$producto->precio}} /MXN</td>
                                                <td class="text-center">
                                                
                                                   <button data-target="#revisarProd{{$producto->id}}" class="btn btn-warning" data-toggle="modal">Revisar</button>
                                                    <!-- Revisar Producto Modal HTML -->
                                                    <div id="revisarProd{{$producto->id}}" class="modal fade">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="actualizar/prod/{{$producto->id}}" method="POST" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                   @method('PUT')
                                                                    <div class="modal-header">						
                                                                        <h4 class="modal-title" style="color: rebeccapurple"><strong>Producto </strong></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">					
                                                                        <div class="form-group">
                                                                            <label for="nombre" style="color: black"><strong>Nombre del Producto </strong></label>
                                                                            <input name="nombre" type="text" class="form-control" value="{{$producto->nombre}}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="descripcion" style="color: black" ><strong> Descripcion </strong></label>
                                                                            <input name="descripcion" class="form-control" value="{{$producto->descripcion}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="consecionado" style="color: black" ><strong> Consecionar Producto </strong></label>
                                                                            <select  name="consecionado" id="consecionado">
                                                                                <option selected >--</option>
                                                                                <option value="1">Aceptar Producto</option>
                                                                                <option value="">Rechazar Producto</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="motivo" style="color: black" >Escriba un motivo si el producto es rechazado</label>
                                                                            <input name="motivo" class="form-control" value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="imagen" style="color: black"><strong> Imagen </strong></label>
                                                                            <div class="form-group">
                                                                                <img src="{{asset('storage'.'/'.$producto->imagen)}}" alt="Imagen" height="150px" width="30%">
                                                                            </div>
                                                                            
                                                                            <input type="file" class="form-control" name="imagen" >
                                                                        </div>			
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                                        <input type="submit" class="btn btn-info" value="Aceptar">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                   <form style="margin-top: 10px; margin-left:16px" action="/eliminar/{{$producto->id}}" method="POST" onsubmit="return confirm('Desea eliminar este elemento?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"> Eliminar </button>
                                                    </form>                                                
                                                </td>
                                               @empty
                                                    <tr>
                                                        <td style="color: red">Sin Productos Que mostrar</td>
                                                    </tr>
                                            </tr>
                                        @endforelse
                                    </tbody>
                               </table>
                           </div>
                    </div>
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
            <a class="btn btn-primary" href=" {{url('/logout')}}">Aceptar</a>
        </div>
    </div>
</div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('/admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('/admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('/admin/js/demo/chart-pie-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
<script>
    $('#prod').DataTable({
    responsive:true,
            "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No hay resultados  :(",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros encontrados",
            "infoFiltered": "(filtrado de  _MAX_ registros totales)",
            "search": "Buscar",
            "paginate":{
              "next": "Siguiente",
              "previous": "Anterior",
            }
        }
  });
</script>