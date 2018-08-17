@extends('layouts.backend.index')


        <!-- external libs from cdnjs 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        -->
        <!-- PivotTable.js libs from ../dist -->
@push('css')        
        <link rel="stylesheet" type="text/css" href="{{asset('css/pivot.css')}}">
<style>

        table.pvtTable {
            font-size: 8pt;
        }
        table.pvtTable thead tr th, table.pvtTable tbody tr th {
            font-size: 8pt;
        }



        .pvtAxisContainer li span.pvtAttr {     
                    font-size: 8pt;
                }
        .pvtAxisContainer, .pvtVals {     
                    font-size: 8pt;
                }
        table.pvtTable {
            font-size: 7pt;
        }                
        table.pvtTable thead tr th, table.pvtTable tbody tr th {
            font-size: 7pt;
        }        

        .pvtFilterBox h4 {
            font-size: 12px;
        }

        .pvtFilterBox {
            font-size: 8pt;
        }        
        .checkbox label, .radio label, label, .label-on-left, .label-on-right {
            font-size: 10px;
        }
        .pvtCheckContainer p {
            margin: 0px;
        }        
</style>


@endpush




        <!-- optional: mobile support with jqueryui-touch-punch 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
        -->



@push('js')


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

        <script type="text/javascript" src="{{asset('js/pivot.js')}}"></script>




    <script type="text/javascript">
    // This example is the most basic usage of pivotUI()

    $(function(){

      var tpl = $.pivotUtilities.aggregatorTemplates;

        var renderers = $.extend($.pivotUtilities.renderers,
          $.pivotUtilities.export_renderers);

        $("#output").pivotUI(
                   {!!$jsonRest!!},
            {
                "menuLimit": 500,
                renderers: renderers,
                rows: ["Mes"],
                cols: ["Ano"],  
                hiddenFromDragDrop: ["Cantidad","Venta","Costo","Margen"], 
                hiddenFromAggregators: ["Ano","Mes","Cliente","Vendedor","Documento","Articulo","Familia","Local","Zona","Ciudad","Comuna"], 
                aggregatorName: 'Sum',
                vals: ["Venta"],             
                rendererName: "TSV Export"
            },false,"es"
        );
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
                    <h4 class="title">Informe Dinamico</h4>
                    <p class="text">Analisis multidimensional de Ventas</p>
                </div>
                <div class="card-content">
                  
                        <div class="col-md-12 col-md-offset-0">
                          <div id="output" style="margin: 30px;"></div>
                       </div> 


                </div>                    
            </div>
        </div>

    </div>
</div>




        
@endsection