<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/">

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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
<body>
    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
          <a class="py-2" href="{{url('/')}}" aria-label="Product">
           <img src="{{asset('/images/cat.png')}}" alt="" width="37px" height="37px"><strong>Magnus Store</strong>
          </a>
          
          <a style="margin-left: 300pt" class="py-2 d-none d-md-inline-block" href="{{url('/inicia-sesion')}}">Iniciar sesion</a>
          <a class="py-2 d-none d-md-inline-block" href="{{url('/registrar/usuario')}}">Registrarse</a>
        </nav>
      </header>
      
      <main>
        <!-- formulario inicio de sesion-->
        @yield('content')
      
        <!-- formulario registrar usurio-->
        @yield('agregar')

        <!-- formulario reset pasword-->
        
        <!-- ver productos-->
        @yield('productos')
        
        </body>

        <footer >
            
            <div class="col-10 col-md">
              
                <small class="d-block mb-3 text-muted">&copy; Frameworks Laravel 2021</small>
              </div>
            
        </footer>

   <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>