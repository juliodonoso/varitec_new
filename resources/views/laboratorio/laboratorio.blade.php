@extends('layouts.backend.index')

@section('content')


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Laboratorio</h4>
                    <p class="category">{{$titulo}}</p>

                </div>
                <div class="card-content">


                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Número laboratorio</th>
                                    <th>Número recepción</th>
                                    <th>Cliente</th>
                                    <th>Código</th>
                                    <th>Equipo</th>
                                    <th>Trabajo</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($laboratorio as $lab)
                                    <tr>
                                      <td>{{ $lab->numeroLaboratorio }} </td>
                                      <td>{{ $lab->numeroRecepcion }}</td>
                                      <td>{{ $lab->clNombre }}</td>
                                      <td>{{ $lab->prBarcode }}</td>
                                      <td>{{ $lab->prNombre }}</td>
                                      <td>{{ $lab->tipoTrabajo }}</td>
                                      <td>

                                       @if($lab->estadoLab == 0)
                                        <a href="{{ route('Laboratorio.gestion',['id'=>$lab->id ])}}"  class="btn btn-success btn-xs editereg" title="Gestionar">
                                          <i class="fa fa-share-square-o"></i>
                                       </a>

                                        <a href="{{ route('pdfRecepcion',['download'=>'pdf','id'=> $lab->id]) }}" style="background-color:red"  class="btn btn-error btn-xs editereg" title="PDF">
                                          <i class="fa fa-file-pdf-o"></i>
                                       </a>
                                       @elseif($lab->estadoLab == 1)
                                        <a href="{{ route('Laboratorio.work',['id'=>$lab->id ])}}"  class="btn btn-success btn-xs editereg" title="Trabajar">
                                          <i class="fa fa-briefcase"></i>
                                       </a>

                                        <a href="{{ route('pdfLaboratorio',['download'=>'pdf','id'=> $lab->id]) }}" style="background-color:red"  class="btn btn-error btn-xs editereg" title="PDF">
                                          <i class="fa fa-file-pdf-o"></i>
                                       </a>

                                       @elseif($lab->estadoLab == 2)
                                        <a href="{{ route('Laboratorio.borrador',['id'=>$lab->id ])}}"  class="btn btn-success btn-xs editereg" title="Retomar">
                                          <i class="fa fa-pencil-square"></i>
                                       </a>

                                        <a href="{{ route('pdfPendientes',['download'=>'pdf','id'=> $lab->id]) }}" style="background-color:red"  class="btn btn-error btn-xs editereg" title="PDF">
                                          <i class="fa fa-file-pdf-o"></i>
                                       </a>
                                       @elseif($lab->estadoLab == 3)
                                        <a href="{{ route('pdfTerminadas',['download'=>'pdf','id'=> $lab->id]) }}" style="background-color:red"  class="btn btn-error btn-xs editereg" title="PDF">
                                          <i class="fa fa-file-pdf-o"></i>
                                       </a>
                                       @endif


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