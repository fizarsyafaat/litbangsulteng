<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\PenderitaSakitKelainan as PenderitaSakitKelainanModel;
use BusinessProcessRoot\Models\JenisPenyakit as JenisPenyakitModel;
use BusinessProcessRoot\Models\KkMainKesehatan as KkMainKesehatanModel;


class KesehatanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_kesehatan(){
		$kModel = new PenderitaSakitKelainanModel();
		$kcModel = new JenisPenyakitModel();
		$kkmModel = new KkMainKesehatanModel();

		$k_list = $kModel->findAll();		
		$kc_list = $kcModel->findAll();

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("penderita_sakit_kelainan",$m->penderita_sakit_kelainan_id)->findAll());
		}
		foreach($kc_list as $m){
			$m->total_data = sizeof($kkmModel->where("jenis_penyakit",$m->jenis_penyakit_id)->findAll());
		}

		$data = array(
			'sakit_kelainan' => $k_list,
			'jenis_penyakit' => $kc_list,
		);
		echo json_encode($data);
	}



}