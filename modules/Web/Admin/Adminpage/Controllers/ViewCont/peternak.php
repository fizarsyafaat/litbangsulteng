<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageViewCont;

use AdminTemplateViewCont\DefaultAdminViewController;
use BusinessProcessRoot\Models\User as UserModel;


use BusinessProcessRoot\Models\Kecamatan as KecamatanModel;
class Peternak extends DefaultAdminViewController{
	
	public function __construct(){
		parent::__construct();
		$data_pl_top = array(
			'flot/jquery.flot.js','flot/plugins/jquery.flot.resize.js',
			'flot/plugins/jquery.flot.pie.js'
		);

		$this->set_js_data($data_pl_top,"bottom","last","assets/admin/plugins/");

		$this->set_data_view("menu","peternak");
		$kModel = new KecamatanModel();
		$k_list = $kModel->findAll();
		$this->set_data_view("kecamatan",$k_list);
	} 

	public function peternak_example(){
		$this->set_data_view("submenu","peternak");
		return $this->tc_view("AdminpageView\main\peternak\grafikternak");
	}

	public function peternak(){
		$data_js_rd = array(
			'peternak.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");


		$this->set_data_view("submenu","peternak");
		return $this->tc_view("AdminpageView\main\peternak\grafikternak");
	}


}
