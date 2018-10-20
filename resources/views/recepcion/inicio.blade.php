@extends('layouts.backend.index')

@section('content')

@push('js')
<script src="{{ URL::asset('js/jquery.Rut.js') }}" type="text/javascript"></script>

<script type="text/javascript">
function _anular(id){
  var csrf = $('meta[name="csrf-token"]').attr('content');
   swal({
      title: "Anular Recepción",
      text: "Desea anular la recepción?",
      icon: "warning",
      buttons: [
        'No',
        'Si'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        console.log('confimacion')
        $.ajax({
            url: "{{asset('Recepcion/anular')}}/"+id,
            type: 'GET',
            data: { '_token': csrf},
            dataType: 'json',
            success: function( data ) {
              swal({
                  title: 'Recepción Anulada!',
                  icon: 'success',
                  timer: 1000
                }).then(function() {
                      location.reload();
                });
            }
        })

      } 
    })  
}


</script>
@endpush
<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Recepción</h4>
                    <p class="category">Lista de Recepcion de Equipos</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href="Recepcion/create"  class="btn btn-primary btn-sm"  title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Numero Recepción</th>
                                    <th>Cliente</th>
                                    <th>Rut</th>
                                    <th>Producto</th>
                                    <th>Fecha Recepción</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($recepcion as $reg)
                                    <tr>
                                      <td>{{ $reg->numeroRecepcion }}</td>
                                      <td>{{ $reg->clNombre }}</td>
                                      <td>{{ $reg->clRut }}</td>
                                      <td>{{ $reg->idProducto }}</td>
                                      <td>{{ $reg->fechaRecepcion }}</td>
                                      <td> 
                                        <a href="{{ route('pdfview',['download'=>'pdf','id'=> $reg->id]) }}"  class="btn btn-info btn-xs editereg" title="Ver">
                                          <i class="fa fa-eye"></i>
                                       </a>

                                        <a href="javascript:_anular({{ $reg->id }})"  class="btn btn-info btn-xs editereg" title="Anular">
                                          <i class="fa fa-ban"></i>
                                       </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                      </table>
                                            
                    </div>                    
                </div>
            </div>
        </div>
    </div>


  </div>


@endsection