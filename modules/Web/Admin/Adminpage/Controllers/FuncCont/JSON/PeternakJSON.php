<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasTernak as KomoditasTernakModel;
use BusinessProcessRoot\Models\KkMainAsetTernak as KkMainAsetTernakModel;


class PeternakJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_peternak(){
		$kModel = new KomoditasTernakModel();
		$kkmModel = new KkMainAsetTernakModel();

		$k_list = $kModel->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_ternak",$m->jenis_komoditas_id)->findAll());
		}
		

		$data = array(
			'jenis_ternak' => $k_list,
		);
		echo json_encode($data);
	}



}