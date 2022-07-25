<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasKehutanan as KomoditasKehutananModel;
use BusinessProcessRoot\Models\KkMainAsetKehutanan as KkMainKehutananModel;


class HutanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_hutan(){
		$kModel = new KomoditasKehutananModel();
		$kkmModel = new KkMainKehutananModel();

		$k_list = $kModel->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_komoditas",$m->komoditas_kehutanan_id)->findAll());
		}
		

		$data = array(
			'jenis_komoditas' => $k_list,
		);
		echo json_encode($data);
	}



}