<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\LembagaPendidikan as LembagaPendidikanModel;
use BusinessProcessRoot\Models\KkMainLembagaPendidikan as KkMainLembagaPendidikanModel;


class PendidikanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_pendidikan(){
		$kModel = new LembagaPendidikanModel();
		$kkmModel = new KkMainLembagaPendidikanModel();

		$k_list = $kModel->findAll();	

		foreach($k_list as $m){
			$m->total_data = sizeof($kkmModel->where("lembaga_pendidikan",$m->lembaga_pendidikan_id)->findAll());
		}
		

		$data = array(
			'lembaga_pendidikan' => $k_list,
		);
		echo json_encode($data);
	}



}