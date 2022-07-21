<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\MataPencaharianPokok as MataPencaharianPokokModel;
use BusinessProcessRoot\Models\LabaPerBulan as LabaPerBulanModel;
use BusinessProcessRoot\Models\Modal as ModalModel;
use BusinessProcessRoot\Models\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiModel;


class PekerjaanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_pekerjaan(){
		$kModel = new MataPencaharianPokokModel();
		$kcModel = new LabaPerBulanModel();
		$ksModel = new ModalModel();
		$kkmModel = new KkMainDataPekerjaanDanOrganisasiModel();

		$k_list = $kModel->findAll();	
		$kc_list = $kcModel->findAll();	
		$ks_list = $ksModel->findAll();		

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("mata_pencaharian_pokok",$m->mata_pencaharian_pokok_id)->findAll());
		}
		foreach($kc_list as $m){
			$m->total_data = sizeof($kkmModel->where("laba_per_bulan",$m->laba_per_bulan_id)->findAll());
		}
		foreach($ks_list as $m){
			$m->total_data = sizeof($kkmModel->where("modal",$m->modal_id)->findAll());
		}

		$data = array(
			'mata_pencaharian_pokok' => $k_list,
			'laba_per_bulan' => $kc_list,
			'modal' => $ks_list,
		);
		echo json_encode($data);
	}



}