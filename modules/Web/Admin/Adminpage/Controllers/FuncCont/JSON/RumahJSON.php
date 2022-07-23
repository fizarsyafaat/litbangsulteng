<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\StatusKepemilikanRumah as StatusKepemilikanRumahModel;
use BusinessProcessRoot\Models\DindingRumah as DindingRumahModel;
use BusinessProcessRoot\Models\AtapRumah as AtapRumahModel;
use BusinessProcessRoot\Models\LantaiRumah as LantaiRumahModel;
use BusinessProcessRoot\Models\KkMainAsetRumah as KkMainAsetRumahModel;


class RumahJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_rumah(){
		$kModel = new StatusKepemilikanRumahModel();
		$kcModel = new DindingRumahModel();
		$kdModel = new LantaiRumahModel();
		$keModel = new AtapRumahModel();
		$kkmModel = new KkMainAsetRumahModel();

		$k_list = $kModel->findAll();
		$kc_list = $kcModel->findAll();	
		$kd_list = $kdModel->findAll();	
		$ke_list = $keModel->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("status_kepemilikan_rumah",$m->status_kepemilikan_rumah_id)->findAll());
		}
		foreach($kc_list as $m){
			$m->total_data = sizeof($kkmModel->where("dinding_rumah",$m->dinding_rumah_id)->findAll());
		}
		foreach($kd_list as $m){
			$m->total_data = sizeof($kkmModel->where("lantai_rumah",$m->lantai_rumah_id)->findAll());
		}
		foreach($ke_list as $m){
			$m->total_data = sizeof($kkmModel->where("atap_rumah",$m->atap_rumah_id)->findAll());
		}
		

		$data = array(
			'status_kepemilikan_rumah' => $k_list,
			'dinding_rumah' => $kc_list,
			'lantai_rumah' => $kd_list,
			'atap_rumah' => $ke_list,
			
		);
		echo json_encode($data);
	}



}