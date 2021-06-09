
<link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"> 
<!-- Custom styles for this template-->
<link href="{{ asset('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
<script>
    $(document).ready(function(){
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });
    });
    </script>
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
                                </div>

                                <!--div class="col-sm-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                        <i class="material-icons">&#xE147;</i> <span>Agregar Nueva Categoría</span>
                                    </a>					
                                </div-->
        
                           <div class="container" style="margin-top: 30pt">
                               <table id="prod" class="table table-striped ">
                                    <thead class="thead thead-dark">
                                        <tr>
                                            <th scope="col"  class="text-center">#</th>
                                            <th scope="col"  class="text-center">Imagen</th>
                                            <th scope="col"  class="text-center">Nombre</th>
                                            <th scope="col"  class="text-center">Descripción</th>
                                          
                                        
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
    $(document).ready(function() {
    $('#prod').DataTable();
} );
</script>