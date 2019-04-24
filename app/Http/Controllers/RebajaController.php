<?php

namespace App\Http\Controllers;
use App\Rebaja;

class RebajaController extends Controller {
	//

	public function __construct() {
		$this->middleware('guest');
	}

	public function consultar($id) {
		$suminitros = new Rebaja();
		$rs = $suminitros->find($id);
		dd($rs);
	}

}
