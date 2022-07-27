<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasTanamanObat as KomoditasTanamanObatModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanObat as KkMainTanamanObatModel;



class ObatJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_obat(){
		$kModel = new KomoditasTanamanObatModel();
		$kkmModel = new KkMainTanamanObatModel();


		$k_list = $kModel->findAll();

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_komoditas",$m->komoditas_tanaman_obat_id)->findAll());
		}

		
		

		$data = array(
			'jenis_komoditas' => $k_list,
		);
		echo json_encode($data);
	}



}