@extends('layouts.main')

@section('productos')

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">Magnus Store
        <img src="{{asset('/images/cat.png')}}" alt="" width="37px" height="37px">
      </a>
    
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/inicia-sesion')}}">Iniciar Sesion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/registrar/usuario')}}" >Registrarse</a>
          </li>
        </ul>
        <form class="d-flex">
          <input name="Bprod" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" value="{{$Bprod}}">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
<main >

    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark" style="background-image: url(/images/fondo_seis.jpg)">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">Puedes encontrar muchos productos diferentes</h1>
          <p class="lead my-3">Magnus Store siempre tiene los mejores productos para ti, cuidando la economia y seguridad de sus clientes.</p>
          <p class="lead mb-0 text-white fw-bold">Magnus Store Pendiente de Ti...</p>
        </div>
      </div>

</main>

   <h2 style="margin-left:200pt;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Productos en la categoria <strong>{{$prod->nombre}}</strong></h2>
    <div style="margin-left: 200pt" class="col-md-6"> 
        
        @forelse ($productos as $producto)
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary"></strong>
                <h3 class="mb-0 text-success">{{$producto->nombre}}</h3>
                <div class="mb-1 text-muted">${{$producto->precio}}/MXN</div>
                <p class="card-text mb-auto">{{$producto->descripcion}}</p>
               
                    <a href="/registrar/usuario" style="float: left"><button style="float: left" type="submit" class="btn btn-success">Comprar</button></a>
                    <a href="/registrar/usuario" style="float: left; margin-top:5pt"><button style="float: left" type="submit" class="btn btn-warning">Agregar al Carrito</button></a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{asset('storage'.'/'.$producto->imagen)}}" alt="Imagen Prod">
            </div>
        </div>
        @empty
            <h3 class="mb-0" style="color: red">Lo sentimos esta Categoria aun no cuenta con productos </h3> 
            <h4 style="font-famyli:bold; color:red"><strong> {{$Bprod}} :((</strong></h4>
            <div class="mb-1 text-muted"><h5 style="font-famyli:italic">Esperalos muy pronto</h5></div>
        @endforelse
    </div>
    
@endsection