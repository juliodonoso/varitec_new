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
                    <p class="category">Equipos en trabajos</p>
                </div>
                <div class="card-content">
               

                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Numero laboratorio</th>
                                    <th>Cliente</th>
                                    <th>Codigo</th>
                                    <th>Equipo</th>
                                    <th>Tipo de trabajo</th>
                                    <th>Gestion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($laboratorio as $lab)
                                    <tr>
                                      <td>{{ $lab->numeroRecepcion }}</td>
                                      <td>{{ $lab->clNombre }}</td>
                                      <td>{{ $lab->prBarcode }}</td>
                                      <td>{{ $lab->prNombre }}</td>
                                      <td>{{ $lab->tipoTrabajo }}</td>
                                      <td> 
                                        <a href=""  class="btn btn-info btn-xs editereg" title="Ver">
                                          <i class="fa fa-check-square-o"></i>
                                       </a>

                                        <a href=""  class="btn btn-info btn-xs editereg" title="Ver">
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