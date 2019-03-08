@extends('layouts.backend.index')

@section('content')

 @push('js')

<script type="text/javascript">
  function agregarSuminitro(name,id){
    swal({
      text: "Agregar Suminitro "+name,
      buttons: {
        cancel: true,
        confirm: true,
      },
      content: {
        element: "input",
        attributes: {
          placeholder: "Ingrese Cantidad",
          type: "number",
          maxlength: 3
        }
      }
    })
    .then(function(isConfirm) {
      if (isConfirm) {
        console.log( '{!! csrf_token() !!}')
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
          method: "patch",
          url: "suministros/"+id,
          data: { cantidad: isConfirm }
        })
          .done(function( msg ) {
            if(!msg){
              swal({text:'Error al agregar suminitros a bodega'})
            }
          });
      } else {
        return false;
      }
    }).then(()=>{
      swal({text:'Se agregaron suminitros al stock'})
      .then(()=>{
        location.reload();
      })
      
      });

  }


</script>
@endpush


  {{ csrf_field() }}
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Suminstros</h4>
                    <p class="category">Stock </p>
                </div>
                <div class="card-content">
                    <div class="col-md-12 ">
                        <a href="{{route('suministros.index')}}"  class="btn btn-success btn-sm"  title="Stock">   
                            <i class="fa fa-list-alt"></i>
                            Stock
                          </a>
                         <a href="{{route('suministros.solicitud')}}"  class="btn btn-primary btn-sm"  title="Solicitud">   
                             <i class=" fa fa-sign-in"></i>
                             Solicitudes
                          </a>
                          <a href="{{route('suministros.add')}}"  class="btn btn-info btn-sm"  title="Agregar">   
                            <i class=" fa fa-sign-in"></i>
                            Agregar
                         </a>
                    </div>
                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th><strong>Suminitro</strong></th>
                                    <th><strong>Cantidad</strong></th>
                                    <th><strong>Agregar</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($suminitros as $rs)
                                    <tr>
                                      <td>{{$rs->prNombre}}</td>
                                      <td>{{$rs->prUnidad}}</td>
                                      
                                      <td> 
                                        <a href="javascript: agregarSuminitro('{{$rs->prNombre}}','{{$rs->id}}')" name="{{$rs->prNombre}}"  class="btn btn-success btn-xs editereg" title="Agregar">
                                          <i class="fa fa-check-square-o"></i>
                                       </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                {{ $suminitros->links() }}
                      </table>
                                            
                    </div>                    
                </div>
            </div>
        </div>
    </div>





@endsection