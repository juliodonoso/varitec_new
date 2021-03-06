@extends('layouts.backend.index')

@section('content')

@push('js')
<script type="text/javascript">
  $( document ).ready(function() {

    sessionStorage.clear()
  $("#agregar").click(function(){ 

  let idSuministro =  sessionStorage.getItem("idSuministro");
  let cantidadSuministro =  sessionStorage.getItem("cantidadSuministro");



  if(idSuministro && cantidadSuministro){

    $.ajax({
      method: "GET",
      url: "../../Suministros/getCantidad/"+idSuministro
    })
      .done(function( msg ) {
        let totalUnidad = msg-cantidadSuministro
        if(totalUnidad < 0){
          $("#aceptarCotizacion").css('visibility', 'hidden');
          $("#borrador").css('visibility', 'hidden');
          swal('Suminitros insuficientes debe cotizar suministros')
        }else{
          var html = $(".clone").html();
          $(".increment").after(html);
        }
      })
    sessionStorage.clear()
  }else{
    swal('Debe ingresar suminitros antes de agregar')
  }

  });


  $("body").on("click",".btn-danger",function(){ 
  $(this).parents(".control-group").remove();
    });

  $('#aceptarCotizacion').click(function(){
    $.ajax({
      method: "GET",
      url: "../{{$laboratorio[0]->idLab}}/aceptar"
    })
      .done(function( msg ) {
    swal({
      text: "Orden de Laboratorio a quedado Aceptada, se enviara correo electronico"
    }).then(()=>{
      location.href="../laboratorioListar/2";
    });
  })
})


  $("#borrador").click(function(){ 
    $.ajax({
      method: "GET",
      url: "../{{$laboratorio[0]->idLab}}/edit"
    })
      .done(function( msg ) {
        swal({
          text: "Orden de Laboratorio a quedado en borrador",
        }).then(()=>{
          location.href="../laboratorioListar/1";
        });
        
      });
  })
  

  //consultar la cantidad de suministros
$( document ).on( "change", "input[name*='inputcantidad']", function() {
    sessionStorage.setItem("cantidadSuministro", $(this).val());
    console.log($(this).val())
});

$( document ).change( "select[name*='inputname']", function() {
  $(this).find('option:selected').val()
  sessionStorage.setItem("idSuministro", $(this).find('option:selected').val());
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
                          <label for="numeroLaboratorio" >
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
                            Rut
                          </label>
                          <input type="rut" class = 'form-control' name="rut-contacto" disabled="disabled" value="{{ $laboratorio[0]->clRut }}"> 
                        </div>
                       </div>
                    
                        
                        <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="nombre" >
                            Nombre Cliente
                          </label>
                          <input type="text" class = 'form-control' name="nombre" disabled="disabled" value="{{ $laboratorio[0]->clNombre }}"> 
                        </div>
                       </div>

                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label  for="telefono" >
                            Telefono
                          </label>
                          <input type="text" class = 'form-control' name="telefono" disabled="disabled" value="{{ $laboratorio[0]->clTelefono }}"> 
                        </div>
                       </div>


                       <div class="col-md-4"> 
                        <div class="form-group">
                          <label for="mail-contacto">
                            Mail contacto
                          </label>
                          <input type="mail" class = 'form-control' name="mail-contacto" disabled="disabled" value="{{ $laboratorio[0]->clEmail }}"> 
                        </div>
                       </div>
                        
                        <br>
                        <br>
                          <div class="col-md-12"> 
                                @foreach($imagen as $img)
                                  <div class="col-md-3">
                                    <div class="thumbnail">
                                      <a href="{{ asset("storage/$img->folder/$img->name") }}" target="_blank">
                                        <img src="{{ asset("storage/$img->folder/$img->name") }}" alt="Lights" style="width:100%">
                                        <div class="caption">
                                          <p>{{ $img->name }}</p>
                                        </div>
                                      </a>
                                    </div>
                                  </div>
                                  @endforeach
                          </div>

                          <div class="col-md-12">
                             <br>
                              <br>
                          </div>

                     </div>
                               
            </div>
        </div>
    </div>

    <div class="row">
        {{ Form::open(array('action' => 'RecepcionController@store','enctype'=>"multipart/form-data")) }}
        {{ Form::hidden('clienteNuevo',null,['id' => 'clienteNuevo']) }}
        {{ Form::hidden('idProducto',null,['id' => 'idProducto']) }}
       
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Cotización de Materiales</h4>
                    <p class="category"><b>Equipo en trabajo</b></p>
                </div>
                
                  
                    <div class="card-body">

                      

                       <div class="col-md-12"> 
                        <div class="form-group">
                          <label for="equipo">
                            Descripcion Visual Laboratorio
                          </label>
                         
                         {{ Form::textarea('descripcionVisual', $laboratorio[0]->descripcionVisual , ['class' => 'form-control', 'rows' => 2, 'cols' => 4 , 'disabled'=>'disabled']) }} 
                        </div>
                       </div>
                        

                      <div class="col-md-12"> 
                        <div class="form-group">
                          <label for="nombre" >
                            <h3>Evaluación del trabajo</h3>
                          </label>
                          {{ Form::textarea('descripcion', '', ['class' => 'form-control', 'rows' => 4, 'cols' => 8]) }} 
                        </div>
                       </div>

                      <div class="col-md-12">
                      <div class="input-group hdtuto control-group lst increment" >
                        <div class="col-md-10">
                          <select name="inputname[]" class="myfrm form-control" >
                              <option>Seleccione Suministro</option>
                                @foreach($suministros as $sum)
                                <option value="{{ $sum->id }}">{{ $sum->prNombre }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                        <div class="col-md-2"><input type="number" name="inputcantidad[]" class="myfrm form-control" ></div>
                          <div class="input-group-btn"> 
                  
                          <button class="btn btn-success" id="agregar" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Agregar</button>
                  
                          </div>
                        </div>

                        <div class="clone hide">                  
                        <div class="hdtuto control-group lst input-group" style="margin-top:10px ">
                  
                           <div class="col-md-10">
                            <select  name="inputname[]" class="myfrm form-control" >
                                <option>Seleccione Suministro</option>
                                @foreach($suministros as $sum)
                                <option value="{{ $sum->id }}">{{ $sum->prNombre }}</option>
                                @endforeach
                            </select>

                           </div>
                          <div class="col-md-2"><input type="number"  name="inputcantidad[]" class="myfrm form-control"
                            ></div>
                          <div class="input-group-btn"> 
                  
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remover</button>
                  
                          </div>
                  
                        </div>
                  
                      </div> 
                        <div class="col-md-12">
                          <span> <br><br><br><br></span>
                        </div>
                        
                      </div>
                     </div> 
                                                                     
            </div>

            <div class="row">
             <div class="col-md-12"> 
                        <div class="col-md-4">
                          {{ Form::button('Aceptar',['class' => 'btn btn-success', 'id' => 'aceptarCotizacion' ]) }}
                        </div>
                        <div class="col-md-4">
                          {{ Form::button('Borrador',['class' => 'btn btn-info','id'=>'borrador']) }}
                        </div>
                        <div class="col-md-4">
                          {{link_to_route('suministros.create', 'Cotizar Suministro', null, array('class' => 'btn btn-warning'))}}
                        </div>
                      </div>
                      </div> 
                     
        </div>
      {{ Form::close() }}

    </div>

  </div>
   <br>
                    
                      
</div>


@endsection