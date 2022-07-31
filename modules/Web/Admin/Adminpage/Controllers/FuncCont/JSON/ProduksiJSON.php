<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\AsetSaranaProduksi as AsetSaranaProduksiModel;
use BusinessProcessRoot\Models\KkMainAsetProduksi as KkMainAsetProduksiModel;

class ProduksiJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_produksi(){
		$request = $this->request;

		$kModel = new AsetSaranaProduksiModel();
		$kkmModel = new KkMainAsetProduksiModel();

		$k_list = $kModel->findAll();	

		$kkmModel->join("kk_main",'kk_main_aset_produksi.kk_id = kk_main.kk_id');
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
			$data['aset_produksi'] = $m->aset_sarana_produksi_id;
			$kkm_ent = $kkmModel->get_filter_data_produksi($data);
			$m->total_data = sizeof($kkm_ent);
		}

			
		$data = array(
			'aset_produksi' => $k_list
			
		);

		echo json_encode($data);
	}



}