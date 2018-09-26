@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createreg", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateReg').attr('action',ruta);
      });

      $(document).on("click", ".deletereg", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteReg').attr('action', ruta);
      });

      $(document).on("click", ".editereg", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var num = $(this).data('num');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $(".modal-body #num").val(num);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditReg').attr('action', ruta);
      });

</script>
@endpush

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Regiones</h4>
                    <p class="category">Lista de Regiones</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="" class="btn btn-primary btn-sm createreg" data-toggle="modal" data-target="#createreg" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Num Ordinal</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($qryReg as $reg)
                                    <tr>
                                      <td>{{$reg->id}}</td> 
                                      <td>{{$reg->rgnombre}}</td>  
                                      <td>{{$reg->rgordinal}}</td>  
                                      <td>

                                       <a href="" data-ruta="{{url('Regiones/'.$reg->id)}}" data-id="{{$reg->id}}" data-name="{{$reg->rgnombre}}" data-num="{{$reg->rgordinal}}" data-toggle="modal" data-target="#editereg" class="btn btn-info btn-xs editereg" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="{{url('Regiones/'.$reg->id)}}" data-id="{{$reg->id}}" data-name="{{$reg->rgnombre}}" data-toggle="modal" data-target="#deletereg"  class="btn btn-xs btn-danger deletereg" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                   @endforeach
                                </tbody>   
                        </table> 
                       <div class="text-center">
                        {!!$qryReg->render()!!}
                       </div>                          
                    </div>                    
                </div>
            </div>
        </div>
    </div>

 @include('regiones.partial.modaldelete')   
 @include('regiones.partial.modaladd')
 @include('regiones.partial.modaledit')
  </div>


@endsection