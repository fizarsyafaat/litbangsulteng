<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\MataPencaharianPokok as MataPencaharianPokokModel;
use BusinessProcessRoot\Models\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiModel;


class PekerjaanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_pekerjaan(){
		$kModel = new MataPencaharianPokokModel();
		$kkmModel = new KkMainDataPekerjaanDanOrganisasiModel();

		$k_list = $kModel->findAll();		

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("mata_pencaharian_pokok",$m->mata_pencaharian_pokok_id)->findAll());
		}

		$data = array(
			'mata_pencaharian_pokok' => $k_list,
		);
		echo json_encode($data);
	}



}