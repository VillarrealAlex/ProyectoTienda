@extends('layouts.second_main')
@section('productos')


<div class="row">
    @foreach ($productos as $item)
                
    <div class="col-lg-4 col-sm-6 mb-4; float-left">
        <!-- Portfolio item 1-->
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
            <div class="portfolio-caption-heading">
                <a href="#"><button class="btn btn-success">Comprar</button></a>
                <a href="#"><button class="btn btn-warning">Agregar al Carrito</button></a>
                <a href="#"><button class="btn btn-se" style="color: red">Preguntar por este producto</button></a>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection