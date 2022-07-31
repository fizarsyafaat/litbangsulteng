<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\MataPencaharianPokok as MataPencaharianPokokModel;
use BusinessProcessRoot\Models\SumberModal as SumberModalModel;
use BusinessProcessRoot\Models\LabaPerBulan as LabaPerBulanModel;
use BusinessProcessRoot\Models\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiModel;

class PekerjaanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_pekerjaan(){
		$request = $this->request;

		$kModel = new MataPencaharianPokokModel();
		$kcModel = new SumberModalModel();
		$kdModel = new LabaPerBulanModel();
		$kkmModel = new KkMainDataPekerjaanDanOrganisasiModel();

		$k_list = $kModel->findAll();
		$kc_list = $kcModel->findAll();
		$kd_list = $kdModel->findAll();	

		$kkmModel->join("kk_main",'kk_main_data_pekerjaan_dan_organisasi.kk_id = kk_main.kk_id');
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
			$data['mata_pencaharian_pokok'] = $m->mata_pencaharian_pokok_id;
			$kkm_ent = $kkmModel->get_filter_data_kerja($data);
			$m->total_data = sizeof($kkm_ent);
		}
		foreach($kc_list as $m){
			$data['sumber_modal'] = $m->sumber_modal_id;
			$kkm_ent = $kkmModel->get_filter_data_modal($data);
			$m->total_data = sizeof($kkm_ent);
		}
		foreach($kd_list as $m){
			$data['laba_per_bulan'] = $m->laba_per_bulan_id;
			$kkm_ent = $kkmModel->get_filter_data_laba($data);
			$m->total_data = sizeof($kkm_ent);
		}

			
		$data = array(
			'mata_pencaharian_pokok' => $k_list,
			'sumber_modal' => $kc_list,
			'laba_per_bulan' => $kd_list,
			
		);

		echo json_encode($data);
	}



}