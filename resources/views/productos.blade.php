@extends('layouts.main')

@section('productos')
    
<main >

    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark" style="background-image: url(/images/fondo_seis.jpg)">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">Puedes encontrar muchos productos diferentes</h1>
          <p class="lead my-3">Magnus Store siempre tiene los mejores productos para ti, cuidando la economia y seguridad de sus clientes.</p>
          <p class="lead mb-0 text-white fw-bold">Magnus Store Pendiente de Ti...</p>
        </div>
      </div>

</main>

   <h2 style="margin-left:200pt;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Productos en la categoria</h2>
    <div style="margin-left: 200pt" class="col-md-6">
        @forelse ($productos as $producto)
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary"></strong>
                <h3 class="mb-0 text-success">{{$producto->nombre}}</h3>
                <div class="mb-1 text-muted">${{$producto->precio}}/MXN</div>
                <p class="card-text mb-auto">{{$producto->descripcion}}</p>
               
                    <a href="#" style="float: left"><button style="float: left" type="submit" class="btn btn-success">Comprar</button></a>
                    <a href="#" style="float: left; margin-top:5pt"><button style="float: left" type="submit" class="btn btn-warning">Otra accion</button></a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{asset('images/fundas.png')}}" alt="Imagen Prod">
            </div>
        </div>
        @empty
            <h3 class="mb-0">Esta Categoria no cuenta con productos</h3>
            <div class="mb-1 text-muted">Esperalos muy pronto</div>
        @endforelse
    </div>
@endsection