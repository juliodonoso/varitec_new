@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createprov", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateProv').attr('action',ruta);
      });

      $(document).on("click", ".deleteprov", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteProv').attr('action', ruta);
      });

      $(document).on("click", ".editeprov", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var num = $(this).data('num');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $(".modal-body #num").val(num);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditProv').attr('action', ruta);
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
                    <h4 class="title">Provincias</h4>
                    <p class="category">Lista de Provincias</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="" class="btn btn-primary btn-sm createprov" data-toggle="modal" data-target="#createprov" title="Add"> <i class="fa fa-plus"></i>
                              Registrar
                         </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Num-Region</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($qryProv as $prov)
                                    <tr>
                                      <td>{{$prov->id}}</td> 
                                      <td>{{$prov->ponombre}}</td>
                                      <td>{{$prov->poregion}}</td>
                                      <td>
                                       <a href="" data-ruta="{{url('Provincias/'.$prov->id)}}" data-id="{{$prov->id}}" data-name="{{$prov->ponombre}}" data-num="{{$prov->poregion}}" data-toggle="modal" data-target="#editeprov" class="btn btn-info btn-xs editeprov" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="{{url('Provincias/'.$prov->id)}}" data-id="{{$prov->id}}" data-name="{{$prov->ponombre}}" data-toggle="modal" data-target="#deleteprov"  class="btn btn-xs btn-danger deleteprov" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                  @endforeach
                                </tbody>   
                        </table>   
                       <div class="text-center">
                        {!!$qryProv->render()!!}
                       </div>                              
                    </div>                    
                </div>
            </div>
        </div>
    </div>

     @include('provincias.partial.modaladd')
     @include('provincias.partial.modaldelete')
     @include('provincias.partial.modaledit')
  </div>


@endsection