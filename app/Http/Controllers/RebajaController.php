<?php

namespace App\Http\Controllers;
use App\Rebaja;
use Auth;
use Illuminate\Http\Request;

class RebajaController extends Controller {
	//

	public function __construct() {
		$this->middleware('auth');
	}

	public function consultar($id) {
		$rebajar = new Rebaja();
		$rs = $rebajar->find($id);
		return $rs;
	}

	public function rebajar(Request $request) {

		$retorno = false;
		$arrayRebaja = [];
		$rebaja = new Rebaja();
		$suministros = new SuministrosController();
		foreach ($request->inputname as $k => $valor) {
			$array = array('idUser' => Auth::user()->id,
				'idSuministro' => $request->idLab,
				'idLaboratorio' => $request->inputcantidad[$k],
				'cantidad' => $valor,
				'fechaRetencion' => date('Y-m-d H:i:s'),
				'estado' => 1,
				'created_at' => date('Y-m-d H:i:s'));
			array_push($arrayRebaja, $array);
			$suministros->descuentoMass($valor, $request->inputcantidad[$k]);
		}

		if (Rebaja::insert($arrayRebaja)) {
			echo "true";
		} else {
			echo "false";
		}
	}

	public function cambioEstado() {

	}

	public function eliminar($id) {
		$rebaja = App\Rebaja::find($id);
		$rebaja->delete();

	}

}
