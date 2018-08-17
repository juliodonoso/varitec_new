<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Vendedores;

class InformesController extends Controller
{
    public function inf_vendedores()
    {
    	//$data = Vendedores::all();
    	$data = Vendedores::orderBy('ven_des' , 'ASC')->pluck('ven_des' , 'ven_id');
    	$jsonAno = "";
        $jsonMes = "";
        $jsonDia = "";
        $jsonDocAno = "";
        $jsonDocMes = "";
        $jsonCliAno = "";
        $jsonCliMes = ""; 
        $jsonFamiAno = "";
        $jsonFamiMes = "";
        $jsonSufaAno = "";
        $jsonSufaMes = "";
        $jsonArtAno = "";
        $jsonArtMes = "";
        $jsonZonAno = "";
        $jsonZonMes = "";
        $jsonCiuAno = "";
        $jsonCiuMes = "";
        $jsonComAno = "";
        $jsonComMes = "";
    	//dd($data);
        $data_array = array('jsonAno'=>$jsonAno, 'jsonMes'=>$jsonMes, 'jsonDia'=>$jsonDia, 'jsonDocAno'=>$jsonDocAno, 'jsonDocMes'=>$jsonDocMes, 'jsonCliAno'=>$jsonCliAno, 'jsonCliMes'=>$jsonCliMes, 'jsonFamiAno'=>$jsonFamiAno, 'jsonFamiMes'=>$jsonFamiMes, 'jsonSufaAno'=>$jsonSufaAno, 'jsonSufaMes'=>$jsonSufaMes, 'jsonArtAno'=>$jsonArtAno, 'jsonArtMes'=>$jsonArtMes, 'jsonZonAno'=>$jsonZonAno, 'jsonZonMes'=>$jsonZonMes, 'jsonCiuAno'=>$jsonCiuAno, 'jsonCiuMes'=>$jsonCiuMes, 'jsonComAno'=>$jsonComAno, 'jsonComMes'=>$jsonComMes,'data'=>$data);
    	return view('informes.inf_vendedores')->with($data_array);
    }

    public function inf_dataVen(Request $request)
    {
    	//dd($request->ven_id);
    	$data = Vendedores::orderBy('ven_des' , 'ASC')->pluck('ven_des' , 'ven_id');
    	$ven = $request->ven_id;
    	$ano = '2015'; 
    	$mes = '12';
    	$qry_ven = DB::select("call sp_vend_ano('$ven')");
            foreach ($qry_ven as $qry) {
                            $jsonAno[]=[ $qry->ano, 
                                         $qry->cant,
                                         $qry->venta,
                                         $qry->costo,
                                         $qry->margen
                                       ];
            }                  
            $jsonAno = isset($jsonAno) ? $jsonAno : null;
            $jsonAno = json_encode($jsonAno);     

        $qry_ven_mes = DB::select("call sp_vend_mes('$ven', '$ano')");
            foreach ($qry_ven_mes as $qry) {
                          $jsonMes[]=[ $qry->mes,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
            }
            $jsonMes = isset($jsonMes) ? $jsonMes : null;
            $jsonMes = json_encode($jsonMes);  

        $qry_ven_dia = DB::select("call sp_vend_dia('$ven', '$ano', '$mes')");   
            foreach ($qry_ven_dia as $qry) {
                  $jsonDia[]=[ $qry->dia,
                               $qry->cant,
                               $qry->venta,
                               $qry->costo,
                               $qry->margen
                             ];
            }
            $jsonDia = isset($jsonDia) ? $jsonDia : null;
            $jsonDia = json_encode($jsonDia);  

        $qry_docu_ano = DB::select("call sp_vend_docu_ano('$ven', '$ano')");
                    foreach ($qry_docu_ano as $qry) {
                       $jsonDocAno[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonDocAno = isset($jsonDocAno) ? $jsonDocAno : null;
            $jsonDocAno = json_encode($jsonDocAno);  

        $qry_docu_mes = DB::select("call sp_vend_docu_mes('$ven', '$ano', '$mes')");
                    foreach ($qry_docu_mes as $qry) {
                       $jsonDocMes[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonDocMes = isset($jsonDocMes) ? $jsonDocMes : null;
            $jsonDocMes = json_encode($jsonDocMes); 

        $qry_clie_ano = DB::select("call sp_vend_clie_ano('$ven', '$ano')");    
                    foreach ($qry_clie_ano as $qry) {
                       $jsonCliAno[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonCliAno = isset($jsonCliAno) ? $jsonCliAno : null;
            $jsonCliAno = json_encode($jsonCliAno); 

        $qry_clie_mes = DB::select("call sp_vend_clie_mes('$ven', '$ano', '$mes')");
                    foreach ($qry_clie_mes as $qry) {
                       $jsonCliMes[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonCliMes = isset($jsonCliMes) ? $jsonCliMes : null;
            $jsonCliMes = json_encode($jsonCliMes); 
              

        $qry_fami_ano = DB::select("call sp_vend_fami_ano('$ven', '$ano')"); 
                   foreach ($qry_fami_ano as $qry) {
                       $jsonFamiAno[]=[$qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonFamiAno = isset($jsonFamiAno) ? $jsonFamiAno : null;
            $jsonFamiAno = json_encode($jsonFamiAno); 
            

        $qry_fami_mes = DB::select("call sp_vend_fami_mes('$ven', '$ano', '$mes')");
                   foreach ($qry_fami_mes as $qry) {
                       $jsonFamiMes[]=[$qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonFamiMes = isset($jsonFamiMes) ? $jsonFamiMes : null;
            $jsonFamiMes = json_encode($jsonFamiMes);      

        $qry_sufa_ano = DB::select("call sp_vend_sufa_ano('$ven', '$ano')");    
                   foreach ($qry_sufa_ano as $qry) {
                       $jsonSufaAno[]=[$qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonSufaAno = isset($jsonSufaAno) ? $jsonSufaAno : null;
            $jsonSufaAno = json_encode($jsonSufaAno);

            $qry_sufa_mes = DB::select("call sp_vend_sufa_mes('$ven', '$ano', '$mes')");
                   foreach ($qry_sufa_mes as $qry) {
                       $jsonSufaMes[]=[$qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonSufaMes = isset($jsonSufaMes) ? $jsonSufaMes : null;
            $jsonSufaMes = json_encode($jsonSufaMes);

            $qry_arti_ano = DB::select("call sp_vend_arti_ano('$ven', '$ano')");
                   foreach ($qry_arti_ano as $qry) {
                       $jsonArtAno[]=[$qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonArtAno = isset($jsonArtAno) ? $jsonArtAno : null;
            $jsonArtAno = json_encode($jsonArtAno);       


            $qry_arti_mes = DB::select("call sp_vend_arti_mes('$ven', '$ano', '$mes')");     
                    foreach ($qry_arti_mes as $qry) {
                       $jsonArtMes[]=[$qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonArtMes = isset($jsonArtMes) ? $jsonArtMes : null;
            $jsonArtMes = json_encode($jsonArtMes);  

            $qry_zona_ano = DB::select("call sp_vend_zona_ano('$ven', '$ano')");
                    foreach ($qry_zona_ano as $qry) {
                       $jsonZonAno[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonZonAno = isset($jsonZonAno) ? $jsonZonAno : null;
            $jsonZonAno = json_encode($jsonZonAno);  

            $qry_zona_mes = DB::select("call sp_vend_zona_mes('$ven', '$ano', '$mes')"); 
                    foreach ($qry_zona_mes as $qry) {
                       $jsonZonMes[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonZonMes = isset($jsonZonMes) ? $jsonZonMes : null;
            $jsonZonMes = json_encode($jsonZonMes);  

            $qry_ciud_ano = DB::select("call sp_vend_ciud_ano('$ven', '$ano')");
                    foreach ($qry_ciud_ano as $qry) {
                       $jsonCiuAno[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonCiuAno = isset($jsonCiuAno) ? $jsonCiuAno : null;
            $jsonCiuAno = json_encode($jsonCiuAno);

            $qry_ciud_mes = DB::select("call sp_vend_ciud_mes('$ven', '$ano', '$mes')");  
                    foreach ($qry_ciud_mes as $qry) {
                       $jsonCiuMes[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonCiuMes = isset($jsonCiuMes) ? $jsonCiuMes : null;
            $jsonCiuMes = json_encode($jsonCiuMes);            

            $qry_comu_ano = DB::select("call sp_vend_comu_ano('$ven', '$ano')");
                    foreach ($qry_comu_ano as $qry) {
                       $jsonComAno[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonComAno = isset($jsonComAno) ? $jsonComAno : null;
            $jsonComAno = json_encode($jsonComAno);   

            $qry_comu_mes = DB::select("call sp_vend_comu_mes('$ven', '$ano', '$mes')");     
                    foreach ($qry_comu_mes as $qry) {
                       $jsonComMes[]=[ $qry->des,
                                       $qry->cant,
                                       $qry->venta,
                                       $qry->costo,
                                       $qry->margen
                                     ];
                    }  
            $jsonComMes = isset($jsonComMes) ? $jsonComMes : null;
            $jsonComMes = json_encode($jsonComMes);   
//dd($qry_comu_ano);

         $data_array = array('jsonAno'=>$jsonAno, 'jsonMes'=>$jsonMes, 'jsonDia'=>$jsonDia, 'jsonDocAno'=>$jsonDocAno, 'jsonDocMes'=>$jsonDocMes, 'jsonCliAno'=>$jsonCliAno, 'jsonCliMes'=>$jsonCliMes, 'jsonFamiAno'=>$jsonFamiAno, 'jsonFamiMes'=>$jsonFamiMes, 'jsonSufaAno'=>$jsonSufaAno, 'jsonSufaMes'=>$jsonSufaMes, 'jsonArtAno'=>$jsonArtAno, 'jsonArtMes'=>$jsonArtMes, 'jsonZonAno'=>$jsonZonAno, 'jsonZonMes'=>$jsonZonMes, 'jsonCiuAno'=>$jsonCiuAno, 'jsonCiuMes'=>$jsonCiuMes, 'jsonComAno'=>$jsonComAno, 'jsonComMes'=>$jsonComMes, 'data'=>$data);
         return view('informes.inf_vendedores')->with($data_array);

    }

  public function pivot()
    {
        $countpend = '';
        $qry="select vta_doc_cod Documento, vta_fec_ano Ano, vta_fec_mes Mes, vta_ven_cod Vendedor, 
            CLIE.cli_des Cliente ,
            ARTI.art_des Articulo,
            FAMI.fam_des Familia,            
            LOCA.loc_des Local,             
            ZONA.zon_des Zona,
            CIUD.ciu_des Ciudad, 
            COMU.com_des Comuna,                       
            vta_ciu_cod Ciudad , vta_com_cod Comuna ,
            vta_tot_cant Cantidad, 
            vta_tot_venta Venta ,
            vta_tot_costo Costo ,      
            vta_tot_margen Margen  
            from flex_vta 
            left join flex_clie CLIE on (CLIE.cli_id = flex_vta.vta_cli_id)
            left join flex_art ARTI on (ARTI.art_id = flex_vta.vta_art_id)
            left join flex_zona ZONA on (ZONA.zon_id = flex_vta.vta_zon_id)
            left join flex_ciud CIUD on (CIUD.ciu_id = flex_vta.vta_ciu_id)  
            left join flex_comu COMU on (COMU.com_id = flex_vta.vta_com_id)      
            left join flex_loca LOCA on (LOCA.loc_id = flex_vta.vta_loc_id)   
            left join flex_art_fam FAMI on (FAMI.fam_id = flex_vta.vta_fam_id)                             
            limit 1000" ;
        $qryclis = DB::select($qry);


/*
            foreach ($qryclis as $key ) {
                            $jsonRest[] = array(
                                                "Documento" => $key->doc,                               
                                                "Ano" => $key->ano,
                                                "Mes" => $key->mes,
                                                "Vendedor" => $key->vend,
                                                "Cliente" => $key->cli_des, 
                                                "Ciudad" => $key->ciud,     
                                                "Comuna" => $key->comu,
                                                "Articulo" => $key->art_des,                                                
                                                "Cant" => $key->cant,
                                                "Venta" => $key->venta,
                                                "Costo" => $key->costo,
                                                "Margen" => $key->margen                                                                 
                                                );
            }
*/

        $jsonRest = $qryclis ;

        $jsonRest = isset($jsonRest) ? $jsonRest : null;
        $jsonRest = json_encode($jsonRest);  

        return view('informes.pivot', ['jsonRest'=>$jsonRest]);

    }


}
