@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createcli", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateCli').attr('action',ruta);
      });

      $(document).on("click", ".blockcli", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockCli').attr('action',ruta);
      });      

      $(document).on("click", ".deletecli", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeletecli').attr('action', ruta);
      });

      $(document).on("click", ".editcli", function () {
        var ruta = $(this).data('ruta');
        var rut = $(this).data('rut');
        var name = $(this).data('name');
        var dir = $(this).data('dir'); 
        var com = $(this).data('com');
        var ciu = $(this).data('ciu'); 
        var tlf = $(this).data('tlf'); 
        var mai = $(this).data('mai'); 
        var id = $(this).data('id');
        $(".modal-body #rut").val(rut);
        $(".modal-body #name").val(name);
        $(".modal-body #dir").val(dir);
        $(".modal-body #com").val(com);
        $(".modal-body #ciu").val(ciu);
        $(".modal-body #tlf").val(tlf);
        $(".modal-body #mai").val(mai);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditCli').attr('action', ruta);
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
                    <h4 class="title">Clientes</h4>
                    <p class="category">Lista de Clientes</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="{{url('Clientes/')}}" class="btn btn-primary btn-sm createcli" data-toggle="modal" data-target="#createcli" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Comuna</th>
                                    <th>Ciudad</th>
                                    <th>Tlf</th>
                                    <th>Mail</th>    
                                    <th>Estado</th>                                
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($qryCli as $cli)
                                    <tr>
                                      <td>{{$cli->clRut}}</td> 
                                      <td>{{$cli->clNombre}}</td> 
                                      <td>{{$cli->clDireccion}}</td> 
                                      <td>{{$cli->clComuna}}</td>
                                      <td>{{$cli->clCiudad}}</td> 
                                      <td>{{$cli->clTelefono}}</td>                                          
                                      <td>{{$cli->clEmail}}</td> 
                                      <td>
                                            <span class="
                                             @if     ($cli->clEstado == 1) label label-success
                                             @elseif ($cli->clEstado == 0) label label-danger
                                             @endif ">
                                            </span> 
                                      </td>

                                      <td>

                                       <a href="" data-id="{{$cli->id}}" data-nom="{{$cli->clNombre}}" data-ruta="{{url('Clientes/block/'.$cli->id)}}" class="btn btn-danger btn-xs blockcli" data-toggle="modal" data-target="#blockcli" title="Block">  
                                          <i class="fa fa-lock"></i>
                                       </a> 

                                       <a href="" data-ruta="{{url('Clientes/'.$cli->id)}}" data-id="{{$cli->id}}" data-rut="{{$cli->clRut}}" data-name="{{$cli->clNombre}}" data-dir="{{$cli->clDireccion}}" data-com="{{$cli->clComuna}}" data-ciu="{{$cli->clCiudad}}" data-tlf="{{$cli->clTelefono}}" data-mai="{{$cli->clEmail}}"  data-toggle="modal" data-target="#editcli" class="btn btn-info btn-xs editcli" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="{{url('Clientes/'.$cli->id)}}" data-id="{{$cli->id}}" data-name="{{$cli->clNombre}}" data-toggle="modal" data-target="#deletecli"  class="btn btn-xs btn-danger deletecli" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                    @endforeach 
                                </tbody>   
                        </table>    
                       <div class="text-center">
                        {!!$qryCli->render()!!}
                       </div>                             
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    @include('clientes.partial.modaladd')
    @include('clientes.partial.modalblock')
    @include('clientes.partial.modaldelete')
    @include('clientes.partial.modaledit')

  </div>


@endsection