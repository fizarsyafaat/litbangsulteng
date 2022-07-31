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
		$request = $this->request;
		$kModel = new PenderitaSakitKelainanModel();
		$kcModel = new JenisPenyakitModel();
		$kkmModel = new KkMainKesehatanModel();


		$k_list = $kModel->findAll();	
		$kc_list = $kcModel->findAll();	

		$kkmModel->join("kk_main",'kk_main_kesehatan.kk_id = kk_main.kk_id');
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
			$data['penderita_sakit_kelainan'] = $m->penderita_sakit_kelainan_id;
			$kkm_ent = $kkmModel->get_filter_data_kelainan($data);
			$m->total_data = sizeof($kkm_ent);
		}

		foreach($kc_list as $m){
			$data['jenis_penyakit'] = $m->jenis_penyakit_id;
			$kkm_ent = $kkmModel->get_filter_data_jenis($data);
			$m->total_data = sizeof($kkm_ent);
		}

			
		$data = array(
			'penderita_sakit_kelainan' => $k_list,
			'jenis_penyakit' => $kc_list,
			
		);

		echo json_encode($data);
	}



}