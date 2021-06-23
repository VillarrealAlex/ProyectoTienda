
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
                                    <h3>Administrar <b> Productos  </b><b style="color:red"></b></h3>
                                </div>
                                @if (Session::has('producto_agregado'))
                                    <p style="color: red">{{session('producto_agregado')}}</p>
                                @endif
                                @if (Session::has('producto_eliminado'))
                                    <p style="color: red">{{session('producto_eliminado')}}</p>
                                 @endif
                                 @if (Session::has('producto_editado'))
                                 <p style="color: red">{{session('producto_editado')}}</p>
                              @endif
                                <div class="col-sm-4" >
                                    <a href="#addProduct" class="btn btn-success" data-toggle="modal">
                                        <i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Producto</span>
                                    </a>					
                                </div>
                           <div class="container" style="margin-top: 30pt">
                               <table class="table table-striped ">
                                    <thead class="thead thead-dark">
                                        <tr>
                                            <th scope="col"  class="text-center">#</th>
                                            <th scope="col"  class="text-center">Imagen</th>
                                            <th scope="col"  class="text-center">Nombre de Producto</th>
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
                                                <td class="text-center" >${{$producto->precio}}/MXN</td>
                                              
                                                <td class="text-center">
                                                    <button data-target="#editProducto{{$producto->id}}" class="btn btn-success" data-toggle="modal">Editar</button>
                                                    <!-- Editar Categoria Modal HTML -->
                                                        <div id="editProducto{{$producto->id}}" class="modal fade">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="editar/producto/{{$producto->id}}" method="POST" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        @method('PUT')
                                                                        <div class="modal-header">						
                                                                            <h4 class="modal-title" style="color: rebeccapurple"><strong>Editar Producto </strong></h4>
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
                                                                                <label for="motivo" style="color: black" ><strong> Motivo </strong></label>
                                                                                <input name="motivo" class="form-control" value="{{$producto->motivo}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="precio" style="color: black" ><strong> Precio </strong></label>
                                                                                <input name="precio" class="form-control" value="{{$producto->precio}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="imagen" style="color: black"><strong> Imagen </strong></label>
                                                                                <div class="form-group">
                                                                                    <img src="{{asset('storage'.'/'.$producto->imagen)}}" alt="ProductoImagen" height="150px" width="30%">
                                                                                </div>
                                                                                
                                                                                <input type="file" class="form-control" name="imagen" >
                                                                            </div>			
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                                            <input type="submit" class="btn btn-info" value="Guardar Cambios">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <a href="#"><button  class="btn btn-warning"> Revisar</button></a>
                                                    <!--a href="#"><button  class="btn btn-primary"> Agregar Productos</button></a-->
                                                    
                                                    <form style="margin-top: 10px; margin-left:16px" action="/eliminar/producto/{{$producto->id}}" method="POST" onsubmit="return confirm('Desea eliminar este elemento?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"> Eliminar </button>
                                                    </form>                                                
                                                </td>
                                               @empty
                                                    <tr>
                                                        <td style="color: red">Sin Productos Que Mostrar</td>
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

<!-- Nuevo producto Modal HTML -->
<div id="addProduct" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('nuevo.producto')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Agregue un Producto </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" >					
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<textarea name="descripcion" class="form-control" required></textarea>
					</div>
                    <div class="form-group">
						<label for="precio">Precio</label>
						<input type="text" name="precio" class="form-control" required>
					</div>
                    <!--div class="form-group">
						<label for="motivo">Motivo</label>
						<input type="text" name="motivo" class="form-control" required>
					</div-->
                    <div class="form-group">
						<label for="categoria_id">ID de Categoria</label>
						<input type="text" name="categoria_id" class="form-control" required>
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
