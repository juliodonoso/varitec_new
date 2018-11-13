@extends('layouts.backend.index')

@section('content')

@push('js')
<script type="text/javascript">
  $( document ).ready(function() {

  $(".btn-success").click(function(){ 

    var html = $(".clone").html();
    $(".increment").after(html);
    });
  $("body").on("click",".btn-danger",function(){ 
  $(this).parents(".control-group").remove();
    });
  })
  </script>
@endpush

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Datos Laboratorio</h4>
                    <p class="category"><b>Gestion de laboratorio -- Datos Cliente</b></p>
                </div>
                
                  
                    <div class="card-body">
                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="nombre" >
                            Número Laboratorio 
                          </label>
                          <input type="text" class = 'form-control' name="numeroLaboratorio" disabled="disabled" value="{{ $laboratorio[0]->numeroLaboratorio }}"> 
                        </div>
                       </div>

                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label  for="contacto" >
                            Número Recepción
                          </label>
                          <input type="text" class = 'form-control' name="contacto" disabled="disabled" value="{{ $laboratorio[0]->numeroRecepcion }}"> 
                        </div>
                       </div>


                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="rut-contacto">
                            Cliente Rut
                          </label>
                          <input type="rut" class = 'form-control' name="rut-contacto" disabled="disabled" value="{{ $laboratorio[0]->clRut }}"> 
                        </div>
                       </div>
                    
                        
                        <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="nombre" >
                            Nombre Cliente
                          </label>
                          <input type="text" class = 'form-control' name="nombre" disabled="disabled" value="Empresa"> 
                        </div>
                       </div>

                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label  for="contacto" >
                            Contacto
                          </label>
                          <input type="text" class = 'form-control' name="contacto" disabled="disabled" value="julio donoso"> 
                        </div>
                       </div>


                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="mail-contacto">
                            Mail contacto
                          </label>
                          <input type="mail" class = 'form-control' name="mail-contacto" disabled="disabled" value="julio donoso"> 
                        </div>
                       </div>


                          <div class="col-md-12"> 
                                  <div class="col-md-4">
                                    <div class="thumbnail">
                                      <a href="/w3images/lights.jpg" target="_blank">
                                        <img src="/w3images/lights.jpg" alt="Lights" style="width:100%">
                                        <div class="caption">
                                          <p>imagen</p>
                                        </div>
                                      </a>
                                    </div>
                                  </div>
                                  <br>
                          </div>

                     </div>
                               
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Cotización de Materiales</h4>
                    <p class="category"><b>equipo en laboratorio</b></p>
                </div>
                
                  
                    <div class="card-body">

                        
                       <div class="col-md-12"> 
                        <div class="form-group">
                          <label for="nombre" >
                            Descripción del trabajo
                          </label>k
                          {{ Form::textarea('descripcion', '', ['class' => 'form-control', 'rows' => 2, 'cols' => 4]) }} 
                        </div>
                       </div>


                      <div class="col-md-12">
                      <div class="input-group hdtuto control-group lst increment" >
                        <div class="col-md-10"><input type="input" name="inputname[]" class="myfrm form-control"></div>
                        <div class="col-md-2"><input type="number" name="inputcantidad[]" class="myfrm form-control"></div>
                        
                  
                        <div class="input-group-btn"> 
                  
                          <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Agregar</button>
                  
                        </div>
                      </div>

                      <div class="clone hide">
                  
                        <div class="hdtuto control-group lst input-group" style="margin-top:10px ">
                  
                          
                           <div class="col-md-10"><input type="input" style="opacity: 1; name="inputname[]" class="myfrm form-control"></div>
                          <div class="col-md-2"><input type="number" name="inputcantidad[]" class="myfrm form-control"></div>
                          <div class="input-group-btn"> 
                  
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remover</button>
                  
                          </div>
                  
                        </div>
                  
                      </div> 

                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label  for="contacto" >
                            Contacto
                          </label>
                          <input type="text" class = 'form-control' name="contacto" disabled="disabled" value="julio donoso"> 
                        </div>
                       </div>


                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="mail-contacto">
                            Mail contacto
                          </label>
                          <input type="mail" class = 'form-control' name="mail-contacto" disabled="disabled" value="julio donoso"> 
                        </div>
                       </div>
                    
                        
                        <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="nombre" >
                            Cliente
                          </label>
                          <input type="text" class = 'form-control' name="nombre" disabled="disabled" value="Empresa"> 
                        </div>
                       </div>

                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label  for="contacto" >
                            Contacto
                          </label>
                          <input type="text" class = 'form-control' name="contacto" disabled="disabled" value="julio donoso"> 
                        </div>
                       </div>


                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="mail-contacto">
                            Mail contacto
                          </label>
                          <input type="mail" class = 'form-control' name="mail-contacto" disabled="disabled" value="julio donoso"> 
                        </div>
                       </div>

                     </div>                                                 
            </div>
        </div>
    </div>
  </div>
</div>


@endsection