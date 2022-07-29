<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController; 

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\StatusKepemilikanRumah as StatusKepemilikanRumahModel;
use BusinessProcessRoot\Models\DindingRumah as DindingRumahModel;
use BusinessProcessRoot\Models\LantaiRumah as LantaiRumahModel;
use BusinessProcessRoot\Models\AtapRumah as AtapRumahModel;
use BusinessProcessRoot\Models\KkMainAsetRumah as KkMainAsetRumahModel;

class RumahJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_rumah(){
		$request = $this->request;

		$kModel = new StatusKepemilikanRumahModel();
		$kcModel = new DindingRumahModel();
		$kdModel = new LantaiRumahModel();
		$keModel = new AtapRumahModel();
		$kkmModel = new KkMainAsetRumahModel();

		$k_list = $kModel->findAll();	
		$kc_list = $kcModel->findAll();	
		$kd_list = $kdModel->findAll();	
		$ke_list = $keModel->findAll();	

		$kkmModel->join("kk_main",'kk_main_aset_rumah.kk_id = kk_main.kk_id');
		$kkmModel->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

		$kecamatan = (int) ($request->getPost("kecamatan"));
		$kelurahan = (int) ($request->getPost("kelurahan"));

		$data = array();


		//KEPEMILIKAN RUMAH

		if($kecamatan > 0){
			$data['kecamatan'] = $kecamatan;
		}

		if($kelurahan > 0){
			$data['kelurahan'] = $kelurahan;
		}


		foreach($k_list as $m){
			$data['status_kepemilikan_rumah'] = $m->status_kepemilikan_rumah_id;
			$kkm_ent = $kkmModel->get_filter_data_rumah($data);
			$m->total_data = sizeof($kkm_ent);
		}

		foreach($kc_list as $m){
			$data['dinding_rumah'] = $m->dinding_rumah_id;
			$kkm_ent = $kkmModel->get_filter_data_dinding($data);
			$m->total_data = sizeof($kkm_ent);
		}

		foreach($kd_list as $m){
			$data['lantai_rumah'] = $m->lantai_rumah_id;
			$kkm_ent = $kkmModel->get_filter_data_lantai($data);
			$m->total_data = sizeof($kkm_ent);
		}

		foreach($ke_list as $m){
			$data['atap_rumah'] = $m->atap_rumah_id;
			$kkm_ent = $kkmModel->get_filter_data_atap($data);
			$m->total_data = sizeof($kkm_ent);
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