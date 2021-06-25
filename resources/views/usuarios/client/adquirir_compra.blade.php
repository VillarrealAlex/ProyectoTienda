@extends("layouts.second_main")

@section('adquirir_compra')


<form action="#"  method="post" enctype="multipart/form-data">
@csrf
<h4 class="mb-3" align="center">PAGO</h4>


        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Nombre </label>
            <input type="text" name="nombre" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Nombre completo el que recibira el producto</small>
            <div class="invalid-feedback">
              Nombre es requerido
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Direccion</label>
            <input type="text" name="direccion" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Direccion es requerido
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-number">Numero de telefono</label>
            <input type="text" name="telefono" class="form-control" id="cc-number" placeholder="" required>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Cantidad de producto es requerido.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <br>
            <label>El total a pagar es: </label><br>
            <b><tt>$ MX/N/tt></b> 
          </div>
        </div>
      <hr class="mb-4">
       
   
      <hr style="color: #0056b2;" />
      <h5 class="card-title">Subir tu comprobante de Pago: </h5><br>
      <td>

  <div class="mb-3">
    <label for="" class="form-label">Comprobante de pago: </label>
    <input id="codigo" name="imagen" type="file" class="form-control" tabindex="1" required>    
  </div>
  <a href="#" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button class="btn btn-primary btn-lg btn-block" type="submit">Pagar compra</button>
</div>
<br>
</form>

@endsection
