@extends('layouts.second_main')

@section('preguntas')
    <h2 style="margin-left: 150pt; color:red">Preguntar por este producto</h2>

    <div class="row" style="margin-left: 150pt">
        <div class="col-lg-4 col-sm-6 mb-4; float-left">
            <!-- Portfolio item 1-->
            <div >
                <a class="portfolio-link" data-bs-toggle="modal" href="#">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i ></i></div>
                    </div>
                    <img class="img-fluid" src="{{asset('storage'.'/'.$producto->imagen)}}" alt="..." style="height: 200pt"/>
                </a>
                <div class="portfolio-caption" style="margin-left:35pt">
                    <div class="portfolio-caption-heading">
                        <strong style="font-size: 18pt"><h4 style="color: green">{{$producto->nombre}}</h4></strong>
                    </div>
                    <div class="portfolio-caption-heading">
                        <strong style="font-size: 14pt"><h5 style="color: red">${{$producto->precio}}/MXN</h5></strong>
                    </div>
                    <div class="portfolio-caption-heading">
                        <strong style="font-size: 16pt">{{$producto->descripcion}}</strong>
                    </div>
                </div> 
                
            </div>
            <div class="portfolio-caption-heading">
                <a href="#"><button class="btn btn-success">Comprar</button></a>
                <a href="#"><button class="btn btn-warning">Agregar al Carrito</button></a>
            </div>
        </div>
    </div>

    <div  style="margin-top: 15pt">
        <h4 ><strong> Preguntar al vendedor... </strong></h4>
        <form action="#" method="POST" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group mx-sm-3 md-2">
                <input type="text" class="form-control " id="pregunta" 
                       placeholder="Escribe tu pregunta..." name="pregunta" required>
            </div>
           <div class="form-group mx-sm-3 mb-2">
            <button type="submit" class="btn btn-primary">Preguntar</button>
           </div>
          </form>
        </div>
@endsection