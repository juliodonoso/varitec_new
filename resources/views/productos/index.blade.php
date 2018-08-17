@extends('layouts.backend.index')

@section('content')

 @push('js') 
<script>
      $(document).on("click", ".createprod", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateProd').attr('action',ruta);
      });

      $(document).on("click", ".viewprod", function () {
        var ruta = $(this).data('ruta');
        var cod = $(this).data('cod');
        var int = $(this).data('int');
        var name = $(this).data('name');
        var desc = $(this).data('desc'); 
        var cri = $(this).data('cri');
        var ini = $(this).data('ini'); 
        var val = $(this).data('val'); 
        var uni = $(this).data('uni');
        var cat = $(this).data('cat');
        var bod = $(this).data('bod');
        var est = $(this).data('est');  
        var id = $(this).data('id');
        $(".modal-body #cod").val(cod);
        $(".modal-body #int").val(int);
        $(".modal-body #name").val(name);
        $(".modal-body #desc").val(desc);
        $(".modal-body #cri").val(cri);
        $(".modal-body #ini").val(ini);
        $(".modal-body #val").val(val);
        $(".modal-body #uni").val(uni);
        $(".modal-body #cat").val(cat);
        $(".modal-body #bod").val(bod);
        $(".modal-body #est").val(est);
        $('.modal-body #id').val(id);
        $('.modal-body  #formViewProd').attr('action',ruta);
      });       

      $(document).on("click", ".blockprod", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockProd').attr('action',ruta);
      });            

      $(document).on("click", ".editprod", function () {
        var ruta = $(this).data('ruta');
        var cod = $(this).data('cod');
        var int = $(this).data('int');
        var name = $(this).data('name');
        var desc = $(this).data('desc'); 
        var cri = $(this).data('cri');
        var ini = $(this).data('ini'); 
        var val = $(this).data('val'); 
        var uni = $(this).data('uni');
        var cat = $(this).data('cat');
        var bod = $(this).data('bod');
        var est = $(this).data('est');  
        var id = $(this).data('id');
        $(".modal-body #cod").val(cod);
        $(".modal-body #int").val(int);
        $(".modal-body #name").val(name);
        $(".modal-body #desc").val(desc);
        $(".modal-body #cri").val(cri);
        $(".modal-body #ini").val(ini);
        $(".modal-body #val").val(val);
        $(".modal-body #uni").val(uni);
        $(".modal-body #cat").val(cat);
        $(".modal-body #bod").val(bod);
        $(".modal-body #est").val(est);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditProd').attr('action', ruta);
      });      

      $(document).on("click", ".deleteprod", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteProd').attr('action', ruta);
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
                    <h4 class="title">Productos</h4>
                    <p class="category">Lista de Productos</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="{{url('Productos/')}}" class="btn btn-primary btn-sm createprod" data-toggle="modal" data-target="#createprod" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                   <tr>
                                    <th>Cod. Barra</th>
                                    <th>Cod. Interno</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Estado</th>                                    
                                    <th>Opciones</th>
                                   </tr>   
                                </thead>

                                <tbody>
                                   @foreach($qryProd as $pro)  
                                    <tr>
                                      <td>{{$pro->prBarcode}}</td> 
                                      <td>{{$pro->prInterno}}</td> 
                                      <td>{{$pro->prNombre}}</td> 
                                      <td>{{$pro->prDescripcion}}</td> 
                                      <td></td> 
                                      <td></td> 
                                      <td></td> 
                                      <td></td> 
                                      <td> 
                                        <span class="
                                             @if     ($pro->prEstado == 1) label label-success
                                             @elseif ($pro->prEstado == 0) label label-danger
                                             @endif ">
                                            </span> 
                                      </td>
                                      <td>

                                       <a href="" data-ruta="" data-id="{{$pro->id}}" data-cod="{{$pro->prBarcode}}" data-int="{{$pro->prInterno}}" data-name="{{$pro->prNombre}}" data-desc="{{$pro->prDescripcion}}" data-cri="{{$pro->prCritico}}" data-ini="{{$pro->prInicial}}" data-val="{{$pro->prValorizado}}" data-uni="{{$pro->prUnidad}}" data-cat="{{$pro->Categoria->ctdescripcion}}" data-bod="{{$pro->Bodega->bgNombre}}" data-est="{{$pro->prEstado}}" class="btn btn-primary btn-xs viewprod" data-toggle="modal" data-target="#viewprod" title="Ver">  
                                          <i class="fa fa-eye"></i>
                                       </a>                                        

                                       <a href="" data-id="{{$pro->id}}" data-nom="{{$pro->prNombre}}" data-ruta="{{url('Productos/block/'.$pro->id)}}" class="btn btn-danger btn-xs blockprod" data-toggle="modal" data-target="#blockprod" title="Block">  
                                          <i class="fa fa-lock"></i>
                                       </a> 

                                       <a href="" data-ruta="{{url('Productos/'.$pro->id)}}" data-id="{{$pro->id}}" data-cod="{{$pro->prBarcode}}" data-int="{{$pro->prInterno}}" data-name="{{$pro->prNombre}}" data-desc="{{$pro->prDescripcion}}" data-cri="{{$pro->prCritico}}" data-ini="{{$pro->prInicial}}" data-val="{{$pro->prValorizado}}" data-uni="{{$pro->prUnidad}}" data-cat="{{$pro->prCategoria}}" data-bod="{{$pro->prBodega}}" data-toggle="modal" data-target="#editprod" class="btn btn-info btn-xs editprod" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="{{url('Productos/'.$pro->id)}}" data-id="{{$pro->id}}" data-name="{{$pro->prNombre}}" data-toggle="modal" data-target="#deleteprod"  class="btn btn-xs btn-danger deleteprod" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                @endforeach
                                </tbody>   
                        </table>    
                    </div>                    
                </div>


            </div>
        </div>
        @include('productos.partial.modaldelete') 
        @include('productos.partial.modalview')
    </div>

@include('productos.partial.modalblock')

@include('productos.partial.modaladd') 

@include('productos.partial.modaledit') 



  </div>


@endsection