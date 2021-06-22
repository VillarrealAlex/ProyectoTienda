@extends('layouts.second_main')

@section('clientes')
     <!-- Portfolio Grid-->

     <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Magnus Store</h2>
                <h3 class="section-subheading text-muted">Tenemos diferentes  productos para ti</h3>
            </div>

            @foreach ($productos as $item)
                
          
            <div class="row; ">
                <div class="col-lg-4 col-sm-6 mb-4; float-left">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="ver-productos/{{$item->id}}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i>Ver productos</div>
                            </div>
                            <img class="img-fluid" src="{{asset('storage'.'/'.$item->imagen)}}" alt="..." style="height: 200pt"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><strong style="font-size: 16pt">Categoira: {{$item->nombre}}</strong></div>
                            
                        </div>
                    </div>
                </div>
              
            </div>
            @endforeach
        </div>
    </section>

   
@endsection