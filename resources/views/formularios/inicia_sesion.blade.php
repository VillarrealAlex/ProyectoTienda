@extends('layouts.main')

 <!-- Bootstrap core CSS -->
 <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

 <!-- Custom styles for this template -->
 <link href="signin.css" rel="stylesheet">
@section('iniciasesion')

    
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
    .form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
  </style>

   <div class="content-center">
            
    <main class="form-signin">
        <form action="#" method="POST">
            @csrf
        <img style="margin-left: 80pt" class="mb-4" src="{{asset('/images/cat.png')}}" alt="" width="72px" height="70px">
        <h1 style="margin-left: 60px" class="h3 mb-3 fw-normal">Inicie sesión</h1>
    
        <div >
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>
        <div >
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
        </div>
    
        <!--div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div-->
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
        </form>
    </main>
   </div>
@endsection