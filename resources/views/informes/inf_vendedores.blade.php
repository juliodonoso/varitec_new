@extends('layouts.backend.index')



@push('css')
    <link rel="stylesheet" href="{{URL::asset('js/datatables/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('js/datatables/datatables.min.css')}}"/>
    <style>  th.dt-center, td.dt-center { text-align: center !important; } </style>


    <style type="text/css">  
        .table>thead>tr>th { text-align: center; } 
        .dt-body-right { text-align: right; }
        .graf {width: 450px; 
               margin-left: 15px; }
        .list {margin-right: 10px;}      
    </style>


    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

<style>

        .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {stroke: white; }
        .ct-series-b .ct-bar, .ct-series-b .ct-line, .ct-series-b .ct-point, .ct-series-b .ct-slice-donut {stroke: #ec407a;}
        .ct-series-c .ct-bar, .ct-series-c .ct-line, .ct-series-c .ct-point, .ct-series-c .ct-slice-donut {stroke: #ffa726;}
        .ct-label.ct-horizontal { position: absolute; transform: rotate(270deg); }
         #chart_anos_juntos, #chart_mes_juntos, #chart_dias_juntos, #chart_docA_juntos, #chart_docM_juntos, #chart_CliA_juntos  .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {stroke: #26c6da;}
        .ct-label {
            color: hsla(0,0%,100%,.9);
            font-size: 1rem;
        }
        .ct-grid {
            stroke: hsla(0,0%,100%,.2);
        }

        #chart_anos_venta, #chart_mes_venta, #chart_dias_venta, #chart_docA_venta, #chart_docM_venta, #chart_CliA_venta   {  
          background: linear-gradient(60deg,#26c6da,#00acc1);
          border-radius: 10px;
          padding-top: 10px;
        }

        #chart_anos_costo, #chart_mes_costo, #chart_dias_costo, #chart_docA_costo, #chart_docM_costo, #chart_CliA_costo {  
          background: linear-gradient(60deg,#ec407a,#d81b60);
          border-radius: 10px;
          padding-top: 10px;
        }

        #chart_anos_margen, #chart_mes_margen, #chart_dias_margen, #chart_docA_margen, #chart_docM_margen, #chart_CliA_margen {  
          background: linear-gradient(60deg,#ffa726,#fb8c00);
          border-radius: 10px;
          padding-top: 10px;
        }

        #chart_anos_juntos, #chart_mes_juntos, #chart_dias_juntos, #chart_docA_juntos, #chart_docM_juntos, #chart_CliA_juntos  {  
          background: linear-gradient(60deg,#9c9c9c,#565656);
          border-radius: 10px;
          padding-top: 10px;
        }
        
       
</style>


@endpush  

@push('js')

    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <script language="JavaScript" type="text/javascript" src="{{URL::asset('js/datatables/datatables.min.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
            var DataSet = {!!$jsonAno!!};
            var table =  $('#tableAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Año"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "paging": false,
           "destroy": true, 
           "searching": false,
           "info":false,
            });


            /* Graficos Inicio*/
                    var var_json = {!!$jsonAno!!};
                    var arr_desc = [] ;
                    var arr_cant = [] ;
                    var arr_venta = [] ;   
                    var arr_costo = [] ;  
                    var arr_margen = [] ;      
                    var var_maximo = 0 ;                              

                  for (uno=0;uno<var_json.length;uno++){
                                arr_desc.push(var_json[uno][0]);
                                arr_cant.push(var_json[uno][1]);  
                                arr_venta.push(var_json[uno][2]); 
                                arr_costo.push(var_json[uno][3]); 
                                arr_margen.push(var_json[uno][4]);   
                                if (var_json[uno][2]  > var_maximo) {
                                    var_maximo = var_json[uno][2];
                                }
                  }
 

            /* Vta */
                        var data = {
                            labels: arr_desc,
                            series: [arr_venta]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 350, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_anos = new Chartist.Bar('.ct-chart-anos-venta', data, options);

            /* Costo */
                        var data = {
                            labels: arr_desc,
                            series: [arr_costo]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 350, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_anos = new Chartist.Bar('.ct-chart-anos-costo', data, options);
            /* Margen */
                        var data = {
                            labels: arr_desc,
                            series: [arr_margen]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 350, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_anos = new Chartist.Bar('.ct-chart-anos-margen', data, options);
            /* Juntos */
                        var data = {
                            labels: arr_desc,
                            series: [
                                    arr_venta,
                                    arr_costo,
                                    arr_margen
                                    ]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 350, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_anos = new Chartist.Bar('#chart_anos_juntos', data, options);
            /* Graficos Fin */ 



            var DataSet = {!!$jsonMes!!};
            var table =  $('#tableMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Mes"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });

            /* Graficos Inicio*/
                    var var_json = {!!$jsonMes!!};
                    var arr_desc = [] ;
                    var arr_cant = [] ;
                    var arr_venta = [] ;   
                    var arr_costo = [] ;  
                    var arr_margen = [] ;      
                    var var_maximo = 0 ;                              

                  for (uno=0;uno<var_json.length;uno++){
                                arr_desc.push(var_json[uno][0]);
                                arr_cant.push(var_json[uno][1]);  
                                arr_venta.push(var_json[uno][2]); 
                                arr_costo.push(var_json[uno][3]); 
                                arr_margen.push(var_json[uno][4]);   
                                if (var_json[uno][2]  > var_maximo) {
                                    var_maximo = var_json[uno][2];
                                }
                  }
 
            /* Vta */
                        var data = {
                            labels: arr_desc,
                            series: [arr_venta]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-mes-venta', data, options);

            /* Costo */
                        var data = {
                            labels: arr_desc,
                            series: [arr_costo]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-mes-costo', data, options);
            /* Margen */
                        var data = {
                            labels: arr_desc,
                            series: [arr_margen]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-mes-margen', data, options);
            /* Juntos */
                        var data = {
                            labels: arr_desc,
                            series: [
                                    arr_venta,
                                    arr_costo,
                                    arr_margen
                                    ]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('#chart_mes_juntos', data, options);
            /* Graficos Fin */ 


            var DataSet = {!!$jsonDia!!};
            var table =  $('#tableDia').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Dia"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });            

            /* Graficos Inicio*/
                    var var_json = {!!$jsonDia!!};
                    var arr_desc = [] ;
                    var arr_cant = [] ;
                    var arr_venta = [] ;   
                    var arr_costo = [] ;  
                    var arr_margen = [] ;      
                    var var_maximo = 0 ;                              

                  for (uno=0;uno<var_json.length;uno++){
                                arr_desc.push(var_json[uno][0]);
                                arr_cant.push(var_json[uno][1]);  
                                arr_venta.push(var_json[uno][2]); 
                                arr_costo.push(var_json[uno][3]); 
                                arr_margen.push(var_json[uno][4]);   
                                if (var_json[uno][2]  > var_maximo) {
                                    var_maximo = var_json[uno][2];
                                }
                  }
 
            /* Vta */
                        var data = {
                            labels: arr_desc,
                            series: [arr_venta]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-dias-venta', data, options);

            /* Costo */
                        var data = {
                            labels: arr_desc,
                            series: [arr_costo]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-dias-costo', data, options);
            /* Margen */
                        var data = {
                            labels: arr_desc,
                            series: [arr_margen]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-dias-margen', data, options);
            /* Juntos */
                        var data = {
                            labels: arr_desc,
                            series: [
                                    arr_venta,
                                    arr_costo,
                                    arr_margen
                                    ]
                          };
                        var options = {  high: var_maximo, low:  8,  width: 450, height: 330, chartPadding: {left: 40,right: 30, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('#chart_dias_juntos', data, options);
            /* Graficos Fin */ 


            var DataSet = {!!$jsonDocAno!!};
            var table =  $('#tableDocAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });   

            /* Graficos Inicio*/
                    var var_json = {!!$jsonDocAno!!};
                    var arr_desc = [] ;
                    var arr_cant = [] ;
                    var arr_venta = [] ;   
                    var arr_costo = [] ;  
                    var arr_margen = [] ;      
                    var var_maximo = 0 ;                              

                  for (uno=0;uno<var_json.length;uno++){
                                arr_desc.push(var_json[uno][0]);
                                arr_cant.push(var_json[uno][1]);  
                                arr_venta.push(var_json[uno][2]); 
                                arr_costo.push(var_json[uno][3]); 
                                arr_margen.push(var_json[uno][4]);   
                                if (var_json[uno][2]  > var_maximo) {
                                    var_maximo = var_json[uno][2];
                                }
                  }
            /* Vta */
                        var data = {
                            labels: arr_desc,
                            series: [arr_venta]
                          };
                        var options = {  high: var_maximo, low:  20,  width: 400, height: 290, chartPadding: {left: 30,right: 10, top:15, } ,responsive: true,
                             maintainAspectRatio: true, horizontalBars: true,
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-docA-venta', data, options);

            /* Costo */
                        var data = {
                            labels: arr_desc,
                            series: [arr_costo]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20},
                              maintainAspectRatio: true, horizontalBars: true,
                              axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                  }
                                  };
                        var chart_meses = new Chartist.Bar('.ct-chart-docA-costo', data, options);
            /* Margen */
                        var data = {
                            labels: arr_desc,
                            series: [arr_margen]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20}, 
                              maintainAspectRatio: true, horizontalBars: true,
                              axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                     }
                              };
                        var chart_meses = new Chartist.Bar('.ct-chart-docA-margen', data, options);
            /* Juntos */
                        var data = {
                            labels: arr_desc,
                            series: [
                                    arr_venta,
                                    arr_costo,
                                    arr_margen
                                    ]
                          };
                        var options = { high: var_maximo, low:  10, width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20}, scaleMinSpace: 15, seriesBarDistance: 8,
                           maintainAspectRatio: true, horizontalBars: true,
                           axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                  }                        
                          };
                        var chart_meses = new Chartist.Bar('#chart_docA_juntos', data, options);
            /* Graficos Fin */ 


            var DataSet = {!!$jsonDocMes!!};
            var table =  $('#tableDocMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });   

            /* Graficos Inicio*/
                    var var_json = {!!$jsonDocMes!!};
                    var arr_desc = [] ;
                    var arr_cant = [] ;
                    var arr_venta = [] ;   
                    var arr_costo = [] ;  
                    var arr_margen = [] ;      
                    var var_maximo = 0 ;                              

                  for (uno=0;uno<var_json.length;uno++){
                                arr_desc.push(var_json[uno][0]);
                                arr_cant.push(var_json[uno][1]);  
                                arr_venta.push(var_json[uno][2]); 
                                arr_costo.push(var_json[uno][3]); 
                                arr_margen.push(var_json[uno][4]);   
                                if (var_json[uno][2]  > var_maximo) {
                                    var_maximo = var_json[uno][2];
                                }
                  }
 
            /* Vta */
                        var data = {
                            labels: arr_desc,
                            series: [arr_venta]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-docM-venta', data, options);

            /* Costo */
                        var data = {
                            labels: arr_desc,
                            series: [arr_costo]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20},
                              maintainAspectRatio: true, 
                              axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                  }
                                  };
                        var chart_meses = new Chartist.Bar('.ct-chart-docM-costo', data, options);
            /* Margen */
                        var data = {
                            labels: arr_desc,
                            series: [arr_margen]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20}, 
                              maintainAspectRatio: true, 
                              axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                     }
                              };
                        var chart_meses = new Chartist.Bar('.ct-chart-docM-margen', data, options);
            /* Juntos */
                        var data = {
                            labels: arr_desc,
                            series: [
                                    arr_venta,
                                    arr_costo,
                                    arr_margen
                                    ]
                          };
                        var options = { high: var_maximo, low:  10, width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20}, scaleMinSpace: 15, seriesBarDistance: 8,
                           maintainAspectRatio: true, 
                           axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                  }                        
                          };
                        var chart_meses = new Chartist.Bar('#chart_docM_juntos', data, options);
            /* Graficos Fin */ 



            var DataSet = {!!$jsonCliAno!!};
            var table =  $('#tableCliAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            }); 

            /* Graficos Inicio*/
                    var var_json = {!!$jsonCliAno!!};
                    var arr_desc = [] ;
                    var arr_cant = [] ;
                    var arr_venta = [] ;   
                    var arr_costo = [] ;  
                    var arr_margen = [] ;      
                    var var_maximo = 0 ;                              

                  for (uno=0;uno<var_json.length;uno++){
                                arr_desc.push(var_json[uno][0]);
                                arr_cant.push(var_json[uno][1]);  
                                arr_venta.push(var_json[uno][2]); 
                                arr_costo.push(var_json[uno][3]); 
                                arr_margen.push(var_json[uno][4]);   
                                if (var_json[uno][2]  > var_maximo) {
                                    var_maximo = var_json[uno][2];
                                }
                  }
 
            /* Vta */
                        var data = {
                            labels: arr_desc,
                            series: [arr_venta]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20} ,responsive: true,
                             maintainAspectRatio: true, 
                                axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                }
                           };
                        var chart_meses = new Chartist.Bar('.ct-chart-CliA-venta', data, options);

            /* Costo */
                        var data = {
                            labels: arr_desc,
                            series: [arr_costo]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 400, height: 300, chartPadding: {left: 40,right: 20, top:20},
                              maintainAspectRatio: true,
                              axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                  }
                                  };
                        var chart_meses = new Chartist.Bar('.ct-chart-CliA-costo', data, options);
            /* Margen */
                        var data = {
                            labels: arr_desc,
                            series: [arr_margen]
                          };
                        var options = {  high: var_maximo, low:  10,  width: 450, height: 350, chartPadding: {left: 30,right: 10, top:20}, scaleMinSpace: 30, seriesBarDistance: 12,
                              maintainAspectRatio: true,
                              axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                     }
                              };
                        var chart_meses = new Chartist.Bar('.ct-chart-CliA-margen', data, options);
            /* Juntos */
                        var data = {
                            labels: arr_desc,
                            series: [
                                    arr_venta,
                                    arr_costo,
                                    arr_margen
                                    ]
                          };
                        var options = { high: var_maximo, low:  10, width: 450, height: 300, chartPadding: {left: 30,right: 10, top:20}, scaleMinSpace: 20, seriesBarDistance: 10,
                           maintainAspectRatio: true,
                           axisY: {   labelInterpolationFnc: function(value) {  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  }
                                  }                        
                          };
                        var chart_meses = new Chartist.Bar('#chart_CliA_juntos', data, options);
            /* Graficos Fin */ 




            var DataSet = {!!$jsonCliMes!!};
            var table =  $('#tableCliMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            }); 

            var DataSet = {!!$jsonFamiAno!!};
            var table =  $('#tableFamiAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            }); 

            var DataSet = {!!$jsonFamiMes!!};
            var table =  $('#tableFamiMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });    

            var DataSet = {!!$jsonSufaAno!!};
            var table =  $('#tableSufaAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });

            var DataSet = {!!$jsonSufaMes!!};
            var table =  $('#tableSufaMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });

            var DataSet = {!!$jsonArtAno!!};
            var table =  $('#tableArtAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });

            var DataSet = {!!$jsonArtMes!!};
            var table =  $('#tableArtMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });

            var DataSet = {!!$jsonZonAno!!};
            var table =  $('#tableZonAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });

            var DataSet = {!!$jsonZonMes!!};
            var table =  $('#tableZonMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });            

            var DataSet = {!!$jsonCiuAno!!};
            var table =  $('#tableCiuAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });     

            var DataSet = {!!$jsonCiuMes!!};
            var table =  $('#tableCiuMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            }); 

            var DataSet = {!!$jsonComAno!!};
            var table =  $('#tableComAno').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            }); 

            var DataSet = {!!$jsonComMes!!};
            var table =  $('#tableComMes').DataTable({
            data: DataSet,
            "columns": [
                       { "title": "Descripción"},
                       { "title": "Cantidad", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Venta", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Costo", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       { "title": "Margen", render: $.fn.dataTable.render.number( ',', '.', 0 ), className: 'dt-body-right'},
                       ],
           "scrollX" : false,            
           "paging": false,
           "destroy": true,
           "searching": false,
           "info":false,
            });             




    });      
  </script>
@endpush  


@section('content')

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
                        {!!Form::select('ven_id', $data, Input::get('ven_id'), ['placeholder' => 'Seleccionar Vendedor', 'class' => 'form-control ' , 'required']) !!}                     
                    </div>    
                    <div class="col-md-4">
                        {!!Form::submit('Aceptar', ['class'=>'btn btn-primary pull-rigth']) !!}
                    </div>
                     {!! Form::close() !!}
                </div>

                
                <div class="row">

                  @if(isset($jsonAno) )
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                      <div class="list col-md-1">
                          <ul class="nav nav-pills nav-pills-rose flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Venta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Costo</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Margen</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab4" data-toggle="tab">Todo</a></li>
                          </ul>
                      </div>
                      <div class="col-md-5">
                          <div class="graf tab-content">
                              <div class="tab-pane active" id="tab1">
                                  <div id='chart_anos_venta' class="ct-chart-anos-venta ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tab2">
                                  <div id='chart_anos_costo' class="ct-chart-anos-costo ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tab3">
                                  <div id='chart_anos_margen' class="ct-chart-anos-margen ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tab4">
                                  <div id='chart_anos_juntos' class="ct-chart-anos-margen ct-perfect-fourth"></div>
                              </div>                                    
                          </div>
                      </div>
                    </div>
                  @endif

                  @if(isset($jsonMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                      <div class="list col-md-1">
                          <ul class="nav nav-pills nav-pills-rose flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#tab5" data-toggle="tab">Venta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab6" data-toggle="tab">Costo</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab7" data-toggle="tab">Margen</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab8" data-toggle="tab">Todo</a></li>
                          </ul>
                      </div>
                      <div class="col-md-5">
                          <div class="graf tab-content">
                              <div class="tab-pane active" id="tab5">
                                  <div id='chart_mes_venta' class="ct-chart-mes-venta ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tab6">
                                  <div id='chart_mes_costo' class="ct-chart-mes-costo ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tab7">
                                  <div id='chart_anos_margen' class="ct-chart-mes-margen ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tab8">
                                  <div id='chart_mes_juntos' class="ct-chart-mes-margen ct-perfect-fourth"></div>
                              </div>                                    
                          </div>
                      </div>                      
                    </div>
                  @endif

                  @if(isset($jsonDia))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe Dia</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableDia"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                      <div class="list col-md-1">
                          <ul class="nav nav-pills nav-pills-rose flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#tabDVen" data-toggle="tab">Venta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDCos" data-toggle="tab">Costo</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDMar" data-toggle="tab">Margen</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDJun" data-toggle="tab">Todo</a></li>
                          </ul>
                      </div>
                      <div class="col-md-5">
                          <div class="graf tab-content">
                              <div class="tab-pane active" id="tabDVen">
                                  <div id='chart_dias_venta' class="ct-chart-dias-venta ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDCos">
                                  <div id='chart_dias_costo' class="ct-chart-dias-costo ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDMar">
                                  <div id='chart_dias_margen' class="ct-chart-dias-margen ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDJun">
                                  <div id='chart_dias_juntos' class="ct-chart-dias-margen ct-perfect-fourth"></div>
                              </div>                                    
                          </div>
                      </div>                        
                    </div>
                  @endif

                  @if(isset($jsonDocAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Documento por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableDocAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                      <div class="list col-md-1">
                          <ul class="nav nav-pills nav-pills-rose flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#tabDocVen" data-toggle="tab">Venta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDocCos" data-toggle="tab">Costo</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDocMar" data-toggle="tab">Margen</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDocJun" data-toggle="tab">Todo</a></li>
                          </ul>
                      </div>
                      <div class="col-md-5">
                          <div class="graf tab-content">
                              <div class="tab-pane active" id="tabDocVen">
                                  <div id='chart_docA_venta' class="ct-chart-docA-venta ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDocCos">
                                  <div id='chart_docA_costo' class="ct-chart-docA-costo ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDocMar">
                                  <div id='chart_docA_margen' class="ct-chart-docA-margen ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDocJun">
                                  <div id='chart_docA_juntos' class="ct-chart-docA-margen ct-perfect-fourth"></div>
                              </div>                                    
                          </div>
                      </div>                          
                    </div>
                  @endif

                 @if(isset($jsonDocMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Documento por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableDocMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                      <div class="list col-md-1">
                          <ul class="nav nav-pills nav-pills-rose flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#tabDoMVen" data-toggle="tab">Venta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDoMCos" data-toggle="tab">Costo</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDoMMar" data-toggle="tab">Margen</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabDoMJun" data-toggle="tab">Todo</a></li>
                          </ul>
                      </div>
                      <div class="col-md-5">
                          <div class="graf tab-content">
                              <div class="tab-pane active" id="tabDoMVen">
                                  <div id='chart_docM_venta' class="ct-chart-docM-venta ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDoMCos">
                                  <div id='chart_docM_costo' class="ct-chart-docM-costo ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDoMMar">
                                  <div id='chart_docM_margen' class="ct-chart-docM-margen ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabDoMJun">
                                  <div id='chart_docM_juntos' class="ct-chart-docM-margen ct-perfect-fourth"></div>
                              </div>                                    
                          </div>
                      </div>    
                    </div>
                  @endif

                 @if(isset($jsonCliAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Cliente por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableCliAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                      <div class="list col-md-1">
                          <ul class="nav nav-pills nav-pills-rose flex-column">
                            <li class="nav-item"><a class="nav-link active" href="#tabCliAVen" data-toggle="tab">Venta</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabCliACos" data-toggle="tab">Costo</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabCliAMar" data-toggle="tab">Margen</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tabCliAJun" data-toggle="tab">Todo</a></li>
                          </ul>
                      </div>
                      <div class="col-md-5">
                          <div class="graf tab-content">
                              <div class="tab-pane active" id="tabCliAVen">
                                  <div id='chart_CliA_venta' class="ct-chart-CliA-venta ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabCliACos">
                                  <div id='chart_CliA_costo' class="ct-chart-CliA-costo ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabCliAMar">
                                  <div id='chart_CliA_margen' class="ct-chart-CliA-margen ct-perfect-fourth"></div>
                              </div>
                              <div class="tab-pane" id="tabCliAJun">
                                  <div id='chart_CliA_juntos' class="ct-chart-CliA-margen ct-perfect-fourth"></div>
                              </div>                                    
                          </div>
                      </div>                       
                    </div>
                  @endif
                  
                 @if(isset($jsonCliMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Cliente por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableCliMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif 

                 @if(isset($jsonFamiAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Familia de Articulos por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableFamiAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif   

                 @if(isset($jsonFamiMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Familia de Articulos por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableFamiMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif

                 @if(isset($jsonSufaAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Sub-Familia de Articulos por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableSufaAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif                        

                 @if(isset($jsonSufaMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Sub-Familia de Articulos por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableSufaMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif                            

                 @if(isset($jsonArtAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Articulos por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableArtAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif    

                 @if(isset($jsonArtMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Articulos por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableArtMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif    

                 @if(isset($jsonZonAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Zona por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableZonAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif    

                 @if(isset($jsonZonMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Zona por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableZonMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif    


                 @if(isset($jsonCiuAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Ciudad por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableCiuAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif    

                 @if(isset($jsonCiuMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Ciudad por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableCiuMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif    

                 @if(isset($jsonComAno))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Comuna por Año</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableComAno"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif   

                 @if(isset($jsonComMes))
                    <div class="col-md-12">
                      <div class="col-md-5">
                        <div class="card">
                          <div class="card-header" data-background-color="blue">
                               <h5 class="title">Informe de Comuna por Mes</h5>
                          </div>
                          <div class="card-content">
                              <div class="table-responsive">
                                <table class="table" id="tableComMes"></table>
                              </div>
                          </div>
                        </div> 
                      </div>
                    </div>
                  @endif   

                </div>
            </div>
        </div>
    </div>
  </div>
</div>
  <!-- /.col-md-5 -->

@endsection



        