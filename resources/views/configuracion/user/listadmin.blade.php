@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createUser", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCreateuser').attr('action',ruta);
      });

      $(document).on("click", ".resetPass", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formResetuser').attr('action',ruta);
      });

      $(document).on("click", ".blockUser", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockuser').attr('action',ruta);
      });

      $(document).on("click", ".deleteUser", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteUser').attr('action', ruta);
      });

      $(document).on("click", ".editeUser", function () {
        var ruta = $(this).data('ruta');
        var rut = $(this).data('rut');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var phone = $(this).data('phone');
        var id = $(this).data('id');
        $(".modal-body #rut").val(rut);
        $(".modal-body #name").val(name);
        $(".modal-body #email").val(email);
        $(".modal-body #phone").val(phone);
        $('.modal-body #id').val(id);
        $('.modal-body #formEdituser').attr('action', ruta);
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
                    <h4 class="title">Manejador Administradores</h4>
                    <p class="category">Lista de Administradores</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="{{url('config/admins/add/')}}" class="btn btn-primary btn-sm createUser" data-toggle="modal" data-target="#createUser" title="Add">   <i class="fa fa-plus"></i>
                              Agregar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Fecha Creación</th>
                                    <th>Estado</th>
                                    <th>Opción</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach($QryUserAdm as $UsrAdm)
                                        <tr>
                                          <td>{{$UsrAdm->rut}}</td> 
                                          <td>{{$UsrAdm->name}}</td>  
                                          <td>{{$UsrAdm->email}}</td>
                                          <td>{{$UsrAdm->phone}}</td>  
                                         {{-- <td>{{Carbon\Carbon::createFromFormat('Y-m-d' , $UsrAdm->created_at)->format('d-m-Y') }}</td>  --}}
                                          <td>{{$UsrAdm->created_at}}</td>  
                                          <td>
                                            <span class="
                                             @if     ($UsrAdm->active == 1) label label-success
                                             @elseif ($UsrAdm->active == 0) label label-danger
                                             @endif ">
                                            </span> 
                                          </td>  
                                          <td>
                                              
                                         <a href="" data-id="{{$UsrAdm->id}}" data-nom="{{$UsrAdm->name}}" data-ruta="{{url('config/users/reset/'.$UsrAdm->id)}}" class="btn btn-warning btn-xs resetPass" data-toggle="modal" data-target="#resetPass" title="Reset">  
                                            <i class="fa fa-key"></i>
                                          </a> 

                                         <a href="" data-id="{{$UsrAdm->id}}" data-nom="{{$UsrAdm->name}}" data-ruta="{{url('config/users/block/'.$UsrAdm->id)}}" class="btn btn-danger btn-xs blockUser" data-toggle="modal" data-target="#blockUser" title="Block">  
                                            <i class="fa fa-lock"></i>
                                         </a> 
                                         
                                         <a href="" data-ruta="{{url('config/users/update/'.$UsrAdm->id)}}" data-id="{{$UsrAdm->id}}" data-rut="{{$UsrAdm->rut}}" data-name="{{$UsrAdm->name}}" data-email="{{$UsrAdm->email}}" data-phone="{{$UsrAdm->phone}}" data-toggle="modal" data-target="#editeUser" class="btn btn-info btn-xs editeUser" title="Editar">
                                            <i class="fa fa-pencil"></i>
                                         </a>

                                          <a  href="" data-id="{{$UsrAdm->id}}" data-name="{{$UsrAdm->name}}" data-ruta="{{url('config/users/delete/'.$UsrAdm->id)}}" data-toggle="modal" data-target="#deleteUser"  class="btn btn-xs btn-danger deleteUser">
                                          <i class="fa fa-trash"></i>
                                         </a>

                                          </td>  
                                        </tr>
                                        @endforeach
                                </tbody>   
                        </table>
                       <div class="text-center">
                        {!!$QryUserAdm->render()!!}
                       </div>  
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    @include('configuracion.user.partial.modaldeleteuser')
    
    @include('configuracion.user.partial.modaladdadm')

    @include('configuracion.user.partial.modalblock')

    @include('configuracion.user.partial.modalreset')
    
    @include('configuracion.user.partial.modaledit')

  
    {{-- --}}
  </div>
</div>


@endsection