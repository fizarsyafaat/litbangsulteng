<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasTanamanPangan as KomoditasTanamanPanganModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanPangan as KkMainTanamanPanganModel;



class PanganobatJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_panganobat(){
		$kModel = new KomoditasTanamanPanganModel();
		$kkmModel = new KkMainTanamanPanganModel();


		$k_list = $kModel->findAll();

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_komoditas",$m->komoditas_tanaman_pangan_id)->findAll());
		}

		
		

		$data = array(
			'jenis_komoditas' => $k_list,
		);
		echo json_encode($data);
	}



}