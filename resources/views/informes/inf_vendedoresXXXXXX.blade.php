@extends('layouts.backend.index')


@push('css')        

    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

<style>

        .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {stroke: white; }
        .ct-series-b .ct-bar, .ct-series-b .ct-line, .ct-series-b .ct-point, .ct-series-b .ct-slice-donut {stroke: #ec407a;}
        .ct-series-c .ct-bar, .ct-series-c .ct-line, .ct-series-c .ct-point, .ct-series-c .ct-slice-donut {stroke: #ffa726;}
        #chart_meses_juntos .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {stroke: #26c6da;}
        .ct-label {
            color: hsla(0,0%,100%,.9);
            font-size: 1rem;
        }
        .ct-grid {
            stroke: hsla(0,0%,100%,.2);
        }

        #chart_meses_venta {  
          background: linear-gradient(60deg,#26c6da,#00acc1);
          border-radius: 10px;
          padding-top: 10px;
        }

        #chart_meses_costo {  
          background: linear-gradient(60deg,#ec407a,#d81b60);
          border-radius: 10px;
          padding-top: 10px;
        }

        #chart_meses_margen {  
          background: linear-gradient(60deg,#ffa726,#fb8c00);
          border-radius: 10px;
          padding-top: 10px;
        }

        #chart_meses_juntos {  
          background: linear-gradient(60deg,#9c9c9c,#565656);
          border-radius: 10px;
          padding-top: 10px;
        }
</style>


@endpush


@section('content')
@push('js')
    <link rel="stylesheet" href="{{URL::asset('js/datatables/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('js/datatables/datatables.min.css')}}"/>
    <style>  th.dt-center, td.dt-center { text-align: center !important; } </style>
    <script language="JavaScript" type="text/javascript" src="{{URL::asset('js/datatables/datatables.min.js')}}"></script>

    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>


  <script>

$(document).ready(function() {

      var table =  $('#inf-ano').DataTable({ 
                  "scrollX" : false,           
                  "paging":   false,
                  "ordering": true,
                  "order": [[ 0, "desc" ]],                                                 
                  "info":     false,
                  "destroy": true,
                  "searching": false, 
                  "lengthMenu": [[10,25,50,100,-1], [10,25,50,100,"Todo"]],                                             
                   });
      var table =  $('#inf-mes').DataTable({            
                  "paging":   false,
                  "ordering": true,
                  "order": [[ 0, "desc" ]],                                                 
                  "info":     false,
                  "destroy": true, 
                  "searching": false,                  
                  "lengthMenu": [[10,25,50,100,-1], [10,25,50,100,"Todo"]],                                             
                   });
      var table =  $('#inf-dia').DataTable({            
                  "paging":   false,
                  "ordering": true,
                  "order": [[ 0, "desc" ]],                                                 
                  "info":     false,
                  "destroy": true, 
                  "searching": false,                  
                  "lengthMenu": [[10,25,50,100,-1], [10,25,50,100,"Todo"]],                                             
                   });

         $(document).ready(function() {



        });
    /*
    JSON.parse('[1, 2, 3,]')
    */


            var var_json = {!!$jsonAno!!};
           
            console.log(var_json);
   /*          
            console.log('--------Procesado------');


          var_json.forEach( function(valor, indice, array) {
              console.log("En el índice " + indice + " hay este valor: " + valor);
          });

            console.log('--------DOS ------');
*/
            var arr_desc = [] ;
            var arr_cant = [] ;
            var arr_venta = [] ;   
            var arr_costo = [] ;  
            var arr_margen = [] ;      
            var var_maximo = 0 ;                              

          for (uno=0;uno<var_json.length;uno++){
                /*console.log('Primero' + var_json[uno] + " ");*/
                        arr_desc.push(var_json[uno][0]);
                        arr_cant.push(var_json[uno][1]);  
                        arr_venta.push(var_json[uno][2]); 
                        arr_costo.push(var_json[uno][3]); 
                        arr_margen.push(var_json[uno][4]);   
                        /* Busca el mayor valor para grafico*/
                        if (var_json[uno][2]  > var_maximo) {
                            var_maximo = var_json[uno][2];
                        }


          }
            console.log('--------------');

console.log(arr_desc);


/* Vta */
            var data = {
                labels: arr_desc,
                series: [arr_venta]
              };
            var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20}  };
            var chart_meses = new Chartist.Bar('.ct-chart-meses-venta', data, options);

/* Costo */
            var data = {
                labels: arr_desc,
                series: [arr_costo]
              };
            var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20}  };
            var chart_meses = new Chartist.Bar('.ct-chart-meses-costo', data, options);
/* Margen */
            var data = {
                labels: arr_desc,
                series: [arr_margen]
              };
            var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20}  };
            var chart_meses = new Chartist.Bar('.ct-chart-meses-margen', data, options);



/* Juntos */
            var data = {
                labels: arr_desc,
                series: [
                        arr_venta,
                        arr_costo,
                        arr_margen
                        ]
              };
            var options = {
                      high: var_maximo, low:  10, width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20},
                      scaleMinSpace: 15,
                      seriesBarDistance: 4
              };
            var chart_meses = new Chartist.Bar('#chart_meses_juntos', data, options);





});      
    
  </script>
@endpush  


<?php
/* dd($jsonAno) ;*/
?>

<div class="content" >
  <div class="container-fluid"">
    <div class="row">
      @include('include.mensajes')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Informe Vendedores</h4>
                    <p class="category">Datos Estadisticos de Trasacciones por Vendedores..</p>
                </div>
                <div class="card-content">
                     {!!Form::open(['route' => 'informe.vendedor' , 'method'=>'POST'])!!}
                    <div class="col-md-4 col-md-offset-3"> 
                        {!!Form::select('ven_id', $data, 'null', ['placeholder' => 'Seleccionar Vendedor', 'class' => 'form-control' , 'required']) !!}                     
                    </div>    
                    <div class="col-md-4">
                        {!!Form::submit('Aceptar', ['class'=>'btn btn-primary pull-rigth']) !!}
                    </div>
                     {!! Form::close() !!}
                </div>

                
                <div class="row">
                    <div class="col-md-12">
                        @if(isset($qry_ven))
                          <div class="container col-md-5">
                            <div class="card">
                              <div class="card-header" data-background-color="blue">
                                   <h5 class="title">Informe Año</h5>
                              </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                       <table id="inf-ano" class="table table-condensed" >
                                        <thead>
                                          <tr>
                                            <th>Año</th>
                                            <th>Cantidad</th>
                                            <th>Venta</th>
                                            <th>Costo</th>
                                            <th>Margen</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($qry_ven as $vend)
                                          <tr>
                                            <td>{{$vend->ano}}</td>
                                            <td>{{$vend->cant}}</td>
                                            <td>{{$vend->venta}}</td>
                                            <td>{{$vend->costo}}</td>
                                            <td>{{$vend->margen}}</td>
                                          </tr>
                                        @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                </div>
                            </div> 
                          </div>

                          <div class="container col-md-5">

                                            <ul class="nav nav-pills nav-pills-rose">
                                              <li class="nav-item"><a class="nav-link active" href="#pill1" data-toggle="tab">Venta</a></li>
                                              <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Costo</a></li>
                                              <li class="nav-item"><a class="nav-link" href="#pill3" data-toggle="tab">Margen</a></li>
                                              <li class="nav-item"><a class="nav-link" href="#pill4" data-toggle="tab">Todos</a></li>
                                            </ul>
                                            <div class="tab-content tab-space">
                                                <div class="tab-pane active" id="pill1">
                                                        <div id='chart_meses_venta' class="ct-chart-meses-venta ct-perfect-fourth"></div>

                                                </div>
                                                <div class="tab-pane" id="pill2">
                                                        <div id='chart_meses_costo' class="ct-chart-meses-costo ct-perfect-fourth"></div>
                                                </div>
                                                <div class="tab-pane" id="pill3">
                                                        <div id='chart_meses_margen' class="ct-chart-meses-margen ct-perfect-fourth"></div>
                                                </div>
                                                <div class="tab-pane" id="pill4">
                                                        <div id='chart_meses_juntos' class="ct-chart-meses-margen ct-perfect-fourth"></div>
                                                </div>                                                
                                            </div>

                          </div>

                        @endif
                    </div>

                    <div class="col-md-12">
                        @if(isset($qry_ven_mes_xxx))
                          <div class="container col-md-5 ">
                            <div class="card">
                              <div class="card-header" data-background-color="blue">
                                   <h5 class="title">Informe por Mes (Año Actual)</h5>
                              </div>                              
                                <div class="card-content">
                                    <div class="table-responsive">   
                                      <table id="inf-mes" class="table table-condensed" >
                                        <thead>
                                          <tr>
                                            <th>Mes</th>
                                            <th>Cantidad</th>
                                            <th>Venta</th>
                                            <th>Costo</th>
                                            <th>Margen</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($qry_ven_mes as $vend)
                                          <tr>
                                            <td>{{$vend->mes}}</td>
                                            <td>{{$vend->cant}}</td>
                                            <td>{{$vend->venta}}</td>
                                            <td>{{$vend->costo}}</td>
                                            <td>{{$vend->margen}}</td>
                                          </tr>
                                        @endforeach
                                        </tbody>
                                      </table>
                                    </div>  
                                </div>
                            </div> 
                          </div>
                          <div class="col-md-1">
                            <div class="list-group">
                             <a href="" class="list-group-item list-group-item-action list-group-item-primary">Cantidad</a>
                             <a href="" class="list-group-item list-group-item-action list-group-item-success">Venta</a>
                             <a href="" class="list-group-item list-group-item-action list-group-item-danger">Costo</a>
                             <a href="" class="list-group-item list-group-item-action lislist-group-item-warning">Margen</a>
                            </div>
                          </div>
                        @endif
                      </div>


                    <div class="col-md-12">
                        @if(isset($qry_ven_dia))
                        <div class="container col-md-5">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                     <h5 class="title">Informe Dia</h5>
                                </div>                              
                                <div class="card-content">                          
                                  <div class="table-responsive"> 
                                    <table id="inf-dia"  class="table table-condensed">
                                      <thead>
                                        <tr>
                                          <th>Dia</th>
                                          <th>Cantidad</th>
                                          <th>Venta</th>
                                          <th>Costo</th>
                                          <th>Margen</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($qry_ven_dia as $vend)
                                        <tr>
                                          <td>{{$vend->dia}}</td>
                                          <td>{{$vend->cant}}</td>
                                          <td>{{$vend->venta}}</td>
                                          <td>{{$vend->costo}}</td>
                                          <td>{{$vend->margen}}</td>
                                        </tr>
                                      @endforeach
                                      </tbody>
                                    </table>
                                  </div>        
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-1">
                            <div class="list-group">
                             <a href="" class="list-group-item list-group-item-action list-group-item-primary">Cantidad</a>
                             <a href="" class="list-group-item list-group-item-action list-group-item-success">Venta</a>
                             <a href="" class="list-group-item list-group-item-action list-group-item-danger">Costo</a>
                             <a href="" class="list-group-item list-group-item-action lislist-group-item-warning">Margen</a>
                            </div>
                        </div>    
                        @endif
                     </div>
                </div>

              </div>
            </div>
    </div>
  </div>
</div>
  <!-- /.col-md-5 -->

@endsection
