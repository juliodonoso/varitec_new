@extends('layouts.backend.index')

@section('content')

 

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
                                    <th>Producto</th>
                                    <th>Fecha Recepción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td> 
                                        <a href="" data-ruta="" data-id="" data-name="" data-num="" data-toggle="modal" data-target="#editereg" class="btn btn-info btn-xs editereg" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="" data-id="" data-name="" data-toggle="modal" data-target="#deletereg"  class="btn btn-xs btn-danger deletereg" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a></td>
                                    </tr>
                                </tbody>
                      </table>
                                            
                    </div>                    
                </div>
            </div>
        </div>
    </div>


  </div>


@endsection