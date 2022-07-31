<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\AsetTransportasiUmum as AsetTransportasiUmumModel;
use BusinessProcessRoot\Models\KkMainAsetTransportasiUmum as KkMainAsetTransportasiUmumModel;

class TransportasiJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_transportasi(){ 
		$request = $this->request;

		$kModel = new AsetTransportasiUmumModel();
		$kkmModel = new KkMainAsetTransportasiUmumModel();

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
			$data['aset_transportasi'] = $m->aset_transportasi_umum_id;
			$kkm_ent = $kkmModel->get_filter_data_transportasi($data);
			$m->total_data = sizeof($kkm_ent);
		}

			
		$data = array(
			'aset_transportasi' => $k_list
			
		);

		echo json_encode($data);
	}



}