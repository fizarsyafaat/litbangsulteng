<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasTernak as KomoditasTernakModel;
use BusinessProcessRoot\Models\KkMainAsetTernak as KkMainAsetTernakModel;

class PeternakJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_peternak(){
		$request = $this->request;

		$kModel = new KomoditasTernakModel(); 
		$kkmModel = new KkMainAsetTernakModel();

		$k_list = $kModel->findAll();	

		$kkmModel->join("kk_main",'kk_main_aset_buah_buahan.kk_id = kk_main.kk_id');
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
			$data['jenis_ternak'] = $m->komoditas_ternak_id;
			$kkm_ent = $kkmModel->get_filter_data_ternak($data);
			$m->total_data = sizeof($kkm_ent);
		}

			
		$data = array(
			'jenis_ternak' => $k_list
			
		);

		echo json_encode($data);
	}



}