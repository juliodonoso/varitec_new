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
                    <p class="category">Lista equipos a trabajo</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href="{{ asset('/Laboratorio/listarLaboratorio') }}"  class="btn btn-primary btn-sm"  title="Add">   <i class="fa fa-plus-square"></i>
                              Equipos en Laboratorio
                          </a>
                    </div>

                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Numero Recepción</th>
                                    <th>Cliente</th>
                                    <th>Codigo</th>
                                    <th>Equipo</th>
                                    <th>tipo de trabajo</th>
                                    <th>Pasar a Laboratorio</th>
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