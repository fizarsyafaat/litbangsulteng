<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\PenderitaSakitKelainan as PenderitaSakitKelainanModel;



use BusinessProcessRoot\Models\LuasKandang as LuasKandangModel;

class KesehatanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_kesehatan(){
		$kModel = new PenderitaSakitKelainanModel();

		$k_list = $kModel->findAll();

		$data = array(
			'KomoditasSakitKelaian' => $k_list,
		);
}
}