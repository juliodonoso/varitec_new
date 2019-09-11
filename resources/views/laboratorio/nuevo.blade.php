@extends('layouts.backend.index')

@section('content')

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Recepción</h4>
                    <p class="category">Ingreso Recepción Equipo</p>
                </div>

                <div class="card-content">
                    <div class="content">

                      {{ Form::open(array('url' => 'foo/bar')) }}

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="numeroRecepcion" >Numero  Recepcion</label>
                            <label>   </label>
                          </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="fechaRecepcion">Fecha Recepción</label>
                              <input type="date" class="form-control" id="fechaRecepcion" name="fechaRecepcion">
                            </div>
                        </div>

                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="cliente">Cliente</label>
                              <input type="input" class="form-control" id="cliente" name="cliente">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="rut">Rut</label>
                              <input type="input" class="form-control" id="rut" name="rut">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="direccion">Dirección</label>
                              <input type="input" class="form-control" id="direccion" name="direccion">
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                              <input type="input" class="form-control" id="ciudad" name="ciudad">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="contacto">Contacto</label>
                              <input type="input" class="form-control" id="contacto" name="contacto">
                          </div>
                        </div>

                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="mailContacto">Email</label>
                              <input type="input" class="form-control" id="mailContacto" name="mailContacto">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="equipo">Equipo</label>
                              <input type="input" class="form-control" id="equipo" name="equipo">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="modelo">Modelo</label>
                              <input type="input" class="form-control" id="modelo" name="modelo">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="serie">Número de Serie</label>
                              <input type="input" class="form-control" id="serie" name="serie">
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tipoTrabajo">Tipo Trabajo</label>
                            <select class="form-control" id="tipoTrabajo" name="tipoTrabajo">
                              <option value="0" >Seleccione Trabajo</option>
                              <option value="1" >Post Venta</option>
                              <option value="2" >Reparación</option>
                              <option value="3" >Mantención</option>
                            </select>
                          </div>
                        </div>
                    <hr>

                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="descripcionVisual">Descripción Visual</label>
                            <textarea class="form-control" rows="5" id="descripcionVisual" name="descripcionVisual"></textarea>
                          </div>
                        </div>

                          <br>
                        <div class="col-md-12">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>


                     {{ Form::close() }}

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  </div>


@endsection