<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasIkan as KomoditasIkanModel;
use BusinessProcessRoot\Models\KkMainAsetIkan as KkMainAsetIkanModel;


class IkanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_ikan(){
		$kModel = new KomoditasIkanModel();
		$kkmModel = new KkMainAsetIkanModel();

		$k_list = $kModel->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_komoditas",$m->komoditas_ikan_id)->findAll());
		}
		

		$data = array(
			'jenis_komoditas' => $k_list,
		);
		echo json_encode($data);
	}



}