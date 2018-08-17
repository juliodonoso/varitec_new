@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createBod", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateBod').attr('action',ruta);
      });

      $(document).on("click", ".deletebod", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeletebod').attr('action', ruta);
      });

      $(document).on("click", ".editeBod", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditbod').attr('action', ruta);
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
                    <h4 class="title">Bodegas</h4>
                    <p class="category">Lista de Bodegas</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="{{url('Bodegas/')}}" class="btn btn-primary btn-sm createBod" data-toggle="modal" data-target="#createBod" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($qryBod as $bod)
                                    <tr>
                                      <td>{{$bod->id}}</td> 
                                      <td>{{$bod->bgNombre}}</td>  

                                      <td>
                                       <a href="" data-ruta="{{url('Bodegas/'.$bod->id)}}" data-id="{{$bod->id}}" data-name="{{$bod->bgNombre}}" data-toggle="modal" data-target="#editeBod" class="btn btn-info btn-xs editeBod" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="{{url('Bodegas/'.$bod->id)}}" data-id="{{$bod->id}}" data-name="{{$bod->bgNombre}}" data-toggle="modal" data-target="#deletebod"  class="btn btn-xs btn-danger deletebod" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                    @endforeach
                                </tbody>   
                        </table> 
                       <div class="text-center">
                        {!!$qryBod->render()!!}
                       </div>       
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    @include('bodegas.partial.modaldelete')
    @include('bodegas.partial.modaladd')
    @include('bodegas.partial.modaledit')


  </div>


@endsection