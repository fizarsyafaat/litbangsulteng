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
		$request = $this->request;

		$kModel = new KomoditasPerkebunanModel();
		$kkmModel = new KkMainPerkebunanModel();

		$k_list = $kModel->findAll();	

		$kkmModel->join("kk_main",'kk_main_aset_perkebunan.kk_id = kk_main.kk_id');
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
			$m->total_data = sizeof($kkmModel->where("jenis_komoditas",$m->komoditas_perkebunan_id)->findAll());
		}

			
		$data = array(
			'jenis_komoditas' => $k_list
			
		);

		echo json_encode($data);
	}



}