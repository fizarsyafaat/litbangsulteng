<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;
use BusinessProcessRoot\Models\Kelurahan as KelurahanModel;

class AlamatJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_kelurahan(int $kecamatan){
		$kModel = new KelurahanModel();
		$k_list = $kModel->where("id_kecamatan",$kecamatan)->findAll();

		echo json_encode($k_list);
	}
}
