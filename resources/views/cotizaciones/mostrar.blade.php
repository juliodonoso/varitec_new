@extends('layouts.backend.index')

@section('content')

 @push('js')
<script type="text/javascript">
$(document).ready(function(){

$("#btn-anular").click(function(){
  alert('hola')
  swal({
    text: "Se anulara la solicitud de suministros",
    buttons: {
      cancel: true,
      confirm: "Confirm",
      roll: {
        text: "Do a barrell roll!",
        value: "roll",
      },
    },
  })
})
})
</script>
@endpush
<div class="content">
<diV class="container-fluid" >
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header" data-background-color="blue">
                        <h2 class="title">Cotizacion</h2>
                        <p class="category"> Número <h4>1<h4></p>
                </div>
                <div class="card-content">
                    <div class="row">
                            <div class="panel panel-info">
                                    <div class="panel-heading">
                                      <h3 class="panel-title">Panel Title</h3>
                                    </div>
                                    <div class="panel-body">
                                      <div class="col-md-12">
                                        <div class=" form-group col-md-6">
                                          <label>
                                          Número 
                                          </label>
                                          <p class="form-control-static">1234</p>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label>
                                              Solicitante
                                          </label>
                                          <p class="form-control-static"> texto 1</p>
                                        </div>
                                        
                                      </div>
                                      
                                      <div class="col-md-12">
                                          <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                  <th>#</th>
                                                  <th>Suministro</th>
                                                  <th>cantidad</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td>impresora</td>
                                                  <td>3</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td>computador</td>
                                                  <td>4</td>
                                                </tr>
                                               
                                              </tbody>
                                            </table>
                                      </div>
                                   
                                      <div class="col-md-12">
                                        <div class="col-md-3">
                                              <input type="button" id="btn-anular" class="btn btn-warning" value="Anular">
                                        </div>
                                        <div class="col-md-3">
                                              <input type="button" id="btn-cancelar" class="btn btn-error" value="Cancelar">
                                        </div>
                                        <div class="col-md-3">
                                              <input type="button" id="btn-aceptar" class="btn btn-success" value="Aceptar">
                                          </div>
                                      </div>
                                    </div>

                                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

    </div>
</diV>
</div>
@endsection