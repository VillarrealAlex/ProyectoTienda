
<link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

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
                                    <h2> <b>Categorias</b></h2>
                                </div>

        
                                <form class="d-flex" style="float: left">
                                    <input name="Bcategoria" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" value="{{$Bcat}}">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                  </form>
                           <div class="container" style="margin-top: 30pt">
                               <table class="table table-striped ">
                                    <thead class="thead thead-dark">
                                        <tr>
                                            <th scope="col"  class="text-center">ID de Categoria</th>
                                            <th scope="col"  class="text-center">Imagen</th>
                                            <th scope="col"  class="text-center">Nombre</th>
                                            <th scope="col"  class="text-center">Descripción</th>
                                          
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                         @forelse ($categorias as $categoria)
                            
                                            <tr>
                                                <td class="text-center">{{$categoria->id}}</td>
                                                <td class="text-center">
                                                    <img src="{{asset('storage'.'/'.$categoria->imagen)}}" alt="Avatar" width="110px" height="100px">
                                                </td>
                                                <td class="text-center" >{{$categoria->nombre}}</td>
                                                <td class="text-center" >{{$categoria->descripcion}}</td>
                                              
                                                
                                               @empty
                                                    <tr>
                                                        <td style="color: red">Sin Categorias Que mostrat</td>
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

<!-- Nueva Categoria Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('nueva.categoria.E')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Agregue Nueva Categoría </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" >					
					<div class="form-group">
						<label for="nombre">Nombre de la categoria</label>
						<input type="text" name="nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<textarea name="descripcion" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label >Imagen</label>
						<input type="file" class="form-control" name="imagen" >
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Agregar">
				</div>
			</form>
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

<!-- Page level custom scripts -->
<script src="{{ asset('/admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('/admin/js/demo/chart-pie-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
