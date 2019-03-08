@extends('layouts.backend.index')

@section('content')

@push('js')
<script type="text/javascript">
  $( document ).ready(function() {

  $("#agregar").click(function(){ 

    var html = $(".clone").html();
    $(".increment").after(html);
    });


    
  })
  </script>
@endpush

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
     
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Suministros</h4>
                    <p class="category">Agregar nuevo suministro a bodega</p>
                </div>

                <div class="card-content">
                    <div class="content">

                      {{ Form::open(array('url' => './suministros'),['method'=>'POST']) }}
                     
                        <div class="row">
                          <div class="col-md-9">  
                            <div class="form-group">
                              <label for="prNombre" >Nombre</label>
                              {{Form::text('prNombre','',['class'=>'form-control','required'])}}
                            </div>

                          </div>

                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="cantidadInicial">Cantidad Inicial</label>
                                {{Form::text('cantidadInicial','',['class'=>'form-control','required'])}}
                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-3">
                              <label for="prBarcode">Codigo de barra</label>
                              {{Form::text('prBarcode','',['class'=>'form-control','required'])}}
                            </div>
                            <div class="col-md-3">
                                <label for="prValorizado">Suministro valorizado</label>
                                {{Form::number('prValorizado','',['class'=>'form-control','required'])}}
                            </div>
                            <div class="col-md-3">
                              <label> Cantidad Critica</label>
                              {{Form::number('prCritico','',['class'=>'form-control','required'])}}
                            </div>
                            <div class="col-md-3">
                              <label>Cod. Interno</label>
                              {{Form::number('prInterno','',['class'=>'form-control','required'])}}
                            </div>
                          </div>

                        </div>
                    
                      <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-6">
                              {{Form::submit('Agregar',['class'=>'btn btn-success'])}}
                            </div>
                            <div class="col-md-6">
                              {{Form::button('Volver',['class'=>'btn btn-danger','onclick'=>' window.history.back();'])}}
                            </div>
                          </div>
                      </div>

                      {{Form::close()}}
                    </div>
                                       
                </div>
            </div>
        </div>
    </div>


  </div>


@endsection