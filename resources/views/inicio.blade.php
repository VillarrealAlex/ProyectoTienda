<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>

    <!--link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/"-->

    

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('vendor/jquery_ui/jquery-ui.min.css')}}">
    <!-- Favicons -->
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/product/product.css" rel="stylesheet">
</head>
<body background="{{asset('images/fondos_web.jpg')}}">
   
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
              <input name="Bcategoria" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" value="{{$Bcategoria}}">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>

      <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
          <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Magnus Store</h1>
            <p class="lead fw-normal"  style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Encontrará todo tipo de articulos.
               Desde Celulares hasta muebles para el hogar.</p>
            <p class="lead fw-normal">Inicie sesión o cree una cuenta para empezar a adquirir sus productos</p>
            <!--a class="btn btn-outline-secondary" href="#">Coming soon</a-->
          </div>
          <div class="product-device shadow-sm d-none d-md-block"></div>
          <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
      </main>

        @foreach ($categorias as $categoria)
          <div style="width: 50%; heigth:50%; margin-left:200pt; border-radius:8%; margin-top:15pt;" class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-dark overflow-hidden">
            <div class="my-3 py-3">
             <strong> <h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif" class="">{{$categoria->nombre}}</h1></strong>
              <strong><p class="">{{$categoria->descripcion}}</p></strong>
            
            </div>
            <div class=" shadow-sm mx-auto" style="width: 100%; height: 100%; border-radius: 21px 21px 0 0;"> 
              <img width="80%" height="290px" src="{{asset('storage'.'/'.$categoria->imagen)}}" alt="ImagenCat">
            </div>
            <strong><a style="color: blue" href="/productos/{{$categoria->id}}/{{$categoria->nombre}}">Ver más Productos</a></strong>
          </div>
        
        @endforeach     
        
        <!-- Ver productos-->
        
   
      <footer >           
          <small class="d-block mb-3 text-muted">&copy; Frameworks Laravel 2021</small>
    </footer>
          <script 
                src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
          </script>
          <script src="{{asset('vendor/jquery_ui/jquery-ui.min.js')}}"></script>

          <script>
              var categoria = ['celulares','ropa','electronica'];
              
              $('#search').autocomplete({

                source: categoria
              })
          </script>
</body>
</html>