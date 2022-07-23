<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageViewCont;

use AdminTemplateViewCont\DefaultAdminViewController;
use BusinessProcessRoot\Models\User as UserModel;

class Ekonomi extends DefaultAdminViewController{
	
	public function __construct(){
		parent::__construct();
		$data_pl_top = array(
			'flot/jquery.flot.js','flot/plugins/jquery.flot.resize.js',
			'flot/plugins/jquery.flot.pie.js'
		);

		$this->set_js_data($data_pl_top,"bottom","last","assets/admin/plugins/");

		$this->set_data_view("menu","pekerjaan");
	}

	public function ekonomi_example(){
		$this->set_data_view("submenu","ekonomi");
		return $this->tc_view("AdminpageView\main\pekerjaan\grafikekonomi");
	}

	public function ekonomi(){
		$data_js_rd = array(
			'pekerjaan.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");


		$this->set_data_view("submenu","ekonomi");
		return $this->tc_view("AdminpageView\main\pekerjaan\grafikekonomi");
	}


}
