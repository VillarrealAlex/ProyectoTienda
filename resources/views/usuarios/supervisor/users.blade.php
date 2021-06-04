<link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<div id="wrapper">
    @include('layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

       <div id="content">
            @include('layouts.header')

            <div class="container-fluid">
                
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Administrar <b>Usuarios</b></h2>
                                </div>
                                
                                <div class="col-sm-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Usuario</span></a>					
                                    @if (Session::has('message'))
                                        <div class="text-danger">
                                        <h6>{{Session::get('message')}}</h6>
                                        </div>
                                    @endif
                                   
                                   
                                    <div class="text-danger"><h6>{{$errors->first('mypassword')}}</h6></div>
                                    <div class="text-danger"><h6>{{$errors->first('password')}}</h6></div>
                                    <div class="text-danger"><h6>{{$errors->first('status')}}</h6></div>
                                
                                </div>

                           <div class="container" style="margin-top: 30pt">
                               <table class="table table-striped">
                                    <thead class="thead dark-gray">
                                        <tr>
                                            <th scope="col"  class="text-center">#</th>
                                            <th scope="col"  class="text-center">Foto</th>
                                            <th scope="col"  class="text-center">Nombre</th>
                                            <th scope="col"  class="text-center">Apellido Paterno</th>
                                            <th scope="col"  class="text-center">Apellido Materno</th>
                                            <th scope="col"  class="text-center">Email</th>
                                            <th scope="col"  class="text-center">Rol</th>
                                            <th scope="col"  class="text-center">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($users as $item)
                
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td class="text-center">
                                                    <img src="{{asset('storage').'/'.$item->imagen}}" alt="Avatar" width="110px" height="100px">
                                                </td>
                                                <td class="text-center" >{{$item->name}}</td>
                                                <td class="text-center" >{{$item->apat}}</td>
                                                <td class="text-center" >{{$item->amat}}</td>
                                                <td class="text-center" >{{$item->email}}</td>
                                                <td class="text-center" >{{$item->rol}}</td>
                                                <td class="text-center">
                                                    <a href="editar/usuario/{{$item->id}}"><button  class="btn btn-success">Editar</button></a>
                                                    <a href="detalles/usuario/{{$item->id}}"><button  class="btn btn-warning"> Mostrar</button></a>
                                                <form style="margin-top: 10px; margin-left:16px" action="eliminar/usuario/{{$item->id}}" method="POST" onsubmit="return confirm('Desea eliminar este elemento?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"> Eliminar </button>
                                                    
                                                </form>
                                                </td>
                                                @empty 
                                                    <tr>
                                                        <td>Sin usuarios que mostrar</td>
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
             <a class="btn btn-primary" href="{{url('/logout')}}">Aceptar</a>
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

<!-- Page level custom scripts -->
<script src="{{ asset('/admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('/admin/js/demo/chart-pie-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>