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
    var html = `<div class="input-group hdtuto control-group lst increment" >

                           <div class="col-md-10">
                            <select  name="inputname[]" class="myfrm form-control" >
                                <option  selected="true" disabled="disabled">Seleccione Suministro</option>
                                @foreach($suministros as $sum)
                                <option value="{{ $sum->id }}">{{ $sum->prNombre }}</option>
                                @endforeach
                            </select>
                           </div>
                          <div class="col-md-2"><input type="number" value="0" name="inputcantidad[]" class="myfrm form-control">
                          </div>
                          <div class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remover</button>
                          </div>
                  </div>`;
      $.ajax({
        method: "GET",
        url: "../../Suministros/getCantidad/"+idSuministro
      })
      .done(function( msg ) {
        let totalUnidad = msg-cantidadSuministro
        if(totalUnidad < 0){
          $("#aceptarCotizacion").hide();
          $("#borrador").show();
          $("#agregar").removeProp("disabled");
          $(".increment").last().after(html)
          //swal('Suminitros insuficientes debe cotizar suministros');
        }else{
          //$("#aceptarCotizacion").show();
          //$("#borrador").hide();
          $(".increment").last().after(html);
        }
      })
      sessionStorage.clear()
  }else{
    swal('Debe ingresar suminitros antes de agregar')
    $(this).value('')
  }
  });


  $("body").on("click",".btn-danger",function(){
    $(this).parents(".control-group").remove();
    $("#aceptarCotizacion").prop("disabled", false);
    $("#borrador").prop("disabled", false);
    $("#agregar").prop("disabled", false);
  });

  $('#aceptarCotizacion').click(function(){
    swal({
      title: "Esta seguro de aceptar gestion?",
      text: "de aceptar esta quedara cerrada!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
          $('#formAceptar').submit();
        } else {
          return false;
        }
      });
    })


  $("#borrador").click(function(){
    let token = $('input[name="_token"]').attr('value');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    let inputcantidad = [];
    let inputname = [];

    $('input[name="inputcantidad[]"]').each(function() {
        let aux = $(this).val().replace(/^0+/, '');
        if(aux != ""){
          inputcantidad.push(aux);
        }
    });

    $('select[name="inputname[]"]').each(function() {
        let aux = $(this).val();
        if(aux){
          inputname.push(aux);
        }
    });


   $.ajax({
              url: '{{asset('Rebaja/create')}}',
              method: 'POST',
              data: {'idLab':{{$laboratorio[0]->idLab}},inputname,inputcantidad },
              success: function( data ){
                  //$('#response pre').html( data );
                  alert('paso');
              },
              error: function( jqXhr, textStatus, erSrorThrown ){
                  //console.log( errorThrown );
              }
      })
      $.ajax({
        method: "GET",
        url: "../{{$laboratorio[0]->idLab}}/edit"
      })
        .done(function( msg ) {
          swal({
            text: "Orden de Laboratorio a quedado en borrador",
          }).then(()=>{
            location.href="../laboratorioListar/2";
          });
        });
  })

  //consultar la cantidad de suministros
$( document ).on( "change", "input[name*='inputcantidad']", function() {
   let token = $('input[name="_token"]').attr('value');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }

    });
    sessionStorage.setItem("cantidadSuministro", $(this).val());
  if(sessionStorage.getItem("idSuministro")){
      idSuministro=sessionStorage.getItem("idSuministro");
      cantidadSuministro= $(this).val();
         $.ajax({
            method: "GET",
            url: "../../Suministros/getCantidad/"+idSuministro
          })
            .done(function( msg ) {
              let totalUnidad = msg-cantidadSuministro
              if(totalUnidad < 0){
                $("#aceptarCotizacion").hide();
                $("#borrador").show();
                $("#agregar").prop("disabled", false);
                $("input[name*='inputcantidad']").last().addClass('text-danger');
                var largoinput=$("input[name*='inputcantidad']").length;

                //$("#agregar").prop("disabled", true);
                swal('Suminitros insuficientes, debe solicitar compra');
              }else{
                $("#aceptarCotizacion").show();
                $("#borrador").hide();
                //$("#agregar").prop("disabled", false);
              }
            })
    }else{
      //$("#agregar").prop("disabled", true);
      //$("#aceptarCotizacion").prop("disabled", true);
      //$("#borrador").prop("disabled", true);
       swal('Debe ingresar suminitros antes de agregar')
       $(this).val('')
       sessionStorage.removeItem("idSuministro")
    }
    sessionStorage.removeItem("idSuministro")

});

$( document ).change( "select[name*='inputname']", function() {
  $(this).find('option:selected').val()
  sessionStorage.setItem("idSuministro", $(this).find('option:selected').val());
});

$(".quitarRebajaBtn").click(function(){
  alert(this.id)
})

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
        {{ Form::open(array('route' => array('Laboratorio.aceptar',$laboratorio[0]->idLab),'enctype'=>"multipart/form-data",'id'=>'formAceptar')) }}
        {{ Form::hidden('idProducto',null,['id' => 'idProducto']) }}
        {{ csrf_field() }}
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

                      <table class="table table-bordered table-striped text-center">
                        <thead>
                          <tr class="text-dark">
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($rebajas as $r)
                          <tr>
                            <th scope="row">{{ $r->prNombre }}</th>
                            <td
                            @if($r->cantidad < $r->prUnidad)
                            class="text-warning"
                            @endif
                            >{{ $r->cantidad }}</td>
                            <td>{{ $r->prUnidad }}</td>
                            <td>
                              <input type="hidden" class="quitarRebajaValue{{$r->id}}"  value="{{$r->id}}">
                              <button class="btn btn-danger quitarRebajaBtn"  id="{{$r->id}}" type="button" >Quitar</button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>




            <div class="row">
             <div class="col-md-12">
                        <div class="col-md-4">
                          {{ Form::button('Aceptar',['class' => 'btn btn-success', 'id' => 'aceptarCotizacion' ]) }}
                          {{ Form::button('Borrador',['class' => 'btn btn-info','id'=>'borrador','style'=>'display:none']) }}
                        </div>
                        <div class="col-md-4">
                          {{link_to_route('suministros.create', 'Solicitud Suministro', null, array('class' => 'btn btn-warning'))}}
                        </div>
                      </div>
                      </div>

        </div>
      {{ Form::close() }}

    </div>

  </div>
   <br>

</div>

<style>
  table th {
   text-align: center;
   font-weight: bolder !impotant;
}

.table {
   margin: auto;
}
.table>thead>tr>th {
    border-bottom-width: 1px;
    font-size: 1.25em;
    font-weight: bolder !important;
    background-color: #f1f1f1;
}
</style>


@endsection