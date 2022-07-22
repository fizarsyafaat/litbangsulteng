<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\MataPencaharianPokok as MataPencaharianPokokModel;
use BusinessProcessRoot\Models\LabaPerBulan as LabaPerBulanModel;
use BusinessProcessRoot\Models\Modal as ModalModel;
use BusinessProcessRoot\Models\KkMain as KkMainModel;
use BusinessProcessRoot\Models\Kelurahan as KelurahanModel;
use BusinessProcessRoot\Models\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiModel;


class PekerjaanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_pekerjaan(){
		$request = $this->request;

		$kModel = new MataPencaharianPokokModel();
		$klModel = new KkMainDataPekerjaanDanOrganisasiModel();

		$kl_list = $klModel->findAll();
		$k_array = [];

		foreach($kl_list as $kc){
			$m = new \Stdclass();
			$m->title = $kc->nama_mata_pencaharian_pokok;
			$m->mata_pencaharian_pokok_id = $kc->mata_pencaharian_pokok_id;
			$m->total_kk = sizeof($kModel->where("mata_pencaharian_pokok",$kc->mata_pencaharian_pokok_id)->findAll());
			$k_array[] = $m;
		}

		echo json_encode($k_array);
	}

			



}