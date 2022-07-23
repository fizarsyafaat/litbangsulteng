<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasPerkebunan as KomoditasPerkebunanModel;
use BusinessProcessRoot\Models\KkMainAsetPerkebunan as KkMainPerkebunanModel;


class KebunJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

		public function json_get_kebun(){
		$kModel = new KomoditasPerkebunanModel();
		$kkmModel = new KkMainPerkebunanModel();

		$k_list = $kModel->findAll();		

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_komoditas",$m->jenis_komoditas_id)->findAll());
		}
	
		$data = array(
			'jenis_komoditas' => $k_list,

		);
		echo json_encode($data);
	}

			



}