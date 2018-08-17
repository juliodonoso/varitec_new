@extends('layouts.backend.index')


        <!-- external libs from cdnjs 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        -->
        <!-- PivotTable.js libs from ../dist -->
@push('css')        

    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

<style>




        .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {
             stroke: white;
        }





        .ct-series-b .ct-bar, .ct-series-b .ct-line, .ct-series-b .ct-point, .ct-series-b .ct-slice-donut {
             stroke: #ec407a;
        }

        .ct-series-c .ct-bar, .ct-series-c .ct-line, .ct-series-c .ct-point, .ct-series-c .ct-slice-donut {
             stroke: #ffa726;
        }


#chart_meses_juntos .ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut {
             stroke: #26c6da;
        }




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




@push('js')

    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>


    <script type="text/javascript">


/* Apiladas 

            var data = {
                labels: ['Ene', 'Feb', 'Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                series: [
                            [100,200,500,50,200,54,87,69,14,649,44,78],
                            [50,120,250,25,100,24,37,59,4,600,40,70],
                            [10,20,50,5,20,4,7,9,4,9,4,8]
                        ]
              };
            var options = {
                        high: 700,
                        low:  10,
                        seriesBarDistance: 5,
                        axisX: {
                            offset: 20,

                          },
                          scaleMinSpace: 50
              };


              var chart_meses = new Chartist.Bar('.ct-chart-meses-stack', data, options);
*/


            $("#ver_ven_ven").click(function() {     
                        $('#chart_meses_venta').show();  
                        $('#chart_meses_costo').hide(); 
                        $('#chart_meses_margen').hide(); 
                        $('#chart_meses_juntos').hide();                         
            });

            $("#ver_ven_cos").click(function() { 
                        $('#chart_meses_venta').hide();                 
                        $('#chart_meses_costo').show(); 
                        $('#chart_meses_margen').hide(); 
                        $('#chart_meses_juntos').hide();                           
            });

            $("#ver_ven_mar").click(function() {     
                        $('#chart_meses_venta').hide();  
                        $('#chart_meses_costo').hide(); 
                        $('#chart_meses_margen').show(); 
                        $('#chart_meses_juntos').hide();                           
            });
            $("#ver_ven_jun").click(function() {     
                        $('#chart_meses_venta').hide();  
                        $('#chart_meses_costo').hide(); 
                        $('#chart_meses_margen').hide(); 
                        $('#chart_meses_juntos').show();                         
            });





/* Vta */
            var data = {
                labels: ['Ene', 'Feb', 'Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                series: [[150,200,300,40,400,84,87,99,34,449,124,138]]
              };
            var options = {
                      high: 500,
                      low:  10
              };
              var chart_meses = new Chartist.Bar('.ct-chart-meses-venta', data, options);

/* Costo */
            var data = {
                labels: ['Ene', 'Feb', 'Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                series: [[50,100,200,20,100,34,47,39,4,249,24,38]]
              };
            var options = {
                      high: 500,
                      low:  10
              };
              var chart_meses = new Chartist.Bar('.ct-chart-meses-costo', data, options);
/* Margen */
            var data = {
                labels: ['Ene', 'Feb', 'Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                series: [[10,70,50,10,70,14,27,19,2,149,14,18]]
              };
            var options = {
                      high: 500,
                      low:  10
              };
              var chart_meses = new Chartist.Bar('.ct-chart-meses-margen', data, options);



/* Juntos */
            var data = {
                labels: ['Ene', 'Feb', 'Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                series: [
                        [150,200,300,40,400,84,87,99,34,449,124,138],
                        [50,100,200,20,100,34,47,39,4,249,24,38],
                        [10,70,50,10,70,14,27,19,2,149,14,18]
                        ]
              };
            var options = {
                      high: 500,
                      low:  10,
                      scaleMinSpace: 15,
                      seriesBarDistance: 4
              };
              var chart_meses = new Chartist.Bar('#chart_meses_juntos', data, options);




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
                    <h4 class="title">Informe Grafico</h4>
                    <p class="text">Analisis multidimensional de Ventas</p>
                </div>

<a href='#' id='ver_ven_ven'>Venta</a>
<a href='#' id='ver_ven_cos'>Costo</a>
<a href='#' id='ver_ven_mar'>Margen</a>
<a href='#' id='ver_ven_jun'>Juntos</a>

                <div class="card-content">
                  

                        <div class="col-md-4 col-md-offset-1">
                            <div class="card">
                                <div class="card-content">

                                      <div id='chart_meses_venta' class="ct-chart-meses-venta ct-perfect-fourth"></div>
                                      <div id='chart_meses_costo' class="ct-chart-meses-costo ct-perfect-fourth"></div>
                                      <div id='chart_meses_margen' class="ct-chart-meses-margen ct-perfect-fourth"></div>   
                                      <div id='chart_meses_juntos' class="ct-chart-meses-juntos ct-perfect-fourth"></div>                                                                                                                


                                </div> 
                            </div>
                        </div>                     

                </div>                    
            </div>
        </div>

    </div>
</div>




        
@endsection