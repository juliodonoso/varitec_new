@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createcat", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateCat').attr('action',ruta);
      });

      $(document).on("click", ".blockcat", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockCat').attr('action',ruta);
      });

      $(document).on("click", ".deletecat", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteCat').attr('action', ruta);
      });

      $(document).on("click", ".editecat", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var descripcion = $(this).data('descripcion');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $(".modal-body #descripcion").val(descripcion);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditCat').attr('action', ruta);
      });

</script>
@endpush

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Categorias</h4>
                    <p class="category">Lista de Categorias</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="{{url('Categorias/')}}" class="btn btn-primary btn-sm createcat" data-toggle="modal" data-target="#createcat" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($qryCat as $cat)
                                    <tr>
                                      <td>{{$cat->id}}</td> 
                                      <td>{{$cat->ctnombre}}</td>
                                      <td>{{$cat->ctdescripcion}}</td>
                                      <td>
                                            <span class="
                                             @if     ($cat->ctestado == 1) label label-success
                                             @elseif ($cat->ctestado == 0) label label-danger
                                             @endif ">
                                            </span> 
                                      </td>

                                      <td>
                                         <a href="" data-id="{{$cat->id}}" data-nom="{{$cat->ctnombre}}" data-ruta="{{url('Categorias/block/'.$cat->id)}}" class="btn btn-danger btn-xs blockcat" data-toggle="modal" data-target="#blockcat" title="Block">  
                                            <i class="fa fa-lock"></i>
                                         </a> 

                                       <a href="" data-ruta="{{url('Categorias/'.$cat->id)}}" data-id="{{$cat->id}}" data-name="{{$cat->ctnombre}}" data-descripcion="{{$cat->ctdescripcion}}" data-toggle="modal" data-target="#editecat" class="btn btn-info btn-xs editecat" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="{{url('Categorias/'.$cat->id)}}" data-id="{{$cat->id}}" data-name="{{$cat->ctnombre}}" data-toggle="modal" data-target="#deletecat"  class="btn btn-xs btn-danger deletecat" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                    @endforeach
                                </tbody>   
                        </table> 
                       <div class="text-center">
                        {!!$qryCat->render()!!}
                       </div>                         
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    @include('categorias.partial.modaldelete')
    @include('categorias.partial.modaladd')
    @include('categorias.partial.modalblock')
    @include('categorias.partial.modaledit')
  </div>


@endsection