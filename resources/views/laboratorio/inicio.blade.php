@extends('layouts.backend.index')

@section('content')

 @push('js')
<script src="{{ URL::asset('js/jquery.Rut.js') }}" type="text/javascript"></script>

<script type="text/javascript">


function _asignar(id){
 var csrf = $('input[name="_token"]').attr('value');
  var data={
    csrf
  }

   swal({
      title: "Asignar",
      text: "Desea enviar a laboratorio?",
      icon: "warning",
      buttons: [
        'No',
        'Si'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
            url: "{{asset('Laboratorio/traspaso')}}/"+id,
            type: 'GET',
            data,
            dataType: 'json',
            success: function( data ) {
              swal({
                  title: 'Recepcion asignada a Laboratorio!',
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
  {{ csrf_field() }}
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Laboratorio</h4>
                    <p class="category">Traspaso recepción a laboratorio</p>
                </div>
                <div class="card-content">
                    <div class="col-md-12 ">
                         <a href="{{ asset('/Laboratorio/listarLaboratorio') }}"  class="btn btn-primary btn-sm"  title="Laboratorio">   <i class=" fa fa-sign-in"></i>
                              Laboratorio
                          </a>
                          <a href="{{ asset('/Laboratorio/laboratorioListar/1') }}"  class="btn btn-info btn-sm"  title="Gestion">   <i class="fa fa-briefcase"></i>
                              Aceptadas
                          </a>

                          <a href="{{ asset('/Laboratorio/laboratorioListar/2') }}"  class="btn btn-secondary btn-sm"  title="Pendientes">   <i class="fa fa-pencil-square"></i>
                              Pendientes
                          </a>
                           <a href="{{ asset('/Laboratorio/laboratorioListar/3') }}"  class="btn btn-success btn-sm"  title="Cerradas">   <i class="fa fa-list-alt"></i>
                              Cerradas
                          </a>



                    </div>
                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Número Recepción</th>
                                    <th>Cliente</th>
                                    <th>Codigo</th>
                                    <th>Equipo</th>
                                    <th>Tipo de trabajo</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($recepcion as $reg)
                                    <tr>
                                      <td>{{ $reg->numeroRecepcion }}</td>
                                      <td>{{ $reg->clNombre }}</td>
                                      <td>{{ $reg->prBarcode }}</td>
                                      <td>{{ $reg->prNombre }}</td>
                                      <td>{{ $reg->tipoTrabajo }}</td>
                                      <td>
                                        <a href="javascript: _asignar({{ $reg->id }})"  class="btn btn-success btn-xs editereg" title="Traspaso">
                                          <i class="fa fa-exchange"></i>
                                       </a>

                                        <a href="{{ route('pdfview',['download'=>'pdf','id'=> $reg->id]) }}"  class="btn btn-xs editereg btn-info" title="Ver">
                                          <i class="fa fa-eye"></i>
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