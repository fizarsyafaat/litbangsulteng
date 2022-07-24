<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageViewCont;

use AdminTemplateViewCont\DefaultAdminViewController;
use BusinessProcessRoot\Models\User as UserModel;

class Tani extends DefaultAdminViewController{
	
	public function __construct(){
		parent::__construct();
		$data_pl_top = array(
			'flot/jquery.flot.js','flot/plugins/jquery.flot.resize.js',
			'flot/plugins/jquery.flot.pie.js'
		);

		$this->set_js_data($data_pl_top,"bottom","last","assets/admin/plugins/");

		$this->set_data_view("menu","kebun");
	}

	public function tani_example(){
		$this->set_data_view("submenu","tani");
		return $this->tc_view("AdminpageView\main\kebun\grafiktani");
	}

	public function tani(){
		$data_js_rd = array(
			'tani.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");


		$this->set_data_view("submenu","tani");
		return $this->tc_view("AdminpageView\main\kebun\grafiktani");
	}


}
