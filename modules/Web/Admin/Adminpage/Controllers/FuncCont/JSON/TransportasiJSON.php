<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\AsetTransportasiUmum as AsetTransportasiUmumModel;
use BusinessProcessRoot\Models\KkMainAsetTransportasiUmum as KkMainAsetTransportasiUmumModel;


class TransportasiJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_transportasi(){
		$kModel = new AsetTransportasiUmumModel();
		$kkmModel = new KkMainAsetTransportasiUmumModel();

		$k_list = $kModel->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("aset_transportasi",$m->aset_transportasi_umum_id)->findAll());
		}
		

		$data = array(
			'aset_transportasi' => $k_list,
		);
		echo json_encode($data);
	}



}