@extends('layouts.backend.index')

@section('content')



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
                                    <th>Numero laboratorio</th>
                                    <th>Cliente</th>
                                    <th>Codigo Equipo</th>
                                    <th>Descripción Equipo</th>
                                    <th>Trabajo</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($laboratorio as $lab)
                                    <tr>
                                      <td>{{ $lab->numeroLaboratorio }}</td>
                                      <td>{{ $lab->clNombre }}</td>
                                      <td>{{ $lab->prBarcode }}</td>
                                      <td>{{ $lab->prNombre }}</td>
                                      <td>{{ $lab->tipoTrabajo }}</td>
                                      <td>

                                       @if($lab->estadoLab != 2)
                                        <a href="{{ route('Laboratorio.gestion',['id'=>$lab->id ])}}"  class="btn btn-success btn-xs editereg" title="Gestion">
                                          <i class="fa fa-share-square-o"></i>
                                       </a>
                                       @endif
                                        <a href="{{ route('pdfLaboratorio',['download'=>'pdf','id'=> $lab->idRes]) }}" style="background-color:red"  class="btn btn-error btn-xs editereg" title="Anular">
                                          <i class="fa fa-file-pdf-o"></i>
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