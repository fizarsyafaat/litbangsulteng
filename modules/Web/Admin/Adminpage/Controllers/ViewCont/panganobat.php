<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageViewCont;

use AdminTemplateViewCont\DefaultAdminViewController;
use BusinessProcessRoot\Models\User as UserModel;

class Panganobat extends DefaultAdminViewController{
	
	public function __construct(){
		parent::__construct();
		$data_pl_top = array(
			'flot/jquery.flot.js','flot/plugins/jquery.flot.resize.js',
			'flot/plugins/jquery.flot.pie.js'
		);

		$this->set_js_data($data_pl_top,"bottom","last","assets/admin/plugins/");

		$this->set_data_view("menu","kebun");
	}

	public function panganobat_example(){
		$this->set_data_view("submenu","panganobat");
		return $this->tc_view("AdminpageView\main\kebun\grafikpanganobat");
	}

	public function panganobat(){
		$data_js_rd = array(
			'panganobat.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");


		$this->set_data_view("submenu","panganobat");
		return $this->tc_view("AdminpageView\main\kebun\grafikpanganobat");
	}


}
