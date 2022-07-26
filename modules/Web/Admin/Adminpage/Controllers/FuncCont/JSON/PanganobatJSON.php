<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasTanamanPangan as KomoditasTanamanPanganModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanPangan as KkMainTanamanPanganModel;

use BusinessProcessRoot\Models\KomoditasTanamanObat as KomoditasTanamanObatModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanObat as KkMainTanamanObatModel;


class PanganobatJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_panganobat(){
		$kModel = new KomoditasTanamanPanganModel();
		$kkmModel = new KkMainTanamanPanganModel();


		$kModelc = new KomoditasTanamanObatModel();
		$kkmModelc = new KkMainTanamanObatModel();

		$k_list = $kModel->findAll();
		$k_listc = $kModelc->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_komoditas",$m->komoditas_tanaman_pangan_id)->findAll());
		}

		foreach($k_listc as $m){
			$m->total_data = sizeof($kkmModelc->where("jenis_komoditas",$m->komoditas_tanaman_obat_id)->findAll());
		}
		

		$data = array(
			'jenis_komoditas' => $k_list,
			'jenis_komoditas' => $k_listc,
		);
		echo json_encode($data);
	}



}