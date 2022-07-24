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
		$kModel = new AsetSaranaProduksiModel();
		$kkmModel = new KkMainAsetProduksiModel();

		$k_list = $kModel->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("aset_produksi",$m->aset_produksi_id)->findAll());
		}
		

		$data = array(
			'aset_produksi' => $k_list,
		);
		echo json_encode($data);
	}



}