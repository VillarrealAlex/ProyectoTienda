@extends('layouts.second_main')

@section('responder')
    
<h2 style="margin-left: 150pt; color:red">Preguntas sobre este producto</h2>

<div class="row" style="margin-left: 150pt">
    <div class="col-lg-4 col-sm-6 mb-4; float-left">
        <!-- Portfolio item 1-->
        @foreach ($pro as $item)
        <div >
            <a class="portfolio-link" data-bs-toggle="modal" href="#">
                <div class="portfolio-hover">
                    <div class="portfolio-hover-content"><i ></i></div>
                </div>
                <img class="img-fluid" src="{{asset('storage'.'/'.$item->imagen)}}" alt="..." style="height: 200pt"/>
            </a>
            <div class="portfolio-caption" style="margin-left:35pt">
                <div class="portfolio-caption-heading">
                    <strong style="font-size: 18pt"><h4 style="color: green">{{$item->nombre}}</h4></strong>
                </div>
                <div class="portfolio-caption-heading">
                    <strong style="font-size: 14pt"><h5 style="color: red">${{$item->precio}}/MXN</h5></strong>
                </div>
                <div class="portfolio-caption-heading">
                    <strong style="font-size: 16pt">{{$item->descripcion}}</strong>
                </div>
            </div> 
             @endforeach
        </div>
        <div class="portfolio-caption-heading">
            <a href="#"><button class="btn btn-success">Comprar</button></a>
            <a href="#"><button class="btn btn-warning">Agregar al Carrito</button></a>
        </div>
        @if (Session::has('pregunta_realizada'))
        <p style="color: red">{{session('pregunta_realizada')}}</p>
        @endif
    </div>
</div>

<div  style="margin-top: 15pt">
    <h4 ><strong> Preguntar al vendedor... </strong></h4>
   
</div>


    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Preguntas sobre este producto...</h6>
        
        @foreach ($revisar as $item)

        <div class="d-flex text-muted pt-3">
          <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
              <strong class="text-gray-dark">{{$item->cuerpo}}</strong>
            </div>
            <span class="d-block"></span>
          </div>
        </div>
        <div class="d-flex justify-content-between ">
            <form action="/responder/pregunta/{{$item->id_pregunta}}" method="POST" class="form-inline">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group mx-sm-3 md-2">
                    <label  for="respuesta" style="color: blue"><strong>Responder Esta Pregunta: </strong></label>
                    <input type="text" class="form-control md-2" id="pregunta" 
                           placeholder=" Escribir Respuesta..." name="respuesta" required>
                </div>
               <div class="form-group mx-sm-3 mb-2">
                 <button type="submit" class="btn btn-primary">Responder</button>
               </div>
            </form>
        </div>
       
        @endforeach
    </div>

@endsection