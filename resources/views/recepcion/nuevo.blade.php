@extends('layouts.backend.index')

@section('content')

@push('js')
<script type="text/javascript">

  $('#regiones').change(function() {
    var selectedRegion = $('#regiones').val()
    $('#provincia').attr('placeholder','Seleccione Provincia')  
    $.get('../ajax/provinciasAjax/'+selectedRegion, function(data) {
        $.each(data, function(i, value) {
          console.log(i)  
          $('#provincia').append($('<option>').text(value).attr('value', i));
        });
    });
});


$('#provincia').change(function() {
  var selectedProvincia = $('#provincia').val()
  $('#comuna').attr('placeholder','Seleccione Comunas')  
  $.get('../ajax/comunasAjax/'+selectedProvincia, function(data) {
      $.each(data, function(i, value) {
        
          $('#comuna').append($('<option>').text(value).attr('value', value));
      });
      
  });
});

$(".btn-success").click(function(){ 
  var html = $(".clone").html();
  $(".increment").after(html);
});

$("body").on("click",".btn-danger",function(){ 
  $(this).parents(".control-group").remove();
});
  </script>
@endpush

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
     
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Recepción</h4>
                    <p class="category">Ingreso Recepción Equipo</p>
                </div>

                <div class="card-content">
                    <div class="content">

                      {{ Form::open(array('action' => 'RecepcionController@store','enctype'=>"multipart/form-data")) }}
                      {{csrf_field()}}
                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="numeroRecepcion" >Numero  Recepcion :</label>
                            <strong> <h6>{{ $folioRecepcion }}</h6>  </strong>
                            <input type="hidden" class="form-control" id="numeroRecepcion" name="numeroRecepcion" value="{{ $folioRecepcion }}" >
                          </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="fechaRecepcion">Fecha Recepción</label>
                              <input type="date" class="form-control" id="fechaRecepcion" name="fechaRecepcion" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                        </div>

                         <div class="col-md-6">  
                          <div class="form-group">
                            <label for="cliente">Cliente</label>
                              <input required type="input" class="form-control" id="cliente" name="cliente" required>
                          </div>
                        </div>
                        
                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="rut">Rut</label>
                              <input required type="input" class="form-control" id="rut" name="rut">
                          </div>
                        </div>

                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="direccion">Dirección</label>
                              <input type="input" class="form-control" id="direccion" name="direccion" required>
                          </div>
                        </div>


                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="region">Región</label>
                            {{Form::select('region', ($regiones) , null, ['class' => 'form-control', 
                            'id' => 'regiones',
                            'placeholder' => 'Seleccione Region','required'])}}
                          </div>
                        </div>
                        
                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="provincia">Provincia</label>
                            {{Form::select('provincia', [''=>''] , null, ['class' => 'form-control', 'id' => 'provincia','required'])}}
                          </div>
                        </div>

                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="provincia">Comuna</label>
                            {{Form::select('comuna', [''=>''] , null, ['class' => 'form-control', 'id' => 'comuna','required'])}}
                          </div>
                        </div>

                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="contacto">Nombre Contacto</label>
                            {{Form::text('contacto',null,['class' => 'form-control', 'id' => 'contacto','required']) }}
                          </div>
                        </div>

                         <div class="col-md-6">  
                          <div class="form-group">
                            <label for="mailContacto">Email Contacto</label>
                              {{Form::text('email',null,['class' => 'form-control', 'id' => 'email','required']) }}
                          </div>
                        </div>

                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="equipo">Descripción Equipo</label>
                            {{Form::text('equipo',null,['class' => 'form-control', 'id' => 'equipo','required']) }}
                          </div>
                        </div>

                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="modelo">Modelo Equipo</label>
                            {{Form::text('modelo',null,['class' => 'form-control', 'id' => 'modelo','required']) }}
                           
                          </div>
                        </div>

                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="serie">Numero de Serie</label>
                              <input type="input" class="form-control" id="serie" name="serie" required>
                          </div>
                        </div>


                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="tipoTrabajo">Tipo Trabajo a realizar</label>
                            <select class="form-control" id="tipoTrabajo" name="tipoTrabajo" required>
                              <option value="0" >Seleccione Trabajo</option>
                              <option value="1" >Reparación</option>
                              <option value="2" >Laboratorio</option>
                              <option value="3" >Post - Venta</option>
                            </select>
                          </div>
                        </div>
                     <hr> 
                     <hr> 

                      <div class="col-md-12">  
                          <div class="form-group">
                            <label for="descripcionVisual">Descripcion Visual</label>
                            <textarea class="form-control" rows="5" id="descripcionVisual" name="descripcionVisual" required></textarea>
                          </div>
                      </div>
                     



                      <div class="input-group hdtuto control-group lst increment" >
                  
                        <input type="file" name="filenames[]" class="myfrm form-control">
                  
                        <div class="input-group-btn"> 
                  
                          <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                  
                        </div>
                  
                      </div>
                  
                      <div class="clone hide">
                  
                        <div class="hdtuto control-group lst input-group" style="margin-top:10px ">
                  
                          <input type="file" name="filenames[]" style="opacity: 1;" class="myfrm form-control">
                  
                          <div class="input-group-btn"> 
                  
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                  
                          </div>
                  
                        </div>
                  
                      </div>  
                      <br> <br> <br>
                        <div class="col-md-12">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>


                     {{ Form::close() }}
                       
                    </div>                   
                    </div>                    
                </div>
            </div>
        </div>
    </div>


  </div>


@endsection