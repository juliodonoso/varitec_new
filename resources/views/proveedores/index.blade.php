@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createpro", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeatePro').attr('action',ruta);
      });

      $(document).on("click", ".blockpro", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockPro').attr('action',ruta);
      });            

      $(document).on("click", ".deletepro", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeletePro').attr('action', ruta);
      });

      $(document).on("click", ".editpro", function () {
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
        $('.modal-body #formEditPro').attr('action', ruta);
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
                    <h4 class="title">Proveedores</h4>
                    <p class="category">Lista de Proveedores</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="{{url('Proveedores/')}}" class="btn btn-primary btn-sm createpro" data-toggle="modal" data-target="#createpro" title="Add">   <i class="fa fa-plus"></i>
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
                                  @foreach($qryPro as $pro) 
                                    <tr>
                                      <td>{{$pro->pvrut}}</td> 
                                      <td>{{$pro->pvnombre}}</td> 
                                      <td>{{$pro->pvdireccion}}</td> 
                                      <td>{{$pro->pvcomuna}}</td>
                                      <td>{{$pro->pvciudad}}</td>  
                                      <td>{{$pro->pvtelefono}}</td>
                                      <td>{{$pro->pvemail}}</td>
                                      <td>
                                            <span class="
                                             @if     ($pro->pvestado == 1) label label-success
                                             @elseif ($pro->pvestado == 0) label label-danger
                                             @endif ">
                                            </span> 
                                      </td>
                                      <td>

                                       <a href="" data-id="{{$pro->id}}" data-nom="{{$pro->pvnombre}}" data-ruta="{{url('Proveedores/block/'.$pro->id)}}" class="btn btn-danger btn-xs blockpro" data-toggle="modal" data-target="#blockpro" title="Block">  
                                          <i class="fa fa-lock"></i>
                                       </a> 

                                       <a href="" data-ruta="{{url('Proveedores/'.$pro->id)}}" data-id="{{$pro->id}}" data-rut="{{$pro->pvrut}}" data-name="{{$pro->pvnombre}}" data-dir="{{$pro->pvdireccion}}" data-com="{{$pro->pvcomuna}}" data-ciu="{{$pro->pvciudad}}" data-tlf="{{$pro->pvtelefono}}" data-mai="{{$pro->pvemail}}"  data-toggle="modal" data-target="#editpro" class="btn btn-info btn-xs editpro" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="{{url('Proveedores/'.$pro->id)}}" data-id="{{$pro->id}}" data-name="{{$pro->pvnombre}}" data-toggle="modal" data-target="#deletepro"  class="btn btn-xs btn-danger deletepro" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                  @endforeach
                                </tbody>   
                        </table>
                       <div class="text-center">
                        {!!$qryPro->render()!!}
                       </div>                           
                    </div>                    
                </div>
            </div>
        </div>
    </div>
     @include('proveedores.partial.modaladd')
     @include('proveedores.partial.modalblock')
     @include('proveedores.partial.modaldelete')
     @include('proveedores.partial.modaledit')

  </div>


@endsection