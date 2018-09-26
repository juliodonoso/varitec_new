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
                    <p class="category">Lista equipos en laboratorio</p>
                </div>
                <div class="card-content">
                    
                    <div class="col-md-4 ">
                     <div class="form-group">
                            <label for="tipoTrabajo">Lista Estado Laboratiorio</label>
                            <select class="form-control" id="tipoTrabajo" name="tipoTrabajo">
                              <option value="0" >Seleccione Estado</option>
                              <option value="1" >Terminado</option>
                              <option value="2" >Laboratorio</option>
                              <option value="3" >Compras</option>
                            </select>
                          </div>
                    </div>
                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Nùmero Laboratorio</th>
                                    <th>Nùmero Recepciòn</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Fecha Recepción</th>
                                    <th>Tecnico Asignado</th>
                                    <th>Gestionar / Trabajar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                       <td></td>

                                      <td> 
                                        <a href="" data-ruta="" data-id="" data-name="" data-num="" data-toggle="modal" data-target="#editereg" class="btn btn-info btn-xs editereg" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        </td>
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