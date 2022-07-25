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


		//KEPEMILIKAN RUMAH

		if($kecamatan > 0){
			$kkmModel->where("id_kecamatan",$kecamatan);
		}

		if($kelurahan > 0){
			$kkmModel->where("id_kelurahan",$kelurahan);
		}

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("status_kepemilikan_rumah",$m->status_kepemilikan_rumah_id)->findAll());
		}

		$data = array(
			'status_kepemilikan_rumah' => $k_list
			
		);

		echo json_encode($data);
	}



}